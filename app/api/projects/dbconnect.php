<?php
class DBhandler
{
	public function find($project_id){
		require_once __DIR__ .'/../dbconnect.php';

		$projectid_query = "SELECT `id` FROM `projects` WHERE id = '".$project_id."' "; 
		$result = $mysqli->query($projectid_query);
		$data = $result->fetch_assoc();

		if (isset($data)) {
			sop("all is ok");
		}else{
			sop("message: incorrect project id");
		}
	}
}

?>
