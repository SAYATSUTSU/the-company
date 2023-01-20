<?php

include "../classes/User.php";

// instantiate / create obj
$user_obj = new User;

// call the method store
$user_obj->store($_POST);
