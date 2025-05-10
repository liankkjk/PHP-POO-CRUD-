<?php
require_once "User.php";
$user = new User();

$id = $_GET['id'];
$user->delete($id);
header("Location: index.php");
?>
