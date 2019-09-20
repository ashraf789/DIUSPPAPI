<?php

$app->get('/api/documentation/read/{project_id}', 'readDocumentation');
$app->post('/api/documentation/add', 'addDocumentation');
$app->put('/api/documentation/update/{id}', 'updateDocumentation');
$app->delete('/api/documentation/delete/{id}', 'deleteDocumentation');

function readDocumentation($request)
{
    header('Content-type: application/json');
    require_once __DIR__.'/../dbconnect.php';
    //checking api_key
    //if api key invalid user can't use this api
    $result = isValidApiKey($mysqli);
    if ($result['error']) {
        sop($result);

        return;
    }
    $table_name = 'documentations';
    $id = $request->getAttribute('project_id');
    $query = "select *from $table_name where project_id = $id";
    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    if (isset($data)) {
        echo json_encode($data);
    } else {
        $data['message'] = 'No record found';
        $data['reponse'] = '404';
        echo json_encode($data);
    }
}

function addDocumentation($request)
{
    header('Content-type: application/json');
    require_once __DIR__.'/../dbconnect.php';

    //checking api_key
    //if api key invalid user can't use this api
    $result = isValidApiKey($mysqli);
    if ($result['error']) {
        sop($result);

        return;
    }
    //checking request params is wrong or wright
    $response = verifyRequiredParams($request, ['documentation', 'project_id', 'user_id']);
    if (!$response['error']) {
        $documentation = $request->getParsedBody()['documentation'];
        $project_id = $request->getParsedBody()['project_id'];
        $user_id = $request->getParsedBody()['user_id'];
        $table_name = 'documentations';

        if (isUserExist($user_id, $mysqli)) {
            if (isProjectExist($project_id, $mysqli)) {
                $stmp = $mysqli->prepare("INSERT INTO $table_name (`documentation`, `project_id`, `user_id`) VALUES (?,?,?)");
                $stmp->bind_param('sss', $documentation, $project_id, $user_id);

                if ($stmp->execute()) {
                    $data['response'] = '200';
                    $data['message'] = 'successfully inserted new record';
                } else {
                    $data['response'] = '201';
                    $data['message'] = 'faield to insert new record';
                }
            } else {
                $data['response'] = '404';
                $data['message'] = 'incorrect project id';
            }
        } else {
            $data['response'] = '404';
            $data['message'] = 'incorrect user id';
        }
        sop($data);
    } else {
        sop($response);
    }
}

function updateDocumentation($request)
{
    header('Content-type: application/json');
    require_once __DIR__.'/../dbconnect.php';
    //checking api_key
    //if api key invalid user can't use this api
    $result = isValidApiKey($mysqli);
    if ($result['error']) {
        sop($result);

        return;
    }
    //checking request params is wrong or wright
    $response = verifyRequiredParams($request, ['documentation', 'project_id', 'user_id']);
    if (!$response['error']) {
        $id = $request->getAttribute('id');
        $documentation = $request->getParsedBody()['documentation'];
        $project_id = $request->getParsedBody()['project_id'];
        $user_id = $request->getParsedBody()['user_id'];
        $table_name = 'documentations';

        if (isRecordExist($table_name, $id, $mysqli)) {
            if (isUserExist($user_id, $mysqli)) {
                if (isProjectExist($project_id, $mysqli)) {
                    $stmp = $mysqli->prepare("UPDATE $table_name SET `documentation`=?,`project_id`=?,`user_id`=? WHERE id = ? ");
                    $stmp->bind_param('siii', $documentation, $project_id, $user_id, $id);

                    if ($stmp->execute()) {
                        $data['response'] = '200';
                        $data['message'] = 'successfully update record';
                    } else {
                        $data['response'] = '201';
                        $data['message'] = 'faield to update record';
                    }
                } else {
                    $data['response'] = '404';
                    $data['message'] = 'incorrect project id';
                }
            } else {
                $data['response'] = '404';
                $data['message'] = 'incorrect user id';
            }
        } else {
            $data['response'] = '404';
            $data['message'] = 'incorrect record id';
        }
        sop($data);
    } else {
        sop($response);
    }
}

function deleteDocumentation($request)
{
    require_once __DIR__.'/../dbconnect.php';
    header('Content-type: application/json');
    //checking api_key
    //if api key invalid user can't use this api
    $result = isValidApiKey($mysqli);
    if ($result['error']) {
        sop($result);

        return;
    }
    $id = $request->getAttribute('id');
    $table_name = 'documentations';

    if (isRecordExist($table_name, $id, $mysqli)) {
        $stmp = $mysqli->prepare("DELETE FROM $table_name WHERE `id` = ? ");
        $stmp->bind_param('i', $id);
        $flag = $stmp->execute();
        $stmp->close();

        if ($flag) {
            $data['response'] = '200';
            $data['message'] = 'successfully deleted record';
        } else {
            $data['response'] = '201';
            $data['message'] = 'faield to deleted record';
        }
    } else {
        $data['response'] = '404';
        $data['message'] = 'incorrect record id';
    }

    sop($data);
}
