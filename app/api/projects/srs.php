<?php


$app -> get('/api/srs/read/{project_id}','readSRS');
$app -> post('/api/srs/add','addSRS');
$app -> put('/api/srs/update/{id}','updateSRS');
$app -> delete('/api/srs/delete/{id}','deleteSRS');



function readSRS($request){
	header("Content-type: application/json");
	require_once('/../dbconnect.php');
	//checking api_key
	//if api key invalid user can't use this api
	$result = isValidApiKey($mysqli);
	if ($result['error']) {
		sop($result);
		return;
	}

	$table_name = 'software_requirement_specifications';

	$id = $request -> getAttribute('project_id');
	$query = "select *from $table_name where project_id = $id";

	$result = $mysqli->query($query);
	$data = $result->fetch_assoc();

	if (isset($data)) {
		echo json_encode($data);
	}else{
		echo json_encode("message : No record found");
	}
}

function addSRS($request){
	header("Content-type: application/json");
	require_once('/../dbconnect.php');

	//checking api_key
	//if api key invalid user can't use this api
	$result = isValidApiKey($mysqli);
	if (!$result['error']) {
		sop($result);
		return;
	}
	


	//checking request params is wrong or wright
	$response = verifyRequiredParams($request,array('srs', 'project_id', 'user_id'));
	if (!$response['error']) {
		$table_name = 'software_requirement_specifications';
		$query = "INSERT INTO $table_name (`srs`, `project_id`, `user_id`) VALUES (?,?,?)";

		$stmp = $mysqli-> prepare($query);
		$stmp->bind_param("sss",$srs,$project_id,$user_id);
		
		$srs = $request->getParsedBody()['srs'];
		$project_id = $request->getParsedBody()['project_id'];
		$user_id = $request->getParsedBody()['user_id'];
		//query for checking is project id exist on project table

		//here user id and proposal is foreign key so it must be a valid id
		$projectid_query = "SELECT `id` FROM `projects` WHERE id = '".$project_id."' "; 

		$result = $mysqli->query($projectid_query);
		$data = $result->fetch_assoc();

		if (isset($data)) {
			if ($stmp->execute()) {
				sop("message : successfully inserted proposal");
			}else{
				sop("message : faield to insert new proposal");
			}
		}else{
			sop("message: incorrect project id");
		}
	}else{
		sop($response);
	}



}

function updateSRS($request){
	header("Content-type: application/json");
	require_once('/../dbconnect.php');
	//checking api_key
	//if api key invalid user can't use this api
	$result = isValidApiKey($mysqli);
	if (!$result['error']) {
		sop($result);
		return;
	}
	

	//checking request params is wrong or wright
	$response = verifyRequiredParams($request,array('srs', 'project_id', 'user_id'));
	if (!$response['error']) {
		$table_name = 'software_requirement_specifications';
		$query = "UPDATE $table_name SET `srs`=?,`project_id`=?,`user_id`=? WHERE id = ? ";

		$stmp = $mysqli-> prepare($query);
		$stmp->bind_param("ssss",$srs,$project_id,$user_id,$id);


		$srs = $request->getParsedBody()['srs'];
		$project_id = $request->getParsedBody()['project_id'];
		$user_id = $request->getParsedBody()['user_id'];

		$id = $request -> getAttribute('id');


		//query for checking is project id exist on project table
		$projectid_query = "SELECT `id` FROM `projects` WHERE id = '".$project_id."' "; 

		$result = $mysqli->query($projectid_query);
		$data = $result->fetch_assoc();

		if (isset($data)) {
			if ($stmp->execute()) {
				sop("message : successfully updated project proposal ");
			}else{
				sop("message : faield to update project proposal");
			}
		}else{
			sop("message: incorrect project id");
		}
	}else{
		sop($response);
	}
}

function deleteSRS($request){
	require_once('/../dbconnect.php');
	header('Content-type: application/json');
	//checking api_key
	//if api key invalid user can't use this api
	$result = isValidApiKey($mysqli);
	if (!$result['error']) {
		sop($result);
		return;
	}
	
	$table_name = 'software_requirement_specifications';
	$id = $request -> getAttribute('id');

	$query = "DELETE FROM $table_name WHERE `id` = '".$id."' ";

	$result = $mysqli -> query($query);
	if ($result) {
		sop("successfully deleted feature ");
	}else{
		sop("faield to delete feature");
	}
}


?>