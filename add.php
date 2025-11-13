<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];

    $sql = "INSERT INTO expenses (title, amount, type) VALUES ('$title', '$amount', '$type')";
    $conn->query($sql);
}
header("Location: index.php");
?>
