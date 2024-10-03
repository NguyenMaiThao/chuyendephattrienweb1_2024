<?php
session_start();
require_once 'models/UserModel.php';

$userModel = new UserModel();
$user = NULL; // Add new user
$id = NULL;

// Kiểm tra xem user có đăng nhập không (cần điều chỉnh tùy vào session của bạn)
if (!isset($_SESSION['user_id'])) {
    header('location: login.php'); // Điều hướng đến trang đăng nhập nếu user chưa đăng nhập
    exit;
}

// Kiểm tra nếu token CSRF tồn tại và hợp lệ
if (!empty($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    
    // Lấy ID từ URL
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        
        // Kiểm tra quyền của user hiện tại, chỉ cho phép xóa nếu user_id hiện tại trùng với id user được xóa
        if ($_SESSION['user_id'] == $id) {
            $userModel->deleteUserById($id); // Xóa user
        } else {
            die('Bạn không có quyền xóa user này.');
        }
    }

    // Xóa CSRF token sau khi sử dụng
    unset($_SESSION['csrf_token']);
    
} else {
    die('CSRF token không hợp lệ.');
}

header('location: list_users.php');
?>
