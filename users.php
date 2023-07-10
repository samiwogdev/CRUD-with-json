<?php

function getUsers(){
   return  json_decode(file_get_contents(__DIR__.'/users.json'), true);  //for array of object
//   return  json_decode(file_get_contents(__DIR__.'/users.json'), true);  //for array of array
}

function getUserById(){
    
}

function createUser(){
    
}

function updateUsers(){
    
}

function deleteUsers(){
    
}

