<div class="container" style="margin-top: 5rem;">
    <div class="row">
        <div class="col mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>&nbsp;เมื่อซื้อจะได้รับไฟล์เป็น TXT ที่ด้านในมี ไอดี, หรือ Gift Code ต่างๆ โปรดเก็บไว้เมื่อมีปัญหาสามารถนำมาแนบในแถบ รายงาน
                    </div>
                    <div class="alert alert-primary" role="alert">
                        <i class="fa-solid fa-circle-check"></i>&nbsp;เว็บไซต์นี้เป็นเพียงผลงาน Portfolio ไม่มีการใช้บัตรเครดิตหรือธุรกรรมการเงินแต่อย่างใด
                    </div>
                    <div class="row">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "quickshop";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        $sql = "SELECT * FROM shop";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) :
                            $sql = "SELECT * FROM product WHERE type='" . $row['type'] . "'";
                            $result_check_product = $conn->query($sql);
                        ?>
                            <div class="col-md-3 mx-auto d-flex mt-2">
                                <div class="card">
                                    <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                        <p class="card-text"><?php echo $row['description']; ?></p>
                                        <?php

                                        ?>
                                        <?php if ($result_check_product->num_rows > 0) : ?>
                                            <small>เหลือสินค้า: <?php echo $result_check_product->num_rows; ?> อัน</small>
                                            <hr>
                                            <a href="?buy=<?php echo $row['id']; ?>" style="width: 100%;" class="btn btn-primary align-self-end mt-auto"><i class="fa-solid fa-credit-card"></i>&nbsp;ซื้อทันที [ <?php echo $row['price']; ?> บาท ]</a>
                                        <?php else : ?>
                                            <a href="#" style="width: 100%;" class="btn btn-dark align-self-end mt-auto"><i class="fa-solid fa-box-open"></i>&nbsp;สินค้าหมด</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $conn->close(); ?>