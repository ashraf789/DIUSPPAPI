<?php

$app->get('/api/proposal/read/{project_id}', 'readProposal');
$app->post('/api/proposal/add', 'addproposal');
$app->put('/api/proposal/update/{id}', 'updateProposal');
$app->delete('/api/proposal/delete/{id}', 'deleteProposal');

function readProposal($request)
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
    $id = $request->getAttribute('project_id');
    $query = "select *from proposals where project_id = $id";

    $result = $mysqli->query($query);
    $data = $result->fetch_assoc();

    if (isset($data)) {
        echo json_encode($data);
    } else {
        echo json_encode('message : No record found');
    }
}

function addproposal($request)
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
    $response = verifyRequiredParams($request, ['proposal', 'project_id', 'user_id']);
    if (!$response['error']) {
        $query = 'INSERT INTO `proposals`(`proposal`, `project_id`, `user_id`) VALUES (?,?,?)';

        $stmp = $mysqli->prepare($query);
        $stmp->bind_param('sss', $proposal, $project_id, $user_id);

        $proposal = $request->getParsedBody()['proposal'];
        $project_id = $request->getParsedBody()['project_id'];
        $user_id = $request->getParsedBody()['user_id'];

        //query for checking is project id exist on project table

        //here user id and proposal is foreign key so it must be a valid id
        $projectid_query = "SELECT `id` FROM `projects` WHERE id = '".$project_id."' ";

        $result = $mysqli->query($projectid_query);
        $data = $result->fetch_assoc();

        if (isset($data)) {
            if ($stmp->execute()) {
                sop('message : successfully inserted proposal');
            } else {
                sop('message : faield to insert new proposal');
            }
        } else {
            sop('message: incorrect project id');
        }
    } else {
        sop($response);
    }
}

function updateProposal($request)
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
    $response = verifyRequiredParams($request, ['proposal', 'project_id', 'user_id']);
    if (!$response['error']) {
        $query = 'UPDATE `proposals` SET `proposal`=?,`project_id`=?,`user_id`=? WHERE id = ? ';

        $stmp = $mysqli->prepare($query);
        $stmp->bind_param('ssss', $proposal, $project_id, $user_id, $id);

        $proposal = $request->getParsedBody()['proposal'];
        $project_id = $request->getParsedBody()['project_id'];
        $user_id = $request->getParsedBody()['user_id'];

        $id = $request->getAttribute('id');

        //query for checking is project id exist on project table
        $projectid_query = "SELECT `id` FROM `projects` WHERE id = '".$project_id."' ";

        $result = $mysqli->query($projectid_query);
        $data = $result->fetch_assoc();

        if (isset($data)) {
            if ($stmp->execute()) {
                sop('message : successfully updated project proposal ');
            } else {
                sop('message : faield to update project proposal');
            }
        } else {
            sop('message: incorrect project id');
        }
    } else {
        sop($response);
    }
}

function deleteProposal($request)
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

    $query = "DELETE FROM `proposals` WHERE `id` = '".$id."' ";

    $result = $mysqli->query($query);
    if ($result) {
        sop('successfully deleted feature ');
    } else {
        sop('faield to delete feature');
    }
}
