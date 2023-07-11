<?php

function getUsers() {
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);  // return array of array
//   return  json_decode(file_get_contents(__DIR__.'/users.json'));  // return array of object
}

function getUserById(int $id) {
    $users = getUsers();
    foreach ($users as $user):
        if ($user['id'] == $id) {
            return $user;
        }
    endforeach;
    return null;
}

function createUser($data) {
    $users = getUsers();
    $data[id] = rand(1000000, 2000000);
    $users[] = $data;
    putJson($users);
}

function updateUser($data, $id) {
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }
    putJson($users);
    return $updateUser;
}


function uploadImage($file, $user) {
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        // Get the file extension from the filename
        $fileName = $file['name'];
        // Search for the dot in the filename
        $dotPosition = strpos($fileName, '.');
        // Take the substring from the dot position till the end of the string
        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${user['id']}.$extension");

        $user['extension'] = $extension;
        updateUser($user, $user['id']);
    }
}
function putJson($users){
        file_put_contents("users/users.json", json_encode($users, JSON_PRETTY_PRINT));
}
