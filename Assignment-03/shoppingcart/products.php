<?php include 'header.php'; ?>
<?php
include 'connection.php';
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE category_id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    // Apply pagination
    $total_records = $result->num_rows;
    $limit = 3;
    $total_pages = ceil($total_records / $limit);
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM products WHERE category_id = $id LIMIT $offset, $limit";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_image = $row['product_image'];
            $product_price = $row['price'];
            echo "<div class='col-md-4'>
            <div class='card'>
            <img src='images/$product_image' class='card-img-top' alt='product image' style='height: 225px;'>
            <div class='card-body'>
            <h5 class='card-title'>$product_name</h5>
            <p class='card-text'>$product_price</p>
            <a href='add_to_cart.php?id=".$row['product_id']."'><button type='button' class='btn btn-sm btn-outline-secondary'>Add to cart</button></a>
            </div>
            </div>
            </div>";
        }
    }
    // Pagination
    echo "<div class='col-md-12'>
    <nav aria-label='Page navigation example'>
    <ul class='pagination justify-content-center'>";
    if ($page > 1) {
        echo "<li class='page-item'><a class='page-link' href='products.php?id=$id&page=".($page - 1)."'>Previous</a></li>";
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            $active = "active";
        } else {
            $active = "";
        }
        echo "<li class='page-item $active'><a class='page-link' href='products.php?id=$id&page=$i'>$i</a></li>";
    }
    if ($total_pages > $page) {
        echo "<li class='page-item'><a class='page-link' href='products.php?id=$id&page=".($page + 1)."'>Next</a></li>";
    }
    echo "</ul>
    </nav>
    </div>";
} else {
    echo "0 results";
}
$conn->close();
?>