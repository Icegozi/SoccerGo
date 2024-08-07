<?php
require_once '../DAL/orderData.php'; 
include 'header_admin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/orderHistory.css?v=<?php echo time(); ?>">
</head>

<body>
    <header class="header_pitchManage">
        <div class="header_content">
            <img class="logo" src="./img/logocauthu.png" alt="">
            <h2>Quản lý đơn hàng</h2>
        </div>
    </header>
    <table id="table_order" class="table table-striped" style="width:100%; margin-bottom:20px;">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Tiền cọc</th>
                <th>Tổng số tiền</th>
                <th>Mã giảm giá</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                                // Lấy danh sách các order và hiển thị
                                $orders = getAllOrders(); 

                                foreach ($orders as $order) {
                                    echo "<tr>";
                                    echo "<td>{$order['id']}</td>";
                                    echo "<td>{$order['name']}</td>";
                                    echo "<td>{$order['phone']}</td>";
                                    echo "<td>{$order['email']}</td>";
                                    echo "<td>{$order['start_at']}</td>";
                                    echo "<td>{$order['end_at']}</td>";
                                    echo "<td>{$order['deposit']}</td>";
                                    echo "<td>{$order['total']}</td>";
                                    echo "<td>{$order['code']}</td>";
                                    echo "<td>";
                                   
                                    if ($order['status'] == 1) {
                                        echo "<span class='badge bg-success'>Đang đá</span>";
                                    } elseif ($order['status'] == 2) {
                                        echo "<span class='badge bg-warning'>Chuẩn bị kết thúc</span>";
                                    } elseif ($order['status'] == 3) {
                                        echo "<span class='badge bg-secondary'>Kết thúc</span>";
                                    } else {
                                        echo "<span class='badge bg-info'>Đã đặt</span>";
                                    }

                                    echo "</td>";
                                    echo "<td><a href='edit_order.php?id={$order['id']}'>Sửa</a></td>";
                                    echo "<td><a href='#'>Xóa</a></td>"; 
                                    echo "</tr>";
                                }
                                ?>
        </tbody>
    </table>
    </div>
    </section>

</body>

</html>

<?php
include 'footer.php';
?>