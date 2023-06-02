<?php
error_reporting(0);
require_once('api/conn.php');
 
$postData = file_get_contents('php://input');
$data = json_decode($postData);
 
$login = $data->login;
$password = md5($data->password);
$first_name = $data->first_name;
$last_name = $data->last_name;
$confirm_password = md5($data->confirm_password);
 
if ($password === $confirm_password) {

    $sql_request = "INSERT INTO `table_users` (`id`, `login`, `password`, `first_name`, `last_name`, `role`) VALUES (NULL,'$login','$password','$first_name','$last_name','user')";
    $conn->query($sql_request);

    $response = [
        'status' => 'Success'
    ];
    echo json_encode($response);
} else {
    $response = [
        'status' => 'Failed'
    ];
    echo json_encode($response);
}
?>