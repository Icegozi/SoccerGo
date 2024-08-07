<?php
require_once __DIR__ . '/../BLL/UserService.php';

// Khởi tạo UserService để sử dụng các phương thức xử lý người dùng
$userService = new UserService();

// Xử lý các action (nếu có)
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    switch ($action) {
        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $result = $userService->deleteUser($id);
                if ($result) {
                    echo '<script type="text/javascript">alert("User deleted successfully."); location.replace("dashboard_admin.php");</script>';
                    exit(); 
                } else {
                    echo "Failed to delete user.";
                }
            }
            break;
        default:
            break;
    }
}
$users = $userService->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảo chì tài khoản</title>
    <link rel="stylesheet" href="css/accountManage.css?v= <?php echo time() ?>">
</head>

<body>
    <header class="header_pitchManage">
        <div class="header_content">
            <img class="logo" src="./img/logocauthu.png" alt="not found image.">
            <h1>Bảo chì tài khoản</h1>
        </div>
    </header>
    <table border="0" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Loại tài khoản</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['phone']; ?></td>
            <td><?php echo $user['address']; ?></td>
            <td><?php echo $userService->findNameType( $user['type'])?></td>
            <td class="usecase">
                <a href="editAdmin.php?action=edit&id=<?php echo $user['id']; ?>" style="margin-right: 10px;">Sửa</a>
            </td>
            <td class="usecase">
                <a href="accountManage.php?action=delete&id=<?php echo $user['id']; ?>"
                    onclick="return confirm('Are you sure?')">Xóa</a>
            </td>
        </tr>

        <?php endforeach; ?>
        <tr>
            <td colspan="6"></td>
            <td colspan="2" class="addUser">
                <a href="addUser.php">Thêm</a>
            </td>
        </tr>
    </table>
</body>

</html>