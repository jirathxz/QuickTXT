<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickshop";

$conn = new mysqli($servername, $username, $password, $dbname);

?>
<div class="container" style="margin-top: 3rem;">
    <div class="row">
        <div class="col mx-auto">
            <div class="card">
                <div class="card-body">
                    <?php
                    if (isset($_POST['buy'])) :
                        $number = mysqli_real_escape_string($conn, $_POST['number']);
                        $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);
                        $sql = "SELECT * FROM credit WHERE number=" . $number . " AND cvv=" . $cvv . "";
                        $result = $conn->query($sql);
                        $sql_shop = "SELECT * FROM shop WHERE id=" . $_GET['buy'] . "";
                        $result_shop = $conn->query($sql_shop);
                        if ($result->num_rows < 1) :
                    ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="fa-solid fa-times"></i>&nbsp;บัตรไม่ถูกต้อง
                            </div>
                        <?php
                        else :
                        ?>
                            <?php
                            if ($shop = $result_shop->fetch_assoc()) :
                                if ($credit = $result->fetch_assoc()) :
                                    if ($credit['money'] > $shop['price']) :
                            ?>
                                        <div class="alert alert-primary" role="alert">
                                            <i class="fa-solid fa-repeat"></i>&nbsp;กำลังซื้อ...
                                        </div>
                                        <?php
                                        $sql_shop = "UPDATE credit SET money=money-" . $shop['price'] . "";
                                        $result_shop = $conn->query($sql_shop);
                                        $sql_product = "SELECT * FROM product WHERE type='" . $shop['type'] . "'";
                                        $result_product = $conn->query($sql_product);
                                        if ($product = $result_product->fetch_assoc()) {
                                            header("refresh:2;url=?page=shop");
                                            $_SESSION['txt'] = $product['txt'];
                                            $_SESSION['product'] = $shop['name'];
                                            echo $shop['name'];
                                            $conn->query("DELETE FROM product WHERE id = " . $product['id'] . "");
                                            header('location: file.php');
                                        }
                                        ?>
                                    <?php else : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <i class="fa-solid fa-times"></i>&nbsp;เงินไม่เพียงพอ
                                        </div>
                            <?php endif;
                                endif;
                            endif; ?>
                        <?php
                        endif;
                    endif;

                    $sql = "SELECT * FROM shop WHERE id=" . $_GET['buy'] . "";
                    $result = $conn->query($sql);
                    if ($result->num_rows < 1) :
                        header("refresh:1;url=?page=shop");
                        ?>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa-solid fa-time"></i>&nbsp;ไม่พบสินค้า
                        </div>
                    <?php endif; ?>
                    <?php if ($result->num_rows > 0) : ?>
                        <?php 
                            $sql_shop = "SELECT * FROM shop WHERE id=" . $_GET['buy'] . "";
                            $result_shop = $conn->query($sql_shop);
                        ?>
                        <?php if ($row = $result_shop->fetch_assoc()) : ?>
                            <?php
                                $soldoutcheck = $conn->query("SELECT type FROM product WHERE `type`='".$row['type']."'");
                                if ($soldoutcheck->num_rows < 1) {
                                    header("location: ?page=shop");
                                }
                            ?>
                            <form action="" method="post">
                                <h4 class="mb-3"><i class="fa-solid fa-credit-card"></i>&nbsp;<?php echo $row['name']; ?></h4>
                                <h6 class="badge bg-primary">ราคา: <?php echo $row['price']; ?></h6>

                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <label for="cc-name" class="form-label">ชื่อบนบัตรเครดิต</label>
                                        <input type="text" class="form-control" id="cc-name" placeholder="ไม่จำเป็น" required="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cc-number" class="form-label">เลขบัตรเครดิต</label>
                                        <input type="number" class="form-control" name="number" id="cc-number" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            โปรดใส่เลขบัตรเครดิต
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cc-expiration" class="form-label">วันหมดอายุ</label>
                                        <input type="text" class="form-control" id="cc-expiration" placeholder="ไม่จำเป็น" required="" disabled>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cc-cvv" class="form-label">CVV</label>
                                        <input type="number" class="form-control" name="cvv" id="cc-cvv" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            โปรดใส่ CVV
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <button class="w-100 btn btn-primary btn-lg" type="submit" name="buy"><i class="fa-regular fa-credit-card"></i>&nbsp;ชำระเงิน</button>
                                <a class="w-100 btn btn-danger btn-lg mt-1" href="?page=shop"><i class="fa-solid fa-square-caret-left"></i>&nbsp;ย้อนกลับ</a>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $conn->close(); ?>