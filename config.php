<?php

$conn = mysqli_connect('localhost', 'root', '', 'progess_data');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
