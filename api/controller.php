<?php
error_reporting(0);
require_once('conn.php');

$method = $_SERVER['REQUEST_METHOD'];
$formData = json_decode(file_get_contents('php//:input'));

$url = (isset($_GET['q'])) ? $_GET['q'] : '';
$url = rtrim($url, '/');
$urls = explode('/', $url);
 
$router = $urls[0];
$urlData = array_slice($urls, 1);
 
include_once 'routers/' . $router . '.php';
route($conn, $method, $urlData, $formData);

?>