<?php

$app -> get('/api/review/read/{project_id}','readReview');
$app -> post('/api/review/add','addReview');
$app -> put('/api/review/update/{id}','updateReview');
$app -> delete('/api/review/delete/{id}','deleteReview');

function readReview($request){
	header("Content-type: application/json");
	require_once('/../dbconnect.php');
	//checking api_key
	//if api key invalid user can't use this api
	$result = isValidApiKey($mysqli);
	if ($result['error']) {
		sop($result);
		return;
	}

	$table_name = 'reviews';
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

function addReview($request){
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
	$response = verifyRequiredParams($request,array('review', 'project_id', 'user_id'));
	if (!$response['error']) {

		$review = $request->getParsedBody()['review'];
		$project_id = $request->getParsedBody()['project_id'];
		$user_id = $request->getParsedBody()['user_id'];
		$table_name = 'reviews';

		if (isUserExist($user_id,$mysqli)) {
			if (isProjectExist($project_id,$mysqli)) {
				$stmp = $mysqli-> prepare("INSERT INTO $table_name (`review`, `project_id`, `user_id`) VALUES (?,?,?)");
				$stmp->bind_param("sss",$review,$project_id,$user_id);

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

function updateReview($request){
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
	$response = verifyRequiredParams($request,array('review', 'project_id', 'user_id'));
	if (!$response['error']) {
		$id = $request -> getAttribute('id');
		$review = $request->getParsedBody()['review'];
		$project_id = $request->getParsedBody()['project_id'];
		$user_id = $request->getParsedBody()['user_id'];
		$table_name = 'reviews';

		if (isRecordExist($table_name,$id,$mysqli)) {
			if (isUserExist($user_id,$mysqli)) {
				if (isProjectExist($project_id,$mysqli)) {
					$stmp = $mysqli-> prepare("UPDATE $table_name SET `review`=?,`project_id`=?,`user_id`=? WHERE id = ? ");
					$stmp->bind_param("siii",$review,$project_id,$user_id,$id);

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

function deleteReview($request){
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
	$table_name = 'reviews';

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