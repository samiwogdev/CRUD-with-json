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
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <?php if ($user['id']): ?>
                    Update user <b><?php echo $user['name'] ?></b>
                <?php else: ?>
                    Create new User
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">
            <?php include_once '_form.php'; ?>
        </div>
    </div>
</div>
