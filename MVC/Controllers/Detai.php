<?php
class detai extends controller
{
    private $detai;

    function __construct()
    {
        $this->detai=$this->model('Detai_m');
    }
    function Get_data()
    {
        $this->view('Masterlayout_student',
        [
            'page' =>'Detai'
        ]);
    }




    function themmoi() {
        if (isset($_POST['btnthem'])) {
            $result = $this->themmoidetai();
    
            // Nếu thêm đề tài thành công, thêm vào bảng `danhsachnhom`
            if ($result == "success") {
                $madetai = $_POST['txtmadetai'];
                $masv = $_POST['txtmasv'];
                $hoten = $_POST['txthoten']; // Lấy họ tên từ form
                
                // Thêm người đăng ký đầu tiên vào bảng `danhsachnhom`
                $this->detai->themThanhVien($madetai, $masv, $hoten);
                
                // Thêm các thành viên khác (nếu có)
                if (isset($_POST['members'])) {
                    $members = json_decode($_POST['members'], true);
                    if (is_array($members)) {
                        foreach ($members as $member) {
                            $this->detai->themThanhVien($member['madetai'], $member['masv'], $member['hoten']);
                        }
                    }
                }
    
                $message = "Thêm đề tài thành công!";
            } elseif ($result == "duplicate") {
                $message = "Mã đề tài đã tồn tại!";
            } elseif ($result == "empty_fields") {
                $message = "Vui lòng điền đầy đủ thông tin!";
            }
        }
    
        // Hiển thị lại trang với thông báo
        $this->view('Masterlayout_student', [
            'page' => 'Detai',
            'result' => isset($message) ? $message : ''
        ]);
    }
    
    


    function themmoidetai() {
        $madetai = $_POST['txtmadetai'];
        $tendetai = $_POST['txttendetai'];
        $masv = $_POST['txtmasv'];
        $giangvien = $_POST['txtgiangvien'];
        $ghichu = $_POST['txtghichu'];
    
        // Kiểm tra mã đề tài
        $checkResult = $this->detai->checktrungmadetai($madetai);
        if ($checkResult == "duplicate") {
            return "duplicate";
        } elseif ($checkResult == "empty_fields") {
            return "empty_fields";
        }
    
        // Thêm đề tài vào cơ sở dữ liệu
        $insertResult = $this->detai->detai_ins($madetai, $tendetai, $masv, $giangvien, $ghichu);
        if ($insertResult == "success") {
            return "success";
        }
        return "error"; // Trường hợp có lỗi thêm
    }
}