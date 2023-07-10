<?php

function getUsers() {
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);  // return array of array
//   return  json_decode(file_get_contents(__DIR__.'/users.json'), true);  // return array of object
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

function createUser() {
    
}

function updateUsers() {
    
}

function deleteUsers() {
    
}
