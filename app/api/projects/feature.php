<?php

$app -> get('/api/feature/read/{project_id}','readFeature');
$app -> post('/api/feature/add','addFeature');
$app -> put('/api/feature/update/{id}','updateFeature');
$app -> delete('/api/feature/delete/{id}','deleteFeature');

function readFeature($request){
	header("Content-type: application/json");
	require_once('/../dbconnect.php');
	//checking api_key
	//if api key invalid user can't use this api
	$result = isValidApiKey($mysqli);
	if ($result['error']) {
		sop($result);
		return;
	}
	$table_name = 'features';
	$id = $request -> getAttribute('project_id');
	$query = "select *from $table_name where project_id = $id";
	$result = $mysqli->query($query);

	while($row = $result->fetch_assoc()){
		$data[] = $row;
	}
	if (isset($data)) {
		echo json_encode($data);
	}else{
		$data["message"] = 'No record found';
		$data["reponse"] = "404";
		echo json_encode($data);
	}
}

function addFeature($request){
	header("Content-type: application/json");
	require_once('/../dbconnect.php');
	//checking api_key
	//if api key invalid user can't use this api
	$result = isValidApiKey($mysqli);
	if ($result['error']) {
		sop($result);
		return;
	}
	//checking request params is wrong or wright
	$response = verifyRequiredParams($request,array('feature', 'project_id', 'user_id'));
	if (!$response['error']) {
		$feature = $request->getParsedBody()['feature'];
		$project_id = $request->getParsedBody()['project_id'];
		$user_id = $request->getParsedBody()['user_id'];
		$table_name = 'features';

		if (isUserExist($user_id,$mysqli)) {
			if (isProjectExist($project_id,$mysqli)) {
				$stmp = $mysqli-> prepare("INSERT INTO $table_name (`feature`, `project_id`, `user_id`) VALUES (?,?,?)");
				$stmp->bind_param("sss",$feature,$project_id,$user_id);

				if ($stmp->execute()) {

					$data["response"] ="200";
					$data["message"] = "successfully inserted new record";
				}else{
					$data["response"] ="201";
					$data["message"] = "faield to insert new record";
				}
			}else{
				$data["response"] ="404";
				$data["message"] = "incorrect project id";
			}
		}else{
			$data["response"] ="404";
			$data["message"] = "incorrect user id";
		}
		sop($data);
	}else{
		sop($response);
	}
}

function updateFeature($request){
	header("Content-type: application/json");
	require_once('/../dbconnect.php');
	//checking api_key
	//if api key invalid user can't use this api
	$result = isValidApiKey($mysqli);
	if ($result['error']) {
		sop($result);
		return;
	}
	//checking request params is wrong or wright
	$response = verifyRequiredParams($request,array('feature', 'project_id', 'user_id'));


	if (!$response['error']) {
		$id = $request -> getAttribute('id');
		$feature = $request->getParsedBody()['feature'];
		$project_id = $request->getParsedBody()['project_id'];
		$user_id = $request->getParsedBody()['user_id'];
		$table_name = 'features';

		if (isRecordExist($table_name,$id,$mysqli)) {
			if (isUserExist($user_id,$mysqli)) {
				if (isProjectExist($project_id,$mysqli)) {
					$stmp = $mysqli-> prepare("UPDATE $table_name SET `feature`=?,`project_id`=?,`user_id`=? WHERE id = ? ");
					$stmp->bind_param("siii",$feature,$project_id,$user_id,$id);

					if ($stmp->execute()) {
						$data["response"] ="200";
						$data["message"] = "successfully update record";
					}else{
						$data["response"] ="201";
						$data["message"] = "faield to update record";
					}
				}else{
					$data["response"] ="404";
					$data["message"] = "incorrect project id";
				}
			}else{
				$data["response"] ="404";
				$data["message"] = "incorrect user id";
			}
		}else{
			$data["response"] ="404";
			$data["message"] = "incorrect record id";
		}
		sop($data);
	}else{
		sop($response);
	}
}

function deleteFeature($request){
	require_once('/../dbconnect.php');
	header('Content-type: application/json');
	//checking api_key
	//if api key invalid user can't use this api
	$result = isValidApiKey($mysqli);
	if ($result['error']) {
		sop($result);
		return;
	}
	$id = $request -> getAttribute('id');
	$table_name = 'features';

	if (isRecordExist($table_name,$id,$mysqli)) {
		$stmp = $mysqli ->prepare("DELETE FROM $table_name WHERE `id` = ? ");
		$stmp->bind_param('i',$id);
		$flag = $stmp->execute();
		$stmp->close();

		if ($flag) {
			$data["response"] = "200";
			$data["message"] = "successfully deleted record";
		}else{
			$data["response"] ="201";
			$data["message"] = "faield to deleted record";
		}
	}else{
		$data["response"] ="404";
		$data["message"] = "incorrect record id";
	}

	sop($data);

}
?>