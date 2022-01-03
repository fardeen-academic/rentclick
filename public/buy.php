<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once "php/config.php";
$id = $_POST['productid'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from content WHERE id='$id'"));
?>


<?php include "header.php" ?>

<div class="buy-page">
    <h2 class="mb-5 text-center">Pay
        <?php echo $row['price'] . " to book " . $row['name']; ?>
    </h2>
    <form action="success.php" method="POST">
        <div class="card text-dark" style="padding: 50px;">
            <h1 class="fw-bold text-center">rentclick</h1>
            <h5 class="text-center">Pay BDT <?php echo $row['price']; ?></h5>

            <div class="mb-3">
                <label class="form-label" for="format-card-number">Product ID</label>
                <input class="form-control" type="text" name="productid" id="format-card-number" value="<?php echo $row['id']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label" for="format-card-number">Name on Card</label>
                <input class="form-control" type="text" id="format-card-number" data-delimiter=" " data-blocks="4 4 4 4" placeholder="John Doe">
            </div>



            <div class="mb-3">
                <label class="form-label" for="format-card-number">Card number</label>
                <input class="form-control" type="text" id="format-card-number" data-format="card" data-delimiter=" " data-blocks="4 4 4 4" placeholder="0000 0000 0000 0000">
            </div>

            <!-- Format: Credit card CVC -->
            <div class="mb-3">
                <label class="form-label" for="format-card-cvc">Card CVC</label>
                <input class="form-control" type="text" id="format-card-cvc" data-format="cvc" placeholder="000">
            </div>

            <!-- Format: Date -->
            <div class="mb-3">
                <label class="form-label" for="format-date">Expiry Date</label>
                <input class="form-control" type="text" id="format-date" data-format="date" placeholder="mm/yy">
            </div>

            <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
</div>


</div>