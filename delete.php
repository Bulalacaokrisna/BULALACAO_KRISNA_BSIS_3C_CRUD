<?php

include "auth_check.php";
include "database.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $conn->prepare(
        "DELETE FROM students WHERE id = ?"
    );

    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: index.php");
exit();

?>