<?php
require '../connection/conn.php';
require'include/header.php'; 



//$title = $_SESSION['user_position'];
$mobile = $_SESSION['std_mobile'];

$orders = "SELECT * FROM `orders` WHERE `mobile` = '$mobile' ORDER BY `date` DESC";
$orders_r = $conn->query($orders);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>
    .card {
        border-radius: 15px;
    }
    .card-header {
        font-weight: bold;
        font-size: 1rem;
    }
    .badge {
        font-size: 0.9rem;
        padding: 6px 10px;
    }
</style>


    <meta charset="UTF-8">
    <title>داواکردنەکانم</title>
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4 text-center">📦 داواکردنەکانم</h2>

    <?php while($order = mysqli_fetch_array($orders_r)) { ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-dark text-white d-flex justify-content-between">
                <span><i class="fa fa-calendar-alt"></i> <?php echo $order['date']; ?></span>
                <span>
                    <?php 
                        if ($order['progress'] == 0) {
                            echo '<span class="badge bg-danger">نەتناردووە</span>';
                        } elseif ($order['progress'] == 1) {
                            echo '<span class="badge bg-warning text-dark">پێداچوونەوە</span>';
                        } elseif ($order['progress'] == 2) {
                            echo '<span class="badge bg-info text-dark">لە چاپخانەییە</span>';
                        } elseif ($order['progress'] == 3) {
                            echo '<span class="badge bg-secondary">گەیاندن</span>';
                        } elseif ($order['progress'] == 4 || $order['progress'] == 5) {
                            echo '<span class="badge bg-success">گەیشتووە</span>';
                        }
                    ?>
                </span>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ناونیشانی بابەت</th>
                            <th>مامۆستا</th>
                            <th>نرخی یەکە</th>
                            <th>ژمارە</th>
                            <th>کۆی گشتی</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $order_id = $order['order_id'];
                    $item_q = "SELECT * FROM `malzama`,`teacher`, `order_item` 
                               WHERE `malzama_teacher` =`teacher_id` and `malzama` = `malzama_id` 
                               AND `order` = '$order_id'";
                    $item_r = $conn->query($item_q);
                    $sum = 0;
                    while($item = mysqli_fetch_array($item_r)) {
                        $total = $item['sell_price'] * $item['number'];
                        $sum += $total;
                    ?>
                        <tr>
                            <td><?php echo $item['malzama_title']; ?></td>
                            <td><?php echo $item['teacher_name']; ?></td>
                            <td><?php echo number_format($item['sell_price'], 0); ?> دینار</td>
                            <td><?php echo $item['number']; ?></td>
                            <td><?php echo number_format($total, 0); ?> دینار</td>
                        </tr>
                    <?php } ?>
                        <tr class="table-info">
                            <td colspan="4" class="text-end"><strong>کۆی گشتی</strong></td>
                            <td><strong><?php echo number_format($sum, 0); ?> دینار</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>



   <?php require'include/footer.php';?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>
</html>
