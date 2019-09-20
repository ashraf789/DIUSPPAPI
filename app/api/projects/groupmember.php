<?php

$app->get('/api/group/read', 'readGroups');
$app->get('/api/group/read/byprojectid/{project_id}', 'readSpecificGroupByProjectId');
$app->get('/api/group/read/byadminid/{admin_id}', 'readSpecificGroupByAdminId');
$app->post('/api/group/add', 'createGroup');
$app->put('/api/group/update/{project_id}', 'updateGroup');
$app->delete('/api/group/delete/{project_id}', 'deleteGroup');

    //read group information from groups table
function readGroups()
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
    $query = 'SELECT * FROM `groups` order by id ';
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    if (isset($data)) {
        sop($data);
    } else {
        sop('message : no record found');
    }
}

    //read a specific group infromation by project id
function readSpecificGroupByProjectId($request)
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
    $id = $request->getAttribute('project_id');

    $query = "SELECT * FROM `groups` where project_id = '".$id."' ";
    $result = $mysqli->query($query);

    $data = $result->fetch_assoc();

    if (isset($data)) {
        sop($data);
    } else {
        sop('message : no record found');
    }
}

function readSpecificGroupByAdminId($request)
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
    $id = $request->getAttribute('admin_id');

    $query = "SELECT * FROM `groups` where admin_id = '".$id."' ";
    $result = $mysqli->query($query);

    $data = $result->fetch_assoc();

    if (isset($data)) {
        sop($data);
    } else {
        sop('message : no record found');
    }
}

function createGroup($request)
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

    //Note : accourding to database design project_id is foreign key of project table id
    //so when enter data make sure project id is correct

    $g_re_id = $request->getParsedBody()['requirement_engineer'];
    $g_programmer_id = $request->getParsedBody()['programer'];
    $g_designer_id = $request->getParsedBody()['designer'];
    $g_tester_id = $request->getParsedBody()['tester'];
    $g_project_manager_id = $request->getParsedBody()['project_manager'];
    $g_srs_engineer_id = $request->getParsedBody()['srs'];
    $g_proposal_id = $request->getParsedBody()['proposal'];
    $g_documentation_id = $request->getParsedBody()['documentation'];
    $g_project_id = $request->getParsedBody()['project_id'];
    $g_admin_id = $request->getParsedBody()['admin_id'];

    $query = 'INSERT INTO groups(requirement_engineer, programer, designer, tester, project_manager, srs,proposal, documentation, project_id, admin_id) VALUES (?,?,?,?,?,?,?,?,?,?)';

    $stmp = $mysqli->prepare($query);
    $stmp->bind_param('ssssssssss', $g_re_id, $g_programmer_id, $g_designer_id, $g_tester_id, $g_project_manager_id, $g_srs_engineer_id, $g_proposal_id, $g_documentation_id, $g_project_id, $g_admin_id);

    //query for checking is project id exist on project table
    $projectid_query = "SELECT `id` FROM `projects` WHERE id = '".$g_project_id."' ";

    $result = $mysqli->query($projectid_query);
    $data = $result->fetch_assoc();

    if (isset($data)) {
        if ($stmp->execute()) {
            sop('message : successfully created new group');
        } else {
            sop('message : faield to create group');
        }
    } else {
        sop('message: incorrect project id');
    }
}

function updateGroup($request)
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
    $project_id = $request->getAttribute('project_id');

    $g_re_id = $request->getParsedBody()['requirement_engineer'];
    $g_programmer_id = $request->getParsedBody()['programer'];
    $g_designer_id = $request->getParsedBody()['designer'];
    $g_tester_id = $request->getParsedBody()['tester'];
    $g_project_manager_id = $request->getParsedBody()['project_manager'];
    $g_srs_engineer_id = $request->getParsedBody()['srs'];
    $g_proposal_id = $request->getParsedBody()['proposal'];
    $g_documentation_id = $request->getParsedBody()['documentation'];

    $query = 'UPDATE `groups` SET `requirement_engineer`=?,`programer`=?,`designer`=?,`tester`=?,`project_manager`=?,`srs`=?,`proposal`=?,`documentation`=? where project_id = ? ';

    $stmp = $mysqli->prepare($query);
    $stmp->bind_param('sssssssss', $g_re_id, $g_programmer_id, $g_designer_id, $g_tester_id, $g_project_manager_id, $g_srs_engineer_id, $g_proposal_id, $g_documentation_id, $project_id);

    //query for checking is project id exist on project table
    $projectid_query = "SELECT `id` FROM `projects` WHERE id = '".$project_id."' ";

    $result = $mysqli->query($projectid_query);
    $data = $result->fetch_assoc();

    if (isset($data)) {
        if ($stmp->execute()) {
            sop('message : successfully updated group details');
        } else {
            sop('message : faield to update group details');
        }
    } else {
        sop('message: incorrect project id');
    }
}

function deleteGroup($request)
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
    $project_id = $request->getAttribute('project_id');
    $query = "DELETE FROM `groups` WHERE project_id = '".$project_id."' ";

    $result = $mysqli->query($query);
    if ($result) {
        sop('successfully deleted group ');
    } else {
        sop('faield to delete group');
    }
}
