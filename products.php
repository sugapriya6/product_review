<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>All Products</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>All Products</h1>
  <div class="product-list">
  <?php
    $res = $conn->query("SELECT * FROM products");
    if ($res->num_rows > 0) {
      while($row = $res->fetch_assoc()) {
        echo "<div class='product-card'>";
        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<img src='images/{$row['image']}' alt='{$row['name']}' style='max-width:150px;'><br>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<a href='index.php?id={$row['id']}'>View & Review</a>";
        echo "</div>";
      }
    } else {
      echo "<p>No products found.</p>";
    }
  ?>
  </div>
</body>
</html>