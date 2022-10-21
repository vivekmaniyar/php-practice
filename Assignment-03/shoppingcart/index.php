<?php include 'header.php'; ?>
    <?php
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='col-md-4'>
            <div class='card mb-4 shadow-sm'>
            <img class='card-img-top' src='images/".$row['category_image']."' alt='Card image cap' style='height: 225px;'>
            <div class='card-body'>
            <p class='card-text'>".$row['category_name']."</p>
            <div class='d-flex justify-content-between align-items-center'>
            <div class='btn-group'>
            <a href='products.php?id=".$row['category_id']."'><button type='button' class='btn btn-sm btn-outline-secondary'>View</button></a>
            </div>
            </div>
            </div>
            </div>
            </div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
<?php include 'footer.php'; ?>