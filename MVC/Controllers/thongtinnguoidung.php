<?php
class thongtinnguoidung extends controller
{
    private $thongtinnguoidung;

    function __construct()
    {
        $this->thongtinnguoidung = $this->model('thongtinnguoidung_m');
    }

    function Get_data() {
        if (!isset($_SESSION['User'])) {
            header("Location: /Doan/LoginController");
            exit;
        }

        $User = $_SESSION['User'];
        $masv = $this->thongtinnguoidung->get_masv_by_username($User);

        if (!$masv) {
            echo "Không tìm thấy mã sinh viên tương ứng với tài khoản đăng nhập.";
            exit;
        }

        // Lấy thông tin sinh viên từ mã sinh viên
        $student_info = $this->thongtinnguoidung->get_student_info($masv);

        if (!$student_info) {
            echo "Không tìm thấy thông tin sinh viên.";
            exit;
        }

        // Xác định quyền từ session
        if (!isset($_SESSION['Role'])) {
            header("Location: /Doan/LoginController");
            exit;
        }

        $role = $_SESSION['Role'];
        $masterlayout = '';

        switch ($role) {
            case 1: // Admin
                $masterlayout = 'Masterlayout';
                break;
            case 0: // Student
                $masterlayout = 'Masterlayout_student';
                break;
            case 2: // Teacher
                $masterlayout = 'Masterlayout_teacher';
                break;
            default:
                header("Location: /Doan/LoginController");
                exit;
        }

        // Truyền thông tin sinh viên vào view
        // Truyền thông tin sinh viên và thông tin về page vào view
        $this->view($masterlayout, [
            'page' => 'thongtinnguoidung_v',
            'student_info' => $student_info // Truyền dữ liệu thông tin sinh viên
        ]);
    }
}
?>
