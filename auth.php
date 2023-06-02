<?php
error_reporting(0);
require_once('api/conn.php');
 
$postData = file_get_contents('php://input');
$data = json_decode($postData);
 
$login = $data->login;
$password = $data->password;
 
$sql_request = "SELECT id, login, role, first_name, last_name
                FROM table_users
                WHERE login = '$login' AND password = '$password'";
 
$result = $conn->query($sql_request);
$user_data = $result->fetch();
 
if ($user_data) {
    $response = [
        'status' => 'Success',
        'user_id' => $user_data['id'],
        'user_login' => $user_data['login'],
        'user_role' => $user_data['role'],
        'person_surname' => $user_data['first_name'],
        'person_name' => $user_data['last_name']
    ];
    echo json_encode($response);
} else {
    $response = [
        'status' => 'Failed'
    ];
    echo json_encode($response);
}
 
 

?>