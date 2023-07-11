<?php

require_once __DIR__ . '/partials/header.php';
include_once __DIR__ . '/users/users.php';

if (!isset($_POST['id'])) {
    include_once 'partials/not_found.php';
    exit;
}

$userid = $_POST['id'];

deleteUser($userid);

header("location: index.php");