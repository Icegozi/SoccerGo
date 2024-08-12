<?php
require_once __DIR__ . '/../BLL/promotionService.php';

$promotion = new PromotionService();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'delete':
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                $result = $promotion->delete($id);
                if ($result) {
                    echo '<script type="text/javascript">alert("Promotion deleted successfully."); location.replace("promotionManage.php");</script>';
                } else {
                    echo "Failed to delete promotion.";
                }
                exit();
            }
            break;
        default:
            break;
    }
}

$promos = $promotion->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Promotions</title>
    <link rel="stylesheet" href="css/accountManage.css?v=<?php echo time() ?>">
</head>

<body>
    <header class="header_pitchManage">
        <div class="header_content">
            <img class="logo" src="./img/logocauthu.png" alt="">
            <h1>Manage Promotions</h1>
        </div>
    </header>
    <table border="0">
        <tr>
            <th>#</th>
            <th>Mã Khuyến Mại</th>
            <th>Mức Khuyến Mại</th>
            <th>Số lượng</th>
            <th>Hành Động</th>
        </tr>
        <?php $i = 1; ?>
    <?php foreach ($promos as $promo): ?>
    <tr>
        <td><?php echo $i; ?></td> <!-- Hiển thị số thứ tự -->
        <td><?php echo htmlspecialchars($promo->makm); ?></td>
        <td><?php echo htmlspecialchars($promo->muckm); ?></td>
        <td><?php echo htmlspecialchars($promo->soluong); ?></td>
        <td class="usecase">
            <a href="editPromotion.php?action=edit&id=<?php echo htmlspecialchars($promo->makm); ?>">Sửa</a> |
            <a href="promotionManage.php?action=delete&id=<?php echo htmlspecialchars($promo->makm); ?>"
                onclick="return confirm('Are you sure?')">Xóa</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
        <tr>
            <td colspan="4"></td>
            <td class="addPromotion">
                <a href="addPromotion.php">Thêm</a>
            </td>
        </tr>
    </table>
</body>

</html>
