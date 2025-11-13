<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM expenses WHERE id=$id");
}
header("Location: index.php");
?>
