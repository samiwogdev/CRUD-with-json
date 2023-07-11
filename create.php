<?php
require_once __DIR__ . '/partials/header.php';
include_once __DIR__ . '/users/users.php';

$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = createUser($_POST);
    
    if (isset($_FILES['picture'])) {
        uploadImage($_FILES['picture'], $user);
    }
    
    header("location: index.php");
}

 include_once '_form.php';