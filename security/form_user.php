<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; // Khởi tạo user
$_id = NULL;  // Khởi tạo ID

// Custom Encoding (Mã hóa ID)
function customEncodeId($id) {
    $mapping = [
        '1' => '&*BUYG',
        '2' => ')(*YH',
        '3' => 'KJH*8',
        '4' => 'PLMN@',
        '5' => 'HGFR#',
        '9' => 'A@KCN',
    ];
    
    return isset($mapping[$id]) ? $mapping[$id] : $id;
}

// Custom Decoding (Giải mã ID)
function customDecodeId($encoded_id) {
    $mapping = [
        '&*BUYG' => '1',
        ')(*YH' => '2',
        'KJH*8' => '3',
        'PLMN@' => '4',
        'HGFR#' => '5',
        'A@KCN' => '9',
    ];
    
    return isset($mapping[$encoded_id]) ? $mapping[$encoded_id] : null;
    if ($user) {
        print_r($user); // In thông tin user để kiểm tra
    }
        
}


// Nếu có ID trong URL, nghĩa là trang cập nhật user
if (!empty($_GET['id'])) {
    // Giải mã ID
    $_id = customDecodeId($_GET['id']);
    if ($_id === null) {
        die('ID không hợp lệ');  // Xử lý nếu ID không hợp lệ
    }
    // Lấy thông tin user từ database
    $user = $userModel->findUserById($_id);
}

// Xử lý form submit
$error_messages = [];
if (!empty($_POST['submit'])) {
    // Validate thông tin name
    if (empty($_POST['name']) || !preg_match('/^[a-zA-Z0-9]{5,15}$/', $_POST['name'])) {
        $error_messages[] = 'Tên không hợp lệ. Vui lòng nhập ký tự từ A-Z, a-z, 0-9, và chiều dài từ 5-15 ký tự.';
    }

    // Validate thông tin password 
    if (empty($_POST['password']) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/', $_POST['password'])) {
        $error_messages[] = 'Mật khẩu không hợp lệ. Mật khẩu phải có chữ thường, chữ HOA, số, ký tự đặc biệt, và chiều dài từ 5-10 ký tự.';
    }

    // Nếu không có lỗi, thực hiện thêm hoặc cập nhật user
    if (empty($error_messages)) {
        if (!empty($_id)) {
            $userModel->updateUser($_POST);  // Cập nhật user nếu có ID
        } else {
            $userModel->insertUser($_POST);  // Thêm user mới nếu không có ID
        }
        header('location: list_users.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <div class="alert alert-warning" role="alert">
            <?php echo !empty($_id) ? 'Cập nhật user' : 'Thêm user mới'; ?>
        </div>
        <form method="POST">
            <?php if (!empty($_id)) { ?>
                <!-- Mã hóa ID trước khi đưa vào input ẩn khi cập nhật -->
                <input type="hidden" name="id" value="<?php echo htmlspecialchars(customEncodeId($_id)); ?>">
            <?php } ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo htmlspecialchars($user[0]['name']); ?>'>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>

            <!-- Hiển thị thông báo lỗi nếu có -->
            <?php if (!empty($error_messages)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($error_messages as $error) {
                        echo htmlspecialchars($error) . '<br>';
                    } ?>
                </div>
            <?php } ?>

            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
