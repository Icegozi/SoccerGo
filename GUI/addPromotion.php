<?php
require_once __DIR__ . '/../BLL/promotionService.php';
include 'header_admin.php';

// Khởi tạo đối tượng PromotionService
$promotion = new PromotionService();

// Kiểm tra phương thức POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $makm = trim($_POST['makm']);
    $muckm = trim($_POST['muckm']);
    $soluong = trim($_POST['soluong']);
    
    // Thực hiện thêm khuyến mại
    $result = $promotion->add($makm, $muckm,$soluong);
    if ($result) {
        echo '<script type="text/javascript">alert("Promotion added successfully."); location.replace("promotionManage.php");</script>';
        exit();
    } else {
        echo "Failed to add promotion.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Promotion</title>
    <link rel="stylesheet" href="css/addUser.css?v=<?php echo time(); ?>">
</head>

<body>
    <h2>Add New Promotion</h2>
    <div class="container">
        <div class="col-md-6">
            <form method="POST">
                <div class="form-group">
                    <label for="makm">Mã Khuyến Mại</label>
                    <input type="text" id="makm" name="makm" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="muckm">Mức Khuyến Mại</label>
                    <input type="text" id="muckm" name="muckm" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="soluong">Số lượng</label>
                    <input type="text" id="soluong" name="soluong" class="form-control" required>
                </div>
                <button type="submit" class="btn">Add Promotion</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
include 'footer.php';
?>
