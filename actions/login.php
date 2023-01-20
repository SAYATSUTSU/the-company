<?php

include "../classes/User.php";

// instantiate / create object
$user = new User;

// call the method log in
$user->login($_POST);
