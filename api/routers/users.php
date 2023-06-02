<?php
 error_reporting(0);
function route($db, $method, $urlData, $formData) {
    switch ($method) {
        case 'GET':
            getUsers($db, $urlData);
            break;
 
        case 'POST':
            postUsers($db, $formData);
            break;
 
        case 'PUT':
            putUsers($db, $formData);
            break;
 
        case 'DELETE':
            deleteUsers($db, $formData);
            break;
 
        default:
            header('HTTP/1.0 400 Bad Request');
            echo json_encode(array(
                'error' => 'Bad Request'
            ));
            break;
    }
}
 
function getUsers($db, $urlData) {
    if (empty($urlData)) {
        $sql = 'SELECT id, login, first_name, last_name, role FROM table_users;';
        $result = $db->query($sql);
        $users = array();
        while($row = $result->fetch()){
            $users[] = [
                'id' => $row['id'],
                'login' => $row['login'],
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'role' => $row['role']
            ];
        }
 
        echo json_encode($users);
        return;
    }
 
    if (count($urlData) === 1) {        
        $userId = $urlData[0];
        $sql = "SELECT id, login, first_name, last_name, role FROM table_users WHERE id = '$userId';";
        $result = $db->query($sql);
        $user = $result->fetch();
        if($user) {
            echo json_encode(array(
                'status' => 'Success',
                'user' => array(
                    'id' => $user['id'],
                    'login' => $user['login'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'role' => $user['role']
                )
            ));
            return;
        } else {
            echo json_encode(array(
                'status' => 'Error',
                'message' => 'User not fount'
            ));
            return;
        }
    }
 
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(array(
        'error' => 'Bad Request'
    ));
    return;
}
 
function postUsers($db, $formData) {
    echo json_encode(array(
        'method' => 'POST'
    ));
}
 
function putUsers($db, $formData) {
    echo json_encode(array(
        'method' => 'PUT'
    ));
}
 
function deleteUsers($db, $formData) {
    echo json_encode(array(
        'method' => 'DELETE'
    ));
}
 
?>