<?php

include_once("index2.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM user WHERE id=$id");

header("location: index2.php");

?>