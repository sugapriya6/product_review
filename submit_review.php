<?php
include 'db.php';
$product_id = $_POST['product_id'];
$username = $_POST['username'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

if ($rating < 1 || $rating > 5) {
    die("Invalid rating value.");
}
$sql = "INSERT INTO reviews (product_id, username, rating, comment)
        VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isis", $product_id, $username, $rating, $comment);
$stmt->execute();
$stmt->close();
header("Location: index.php?id=" . $product_id);
exit();
?>