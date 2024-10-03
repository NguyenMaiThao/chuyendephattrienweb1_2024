<?php
// Bắt đầu session
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit; // Dừng xử lý nếu người dùng chưa đăng nhập
}

require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL;
$id = NULL;

// Custom Decoding function: Giải mã ID được truyền qua URL
function customDecodeId($encoded_id) {
    $mapping = [
        '&*BUYG' => '1',
        ')(*YH' => '2',
        'KJH*8' => '3',
        'PLMN@' => '4',
        'HGFR#' => '5',
        'A@KCN' => '9',
        // Thêm các quy ước mã hóa/giải mã khác tùy ý
    ];
    return isset($mapping[$encoded_id]) ? $mapping[$encoded_id] : null;
}

if (!empty($_GET['id'])) {
    // Giải mã ID từ URL
    $encodedId = $_GET['id'];
    $id = customDecodeId($encodedId);
    
    if ($id === null) {
        die('ID không hợp lệ'); // Nếu ID không hợp lệ
    }
    
    // Kiểm tra nếu ID trong session khớp với ID yêu cầu
    if ($id != $_SESSION['user_id']) {
        die('Bạn không có quyền truy cập dữ liệu của người dùng khác!');
    }

    // Tìm user theo ID giải mã
    $user = $userModel->findUserById($id);
    
    if (!$user) {
        die('Không tìm thấy người dùng.');
    }
} else {
    die('ID không tồn tại.');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <?php include 'views/meta.php'; ?>
</head>
<body>
<?php include 'views/header.php'; ?>
<div class="container">
    <?php if ($user) { ?>
        <div class="alert alert-warning" role="alert">
            User Profile
        </div>
        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <span><?php echo htmlspecialchars($user[0]['name']); ?></span>
            </div>
            <div class="form-group">
                <label for="fullname">Fullname</label>
                <span><?php echo htmlspecialchars($user[0]['fullname']); ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <span><?php echo htmlspecialchars($user[0]['email']); ?></span>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            User not found!
        </div>
    <?php } ?>
</div>
</body>
</html>
