<?php
require_once __DIR__ . '/partials/header.php';
include_once __DIR__ . '/users/users.php';
if (!isset($_GET['id'])) {
    include_once 'partials/not_found.php';
    exit;
}

$userid = $_GET['id'];

$user = getUserById($userid);
if (!$user) {
    include_once 'partials/not_found.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = updateUser($_POST, $userid);
    
    if (isset($_FILES['picture'])) {
        uploadImage($_FILES['picture'], $user);
    }
    
    header("location: index.php");
}
 include_once '_form.php'; 
 ?>

