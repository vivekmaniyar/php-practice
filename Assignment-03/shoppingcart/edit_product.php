<!-- Edit product -->
<?php include 'header.php'; ?>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE product_id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $product_name = $row['product_name'];
            $product_image = $row['product_image'];
            $price = $row['price'];
            $category_id = $row['category_id'];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    <form action="update_product.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product_name; ?>">
        </div>
        <div class="form-group">
            <label for="product_image">Product Image</label>
            <input type="file" class="form-control" id="product_image" name="product_image">
            <img src="images/<?php echo $product_image; ?>" style="height: 50px;">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id">
                <?php
                include 'connection.php';
                $sql = "SELECT * FROM categories";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        if ($row['category_id'] == $category_id) {
                            echo "<option value='".$row['category_id']."' selected>".$row['category_name']."</option>";
                        } else {
                            echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                        }
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </select>
        </div>
        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
        <input type="submit" name="submit" class="btn btn-primary" value="Update Product">
    </form>
<?php include 'footer.php'; ?>