<?php
$db = mysqli_connect('localhost', 'root', '', 'ShamshuraRP42');
if(!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
