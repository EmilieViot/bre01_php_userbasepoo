<?php

require "managers/UserManager.class.php";

$userManager = new UserManager();
$userManager->loadUsers();

echo "<pre>";
var_dump($userManager);
echo "</pre>";