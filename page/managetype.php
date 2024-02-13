<div class="container" style="margin-top: 5rem;">
    <div class="row">
        <div class="col mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "quickshop";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        $sql = "SELECT * FROM shop";
                        $result = $conn->query($sql);

                        if (isset($_POST['product_edit'])) {
                            $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
                            $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
                            $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
                            $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
                            $product_image = mysqli_real_escape_string($conn, $_POST['product_image']);
                            $product_type = mysqli_real_escape_string($conn, $_POST['product_type']);
                            $conn->query("UPDATE `shop` SET `type`='" . $product_type . "',`name`='" . $product_name . "',`description`='" . $product_description . "',`price`='" . $product_price . "',`image`='" . $product_image . "' WHERE `id`=" . $product_id . "");
                            header('location: ?page=managetype');
                        }

                        if (isset($_POST['add_product'])) {
                            $conn->query("INSERT INTO `shop`(`type`, `name`, `description`, `price`, `image`) VALUES ('NONE','สินค้าใหม่','สินค้าที่ไม่ได้ระบุโปรดรอแอดมินระบุสินค้านี้','0','https://storage.needpix.com/rsynced_images/coming-soon-1568623_1280.jpg')");
                            header('location: ?page=managetype');
                        }

                        if (isset($_POST['delete_product'])) {
                            $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
                            $conn->query("DELETE FROM shop WHERE `id` = " . $product_id . "");
                            header('location: ?page=managetype');
                        }

                        while ($row = $result->fetch_assoc()) :
                            $sql = "SELECT * FROM product WHERE type='" . $row['type'] . "'";
                            $result_check_product = $conn->query($sql);
                        ?>
                            <div class="col-md-3 mx-auto d-flex mt-2">
                                <div class="card">
                                    <div class="card-body flex-column">
                                        <form action="" method="post" class="align-self-end mt-auto">
                                            <label>รูปภาพ</label>
                                            <input class="form-control align-self-end" name="product_image" value="<?php echo $row['image']; ?>">
                                            <div class="mt-2">
                                                <label>ชื่อสินค้า</label>
                                                <input class="form-control" name="product_name" value="<?php echo $row['name']; ?>">
                                            </div>
                                            <div class="mt-2">
                                                <label>ประเภทสินค้า</label>
                                                <input class="form-control" name="product_type" value="<?php echo $row['type']; ?>">
                                            </div>
                                            <div class="mt-2">
                                                <label>คำอธิบายสินค้า</label>
                                                <input class="form-control" name="product_description" value="<?php echo $row['description']; ?>">
                                            </div>
                                            <div class="mt-2">
                                                <label>ราคาสินค้า</label>
                                                <input class="form-control" name="product_price" value="<?php echo $row['price']; ?>">
                                            </div>
                                            <input type="hidden" value="<?php echo $row['id']; ?>" name="product_id">
                                            <button class="btn btn-primary mt-2 w-100" name="product_edit"><i class="fa-solid fa-pen-to-square"></i>&nbsp;แก้ไขสินค้า</button>
                                            <button class="btn btn-danger mt-2 w-100" name="delete_product"><i class="fa-solid fa-times"></i>&nbsp;ลบสินค้า</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <form action="" method="post">
                            <button class="col-md-3 mx-auto d-flex mt-2 btn" name="add_product">
                                <div class="card h-5">
                                    <img src="https://t4.ftcdn.net/jpg/01/26/10/59/360_F_126105961_6vHCTRX2cPOnQTBvx9OSAwRUapYTEmYA.jpg" class="card-img-top" alt="...">
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $conn->close(); ?>