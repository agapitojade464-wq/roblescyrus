<?php

$conn = new mysqli('localhost', 'root', '', 'phpcrud_robles_cyrus');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
