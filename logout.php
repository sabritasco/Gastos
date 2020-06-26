<?php
ob_start();
session_start();
require_once 'class/ParametersDB.php';
$user_obj = new class_User();
$data = $user_obj->logout();
