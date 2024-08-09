<?php
require_once __DIR__ . '/../BLL/UserService.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$userService = new UserService();
$user = $userService->getUserById($_SESSION['user_id']);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sửa thông tin cá nhân</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/userEdit.css?v= <?php echo time(); ?>">
</head>

<body>
    <header class="header_pitchManage">
        <div class="header_content">
            <h2>Sửa thông tin cá nhân</h2>
        </div>
    </header>
    <div class="container">
        <form action="update_profile.php" method="post">
            <div class="mb-3">
                <label for="tenKhachHang" class="form-label">Họ tên</label><br>
                <input type="text" class="form-control" id="tenKhachHang" name="tenKhachHang"
                    value="<?php echo $user['name']; ?>">
            </div>

            <div class="mb-3">
                <label for="matKhau" class="form-label">Mật khẩu</label><br>
                <input type="password" class="form-control" id="matKhau" name="matKhau" value="">
            </div>

            <div class="mb-3">
                <label for="xacNhan" class="form-label">Xác nhận mật khẩu</label><br>
                <input type="password" class="form-control" id="xacNhan" name="xacNhan" value="">
            </div>

            <div class="mb-3">
                <label for="soDienThoai" class="form-label">Số điện thoại</label><br>
                <input type="text" class="form-control" id="soDienThoai" name="soDienThoai"
                    value="<?php echo $user['phone']; ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label><br>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
            </div>

            <div class="mb-3">
                <label for="diaChi" class="form-label">Địa chỉ</label><br>
                <input type="text" class="form-control" id="diaChi" name="diaChi"
                    value="<?php echo $user['address']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
    </div>
    </main>
</body>

</html>