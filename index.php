<?php
include 'db.php';
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 1;
$product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();
if (!$product) die("Product not found.");
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $product['name']; ?> - Reviews</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="product">
  <h1><?php echo $product['name']; ?></h1>
  <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="max-width:200px;">
  <p><?php echo $product['description']; ?></p>
</div>
<div class="review-form">
  <h2>Submit Your Review</h2>
  <form action="submit_review.php" method="POST">
    <input type="hidden" name="product_id" value="<?= $product_id ?>">
    <label>Name:</label>
    <input type="text" name="username" required><br>
    <label>Rating:</label>
    <div class="stars">
      <input type="hidden" name="rating" id="rating" required>
      <span data-value="1">&#9733;</span>
      <span data-value="2">&#9733;</span>
      <span data-value="3">&#9733;</span>
      <span data-value="4">&#9733;</span>
      <span data-value="5">&#9733;</span>
    </div>
    <label>Comment:</label>
    <textarea name="comment" required></textarea><br>
    <button type="submit">Submit Review</button>
  </form>
</div>
<div class="reviews">
  <h2>Customer Reviews</h2>
  <?php
  $sql = "SELECT * FROM reviews WHERE product_id = $product_id ORDER BY review_date DESC";
  $result = $conn->query($sql);
  $count = 0;
  $total_rating = 0;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $count++;
          $total_rating += $row['rating'];
          echo "<div class='review'>";
          echo "<strong>" . htmlspecialchars($row['username']) . "</strong> ";
          echo "<span class='star'>" . str_repeat("★", $row['rating']) . "</span>";
          echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
          echo "<small>" . $row['review_date'] . "</small>";
          echo "</div>";
      }
      $average = round($total_rating / $count, 1);
      echo "<p><strong>Average Rating:</strong> $average / 5 ($count reviews)</p>";
  } else {
      echo "<p>No reviews yet.</p>";
  }
  ?>
</div>
<script src="script.js"></script>
</body>
</html>
