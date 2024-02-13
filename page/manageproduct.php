<div class="container" style="margin-top: 5rem;">
    <div class="row">
        <div class="col-md-7 mx-auto">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ประเภทสินค้า</th>
                            <th scope="col">TXT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "quickshop";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        $sql = "SELECT * FROM product";
                        $result = $conn->query($sql);

                        if (isset($_POST['edit'])) {
                            $id = mysqli_real_escape_string($conn, $_POST['id']);
                            $type = mysqli_real_escape_string($conn, $_POST['type']);
                            $txt = mysqli_real_escape_string($conn, $_POST['txt']);

                            $conn->query("UPDATE product SET `type`='" . $type . "', `txt`='" . $txt . "' WHERE id=" . $id . "");
                            header('location: ?page=manageproduct');
                        }

                        if (isset($_POST['add'])) {
                            $conn->query("INSERT INTO `product`(`type`, `txt`) VALUES ('NONE','โปรดระบุใบเสร็จสินค้าและ กำหนด Type ให้ตรงกับสินค้า')");
                            header('location: ?page=manageproduct');
                        }


                        if (isset($_POST['delete'])) {
                            $id = mysqli_real_escape_string($conn, $_POST['id']);
                            $conn->query("DELETE FROM product WHERE `id` = " . $id . "");
                            header('location: ?page=manageproduct');
                        }

                        while ($row = $result->fetch_assoc()) :
                        ?>
                            <form action="" method="post">
                                <tr>
                                    <td><input type="text" name="type" value="<?php echo $row['type']; ?>"></td>
                                    <td><textarea name="txt"><?php echo $row['txt']; ?></textarea></td>
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <td><button class="btn btn-primary" name="edit"><i class="fa-solid fa-pen-to-square"></i>แก้ไข</button></td>
                                    <td><button class="btn btn-danger" name="delete"><i class="fa-solid fa-times"></i>ลบ</button></td>
                                </tr>
                            </form>
                        <?php endwhile; ?>
                    </tbody>

                </table>
            </div>
        </div>
        <form action="" method="post" class="mt-2">
            <button class="btn btn-primary w-100" name="add"><i class="fa-solid fa-plus"></i>&nbsp;เพิ่ม</button>
        </form>
    </div>
</div>
<?php $conn->close(); ?>