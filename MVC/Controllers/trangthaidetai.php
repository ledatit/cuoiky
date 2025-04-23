<?php
class trangthaidetai extends controller
{
    private $trangthaidetai;

    function __construct()
    {
        // Khởi tạo model
        $this->trangthaidetai = $this->model('trangthaidetai_m');

        // Chỉ bắt đầu session nếu chưa bắt đầu
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Hàm lấy toàn bộ dữ liệu ban đầu
    function Get_data()
    {
        if (!isset($_SESSION['masv'])) {
            header("Location: /LoginController");
            exit;
        }

        $masv = $_SESSION['masv'];

        // Lấy danh sách đề tài liên quan đến sinh viên
        $listDetai = $this->trangthaidetai->getDetaiByStudent($masv);
        if (!$listDetai) {
            $listDetai = [];
        }
        // Render view
        $this->view('Masterlayout_student', [
            'page' => 'trangthaidetai_v',
            'listDetai' => $listDetai
        ]);
    }

    // Hàm tìm kiếm dữ liệu
    function timkiem()
    {
        // Kiểm tra xem sinh viên đã đăng nhập chưa
        if (!isset($_SESSION['masv'])) {
            header("Location: /LoginController");
            exit;
        }

        if (isset($_POST['btntimkiem'])) {
            // Lấy giá trị từ form
            $madetai = $_POST['txtID']; // ID của mã đề tài
            $tendetai = $_POST['txtcontent']; // Tên đề tài

            // Tìm kiếm dữ liệu theo mã và tên đề tài
            $dulieu = $this->trangthaidetai->detai_find($madetai, $tendetai);

            // Render view với dữ liệu kết quả
            $this->view('Masterlayout_student', [
                'page' => 'trangthaidetai_v',
                'dulieu' => $dulieu, // Kết quả tìm kiếm
                'ID' => $madetai,
                'content' => $tendetai
            ]);
        }
    }
}
?>
