<?php

include "auth_check.php";
include "database.php";

if (isset($_POST['id']) && isset($_POST['name'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];

    $stmt = $conn->prepare(
        "UPDATE students SET name = ? WHERE id = ?"
    );

    $stmt->bind_param("si", $name, $id);
    $stmt->execute();
}

header("Location: index.php");
exit();

?>