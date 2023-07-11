<?php
require_once __DIR__ . '/partials/header.php';
include_once __DIR__ . '/users/users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_FILES['picture'])) {
        uploadImage($_FILES['picture'], $user);
    }
    
    header("location: index.php");
}

