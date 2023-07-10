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

function createUser() {
    
}

function updateUser($data, $id) {
    $users = getUsers();
    foreach ($users as $i => $user){
        if($user['id'] == $id){
            $users[$i] = array_merge($user, $data);
        }
    }
    
    file_put_contents( "users.json", json_encode($users));
}

function deleteUsers() {
    
}
