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
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = updateUser($_POST, $userid); 
 
    if (isset($_FILES['picture'])){
        if(!is_dir(__DIR__."/users/images")){
            mkdir(__DIR__."/users/images");
        }
        //Get the file extension from the filename
        $fileName = $_FILES['picture']['name'];
        //Search for the dot in the filename
        $dotPosition = strpos($fileName, '.');
        //Take the substring from the dot position till the end of the string
        $extension = substr($fileName, $dotPosition + 1);
        move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__."/users/images/$userid.$extension");
        $user['extension'] = $extension;
        updateUser($user, $userid);
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

?>