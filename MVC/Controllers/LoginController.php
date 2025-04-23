<?php
// controllers/LoginController.php

class LoginController extends controller
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = $this->model('loginModel');
    }
    function Get_data()
    {
        $this->view(
            'TracNghiem'
        );
    }

    public function login()
{
    $error_message = "";

    if (isset($_POST['dangnhap'])) {
        $User = $_POST['User'];
        $Pass = $_POST['Pass'];

        if (empty($User) || empty($Pass)) {
            $error_message = "Tên người dùng và mật khẩu không được rỗng!";
        } else {
            $userData = $this->loginModel->checkUser($User, $Pass);

            if ($userData && isset($userData['Role'])) {
                // Lưu thông tin người dùng vào session
                $_SESSION['User'] = $User; // Tên đăng nhập
                $_SESSION['Role'] = $userData['Role']; // Vai trò
                $_SESSION['Name'] = isset($userData['Name']) ? $userData['Name'] : ''; // Tên đầy đủ từ cột Name
                $_SESSION['masv'] = isset($userData['masv']) ? $userData['masv'] : ''; // Mã sinh viên

                // Điều hướng theo Role
                if ($_SESSION['Role'] == 1) {
                    header("Location: /Home/Get_data"); // Admin
                    exit();
                } else if ($_SESSION['Role'] == 0) {
                    header("Location: /Home/student"); // Sinh viên
                    exit();
                } else if ($_SESSION['Role'] == 2) {
                    header("Location: /Home/teacher"); // Giáo viên
                    exit();
                }
            } else {
                $error_message = "Tài khoản hoặc mật khẩu không đúng";
            }
        }
    }

    // Hiển thị thông báo lỗi nếu có
    if (!empty($error_message)) {
        echo '<script>alert("' . $error_message . '");</script>';
    }

    // Điều hướng về trang login
    echo '<script>window.location.href = "/LoginController";</script>';
}

}
