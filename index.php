<?php

require_once 'users.php';
$users = getUsers();
require_once __DIR__.'/partials/header.php';
?>
<div class="container">
        <table class="table">
            <thead>
                <tr>
<!--                    <th>Image</th>-->
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['phone'] ?></td>
                        <td>
                            <a href="https://<?php echo $user['website'] ?>" target="_blank"><?php echo $user['website'] ?></a>
                        </td>
                        <td> 
                            <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                            <a href="update.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                            <a href="delete.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
  <?php require_once __DIR__.'/partials/footer.php'; ?>