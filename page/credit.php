<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickshop";

$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_POST['random_credit'])) {
    $sql = "UPDATE credit SET number='".rand(1000000000000000, 9999999999999999)."', cvv='".rand(100, 999)."' WHERE id=1";
    $result = $conn->query($sql);
}

if (isset($_POST['add_credit'])) {
    $sql = "UPDATE credit SET money=money+1000 WHERE id=1";
    $result = $conn->query($sql);
}

if (isset($_POST['reset_credit'])) {
    $sql = "UPDATE credit SET money=0 WHERE id=1";
    $result = $conn->query($sql);
}
?>
<div class="container" style="margin-top: 5rem;">
    <div class="row">
        <div class="col mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        <i class="fa-solid fa-circle-check"></i>&nbsp;เว็บไซต์นี้เป็นเพียงผลงาน Portfolio ไม่มีการใช้บัตรเครดิตหรือธุรกรรมการเงินแต่อย่างใด
                    </div>
                    <div class="row">
                        <?php

                        $sql = "SELECT * FROM credit";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) :
                        ?>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col mx-auto">
                                        <label for="cc-number" class="form-label">เลขบัตรเครดิต</label>
                                        <input type="text" class="form-control" id="cc-number" value="<?php echo $row['number'] ?>" required="" disabled>
                                    </div>
                                    <div class="col-md-3 mx-auto">
                                        <label for="cc-cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" value="<?php echo $row['cvv'] ?>" required="" disabled>
                                    </div>
                                    <div class="col mx-auto">
                                        <label for="cc-number" class="form-label">จำนวณเงิน</label>
                                        <input type="number" class="form-control" id="cc-number" value="<?php echo $row['money'] ?>" required="" disabled>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button class="btn btn-primary" style="width: 100%;" name="random_credit"><i class="fa-solid fa-repeat"></i>&nbsp;สุ่มเลขบัตร</button>
                                    <button class="btn btn-primary mt-2" style="width: 100%;" name="add_credit"><i class="fa-solid fa-money-bill"></i>&nbsp;เติมเงิน +1000</button>
                                    <button class="btn btn-danger mt-2" style="width: 100%;" name="reset_credit"><i class="fa-solid fa-money-bill-1"></i>&nbsp;รีเซ็ตเงิน</button>
                                </div>
                    </div>
                    </form>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $conn->close(); ?>