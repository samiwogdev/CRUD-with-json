<?php
require_once __DIR__.'/partials/header.php';
include_once __DIR__.'/users.php';
if(!isset($_GET['id'])){
    echo 'not found';
    exit;
}
$userid = $_GET['id'];
$user = getUserById($userid);
if(!$user){
    echo 'not found';
    exit;
}
?>
 <table class="table">
            <tbody>
            <tr>
                <th>Name:</th>
                <td><?php echo $user['name'] ?></td>
            </tr>
            <tr>
                <th>Username:</th>
                <td><?php echo $user['username'] ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $user['email'] ?></td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td><?php echo $user['phone'] ?></td>
            </tr>
            <tr>
                <th>Website:</th>
                <td>
                    <a target="_blank" href="http://<?php echo $user['website'] ?>">
                        <?php echo $user['website'] ?>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
<?php require_once __DIR__.'/partials/footer.php'; ?>