<?php


if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
	$url  = parse_url($_SERVER['REQUEST_URI']);
	$file = __DIR__ . $url['path'];

	if (is_file($file)) {
		return false;
	}
}

require __DIR__ . '/../vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Define app routes
$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello " . $args['name']);
});

$app->get('/', function ($request, $response, $args) {
    require_once __DIR__ .'/../templates/index.phtml';
    
});


require_once __DIR__ .'/../app/api/user/signin.php';
require_once __DIR__ .'/../app/api/user/signup.php';

require_once __DIR__ .'/../app/api/projects/documentation.php';
require_once __DIR__ .'/../app/api/projects/feature.php';
require_once __DIR__ .'/../app/api/projects/groupmember.php';
require_once __DIR__ .'/../app/api/projects/presentation.php';
require_once __DIR__ .'/../app/api/projects/project.php';
require_once __DIR__ .'/../app/api/projects/proposal.php';
require_once __DIR__ .'/../app/api/projects/review.php';
require_once __DIR__ .'/../app/api/projects/srs.php';
require_once __DIR__ .'/../app/api/projects/student.php';


//-------------------- all global functions ---------------------------
//print method 
function sop($data){
	echo json_encode($data);
}

function isProjectExist($project_id,$mysqli){
	$stmp = $mysqli-> prepare("SELECT `id` FROM `projects` WHERE id =? ");
	$stmp->bind_param("i",$project_id);
	$stmp->execute();
	$stmp->store_result();
	$num_rows = $stmp->num_rows;
	$stmp->close();
	return $num_rows>0;
}

function isUserExist($id,$mysqli){
	$stmp = $mysqli-> prepare("SELECT `id` FROM users WHERE id =? ");
	$stmp->bind_param("i",$id);
	$stmp->execute();
	$stmp->store_result();
	$num_rows = $stmp->num_rows;
	$stmp->close();
	return $num_rows>0;
}

function isRecordExist($table_name,$id,$mysqli){
	$stmp = $mysqli-> prepare("SELECT `id` FROM $table_name WHERE id =? ");
	$stmp->bind_param("i",$id);
	$stmp->execute();
	$stmp->store_result();
	$num_rows = $stmp->num_rows;
	$stmp->close();
	return $num_rows>0;
}

function verifyRequiredParams($request,$required_fields) {
	header('Content-type: applicaoint/json');
	$error = false;
	$error_fields = "";
	$request_params = array();

	parse_str($request->getBody(), $request_params);
	foreach ($required_fields as $field) {
		if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
			$error = true;
			$error_fields .= $field . ', ';
		}
	}

	if ($error) {
                // Required field(s) are missing or empty
                // echo error json and stop the app
		$response = array();
		$response["error"] = true;
		$response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';

	}else{
		$response["error"] = false;
	}
	return $response;
}

//checking api key
function isValidApiKey($mysqli){

	header('Content-type: application/json');
	$headers=array();
	foreach (getallheaders() as $name => $value) {
		$headers[$name] = $value;
	}

	if (isset($headers['x-api-key'])) {

		$api_key = $headers['x-api-key'];
		$stmp = $mysqli-> prepare("SELECT `id` FROM apikeys WHERE apikey =?");
		$stmp->bind_param("s",$api_key);
		$stmp->execute();
		$stmp->store_result();
		$num_rows = $stmp->num_rows;
		$stmp->close();
	
		if($num_rows>0){
			$response["error"] = false;
			$response["response"] = "200";
			$response["message"] = "OK";
		}else{
			$response["error"] = true;
			$response["response"] = "201";
			$response["message"] = "invalid api key";
		}
	}else{
		$response["error"] = true;
		$response["response"] = "400";
		$response["message"] = "x-api-key not found on header";
	}
	return $response;
}


$app->run();
function callStop(){
	$app->close();
}
?>