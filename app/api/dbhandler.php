<?php
	/**
	* 
	*/
	class DBhandler
	{
		
		function swarfd($project_id){

			$project_id = 4;
			require_once('dbconnect.php');

			$stmp = $mysqli-> prepare("SELECT `id` FROM `projects` WHERE id =? ");
			$stmp->bind_param("i",$project_id);
			$stmp->execute();
			$stmp->store_result();
			$num_rows = $stmp->num_rows;
			$stmp->close();
			echo $num_rows>0;
		
		}
	}
?>