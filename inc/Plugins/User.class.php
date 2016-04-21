<?php
//User.class.php

require_once $_SERVER['DOCUMENT_ROOT'].'/inc/Plugins/db.class.php';

class User {
public $id;
public $username;
public $hashedPassword;
public $email;
public $joinDate;

//Конструктор вызывается при создании нового объекта
//Takes an associative array with the DB row as an argument.
function __construct($data) {
$this->id = (isset($data['id'])) ? $data['id'] : "";
$this->username = (isset($data['username'])) ? $data['username'] : "";
$this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
$this->email = (isset($data['email'])) ? $data['email'] : "";
}

public function save($isNewUser = false) {
//create a new database object.
$db = new DB();

//if the user is already registered and we're
//just updating their info.
if(!$isNewUser) {
//set the data array
$data = array(
"username" => "'$this->username'",
"password" => "'$this->hashedPassword'",
"email" => "'$this->email'"
);

//update the row in the database
$db->update($data, 'users', 'id = '.$this->id);
}else {
//if the user is being registered for the first time.
$data = array(
"username" => "'$this->username'",
"password" => "'$this->hashedPassword'",
"email" => "'$this->email'",
);
$this->id = $db->insert($data, 'users');
$this->joinDate = time();
}
return true;
}
}
?>