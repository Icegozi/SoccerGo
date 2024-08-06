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
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    #table_order tr th {
        background-color: #4CAF50;
        color: white;
    }

    .header_pitchManage {
        padding-top: 30px;
        background-color: rgb(41, 224, 81);
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        width: 100%;
        color: white;
        display: flex;
        flex-direction: column;
    }

    .header_content {
        padding-left: 50px;
        display: flex;
        /* Căn giữa các phần tử trong header_content theo chiều dọc */
    }

    .logo {
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    h1 {
        margin: 0;
        padding-bottom: 20px;
        font-size: 30px;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <header class="header_pitchManage">
        <div class="header_content">
            <img class="logo" src="./img/logocauthu.png" alt="">
            <h1>Quản lý đơn hàng</h1>
        </div>
    </header>
    <table id="table_order" class="table table-striped" style="width:100%; margin-bottom:1000px;">
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
                <th>Mã khuyến mãi</th>
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
                                        echo "<span style='color: green;'>Đang đá</span>";
                                    } elseif ($order['status'] == 2) {
                                        echo "<span style='color: red;'>Chuẩn bị kết thúc</span>";
                                    } elseif ($order['status'] == 3) {
                                        echo "<span style='color: orange;'>Kết thúc</span>";
                                    } else {
                                        echo "Đã đặt";
                                    }
                                    echo "</td>";
                                    echo "<td><a href='#'>Edit</a></td>"; 
                                    echo "<td><a href='#'>Delete</a></td>"; 
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