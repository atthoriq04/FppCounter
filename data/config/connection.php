<?php
$con = mysqli_connect("localhost", "root", "root", "mycounter");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
