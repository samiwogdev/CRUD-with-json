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

            <form method="POST" enctype="multipart/form-data"
                  action="">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="<?php echo $user['name'] ?>"
                           class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['name'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" value="<?php echo $user['username'] ?>"
                           class="form-control <?php echo $errors['username'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['username'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="<?php echo $user['email'] ?>"
                           class="form-control  <?php echo $errors['email'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['email'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" value="<?php echo $user['phone'] ?>"
                           class="form-control  <?php echo $errors['phone'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['phone'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input name="website" value="<?php echo $user['website'] ?>"
                           class="form-control  <?php echo $errors['website'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['website'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>

?>