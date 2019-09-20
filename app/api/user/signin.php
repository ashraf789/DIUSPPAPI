<?php

$app->post('/api/login', function ($request) {
    require_once __DIR__.'/../dbconnect.php';
    header('Content-type: application/json');

    $u_email = $request->getParsedBody()['u_email'];
    $u_password = $request->getParsedBody()['u_password'];

    $query = "SELECT * FROM users where email = '".$u_email."' and password = '".sha1($u_password)."' ";

    $result = $mysqli->query($query);
    $data = $result->fetch_assoc();

    if ($result == true && isset($data)) {
        echo json_encode($data);
    } else {
        echo json_encode('message: wrong email or password');
    }
});
