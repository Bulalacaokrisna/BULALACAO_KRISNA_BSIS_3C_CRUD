<?php

include "auth_check.php";
include "database.php";

if (isset($_POST['name'])) {

    $name = $_POST['name'];

    $stmt = $conn->prepare("INSERT INTO students (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();
}

header("Location: index.php");
exit();

?>