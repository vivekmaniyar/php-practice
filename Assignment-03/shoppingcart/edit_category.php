<!-- Edit category -->
<?php include 'header.php'; ?>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE category_id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $category_name = $row['category_name'];
            $category_image = $row['category_image'];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    <form action="update_category.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category_name; ?>">
        </div>
        <div class="form-group">
            <label for="category_image">Category Image</label>
            <input type="file" class="form-control" id="category_image" name="category_image">
            <img src="images/<?php echo $category_image; ?>" style="height: 50px;">
        </div>
        <input type="hidden" name="category_id" value="<?php echo $id; ?>">
        <input type="submit" name="submit" class="btn btn-primary" value="Update Category">
    </form>
<?php include 'footer.php'; ?>