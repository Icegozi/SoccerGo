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
    <link rel="stylesheet" href="css/userEdit.css?v= <?php echo time(); ?>">
</head>

<body>
    <header class="header_pitchManage">
        <div class="header_content">

            <h2>SỬA THÔNG TIN CÁ NHÂN</h2>
        </div>
    </header>
    <div class="container">
        <div class="col-md-6">
            <form action="update_profile.php" method="post">
                <div class="form-group">
                    <label for="tenKhachHang">Họ tên</label><br>
                    <input type="text" class="form-control" id="tenKhachHang" name="tenKhachHang"
                        value="<?php echo $user['name']; ?>">
                </div>

                <div class="form-group">
                    <div class="">
                        <label for="matKhau">Mật khẩu</label><br>
                        <input type="password" class="form-control" id="matKhau" name="matKhau" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="">
                        <label for="xacNhan">Xác nhận mật khẩu</label><br>
                        <input type="password" class="form-control" id="xacNhan" name="xacNhan" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="soDienThoai">Số điện thoại</label><br>
                    <input type="text" class="form-control" id="soDienThoai" name="soDienThoai"
                        value="<?php echo $user['phone']; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php echo $user['email']; ?>">
                </div>

                <div class="form-group">
                    <label for="diaChi">Địa chỉ</label><br>
                    <input type="text" class="form-control" id="diaChi" name="diaChi"
                        value="<?php echo $user['address']; ?>">
                </div>

                <button type="submit" class="btn">Cập nhật</button>
            </form>
        </div>
    </div>
    </main>
</body>

</html>