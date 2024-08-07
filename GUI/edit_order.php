<?php
require_once '../DAL/orderData.php'; 
include 'header_admin.php';

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $order = getOrderById($order_id); // Fetch order details by ID

    if ($order) {
        // The order details were found, you can now populate the form with the existing data
    } else {
        echo "Order not found.";
    }
} else {
    echo "No order selected.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission
    $updated_order = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'start_at' => $_POST['start_at'],
        'end_at' => $_POST['end_at'],
        'deposit' => $_POST['deposit'],
        'total' => $_POST['total'],
        'code' => $_POST['code'],
        'status' => $_POST['status']
    ];

    //updateOrder($updated_order); // Update the order in the database
    header('Location: index.php'); // Redirect back to the main page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa đơn hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/editOrder.css?v= <?php echo time() ?>">
</head>

<body>
    <h2>Chỉnh sửa đơn hàng</h2>
    <div class="container">
        <?php if ($order): ?>
        <form action="edit_order.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Tên khách hàng</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $order['name']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $order['phone']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $order['email']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="start_at" class="form-label">Thời gian bắt đầu</label>
                <input type="datetime-local" class="form-control" id="start_at" name="start_at"
                    value="<?php echo date('Y-m-d\TH:i', strtotime($order['start_at'])); ?>" required>
            </div>
            <div class="mb-3">
                <label for="end_at" class="form-label">Thời gian kết thúc</label>
                <input type="datetime-local" class="form-control" id="end_at" name="end_at"
                    value="<?php echo date('Y-m-d\TH:i', strtotime($order['end_at'])); ?>" required>
            </div>
            <div class="mb-3">
                <label for="deposit" class="form-label">Tiền cọc</label>
                <input type="number" class="form-control" id="deposit" name="deposit"
                    value="<?php echo $order['deposit']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Tổng số tiền</label>
                <input type="number" class="form-control" id="total" name="total" value="<?php echo $order['total']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Mã khuyến mãi</label>
                <input type="text" class="form-control" id="code" name="code" value="<?php echo $order['code']; ?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="1" <?php if ($order['status'] == 1) echo 'selected'; ?>>Đang đá</option>
                    <option value="2" <?php if ($order['status'] == 2) echo 'selected'; ?>>Chuẩn bị kết thúc</option>
                    <option value="3" <?php if ($order['status'] == 3) echo 'selected'; ?>>Kết thúc</option>
                    <option value="0" <?php if ($order['status'] == 0) echo 'selected'; ?>>Đã đặt</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
        <?php endif; ?>
    </div>
</body>

</html>

<?php
include 'footer.php';
?>