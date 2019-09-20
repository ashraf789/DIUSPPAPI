<?php

    //#CRUD
    //CREATE
    //READ
    //UPDATE
    //DELETE

$app->get('/api/project/read', 'readProject');
$app->get('/api/project/read/{id}', 'readSpecificProject');
$app->post('/api/project/add', 'createProject');
$app->put('/api/project/update/{id}', 'updateProject');
$app->delete('/api/project/delete/{id}', 'deleteProject');

    //read all project from project table
function readProject()
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
    $query = 'select *from projects order by id';
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    if (isset($data)) {
        //isset means checking null value
        echo json_encode($data);
    }
}

    //read project by specific project id

function readSpecificProject($request)
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
    $id = $request->getAttribute('id');
    $query = "select *from projects where id = $id";

    $result = $mysqli->query($query);
    $data = $result->fetch_assoc();

    if (isset($data)) {
        echo json_encode($data);
    } else {
        echo json_encode('message : No record found');
    }
}

    //create new project
function createProject($request)
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
    $query = 'INSERT INTO `projects`(`project_name`, `group_name`, `slug`, `semester`, `subject`, `catagory`, `language`, `framework`, `admin_id`) values (?,?,?,?,?,?,?,?,?)';

    $stmp = $mysqli->prepare($query);
    $stmp->bind_param('sssssssss', $p_name, $p_group, $p_slug, $p_semester, $p_subject, $p_catagory, $p_language, $p_framework, $p_admin_id);

    $p_name = $request->getParsedBody()['p_name'];
    $p_group = $request->getParsedBody()['p_group'];
    $p_slug = $request->getParsedBody()['p_slug'];
    $p_semester = $request->getParsedBody()['p_semester'];
    $p_subject = $request->getParsedBody()['p_subject'];
    $p_catagory = $request->getParsedBody()['p_catagory'];
    $p_language = $request->getParsedBody()['p_language'];
    $p_framework = $request->getParsedBody()['p_framework'];
    $p_admin_id = $request->getParsedBody()['p_admin_id'];

    if ($stmp->execute()) {
        sop('message : successfully created project');
    } else {
        sop('message : faield to create project');
    }
}

    //update a project with specific project id
function updateProject($request)
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
    $p_name = $request->getParsedBody()['p_name'];
    $p_group = $request->getParsedBody()['p_group'];
    $p_slug = $request->getParsedBody()['p_slug'];
    $p_semester = $request->getParsedBody()['p_semester'];
    $p_subject = $request->getParsedBody()['p_subject'];
    $p_catagory = $request->getParsedBody()['p_catagory'];
    $p_language = $request->getParsedBody()['p_language'];
    $p_framework = $request->getParsedBody()['p_framework'];
    $p_admin_id = $request->getParsedBody()['p_admin_id'];
    $p_id = $request->getAttribute('id');

    $query = "UPDATE `projects` SET `project_name`=? ,`group_name`=?,`slug`=?,`semester`=?,`subject`=?,`catagory`=?,`language`=?,`framework`=?,`admin_id`=? WHERE id = '".$p_id."' ";

    $stmp = $mysqli->prepare($query);
    $stmp->bind_param('sssssssss', $p_name, $p_group, $p_slug, $p_semester, $p_subject, $p_catagory, $p_language, $p_framework, $p_admin_id);

    if ($stmp->execute()) {
        sop('message : successfully updated project');
    } else {
        sop('message : faield to update project');
    }
}

    //delete project with specific id
function deleteProject($request)
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
    $p_id = $request->getAttribute('id');
    $query = "DELETE FROM `projects` WHERE id = $p_id";
    // $result = mysqli_query($mysqli,$query);

    if ($mysqli->query($query) === true) {
        sop('message : successfully deleted project');
    } else {
        sop('message : faield to delete project');
    }
}
