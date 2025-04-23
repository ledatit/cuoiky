<?php
class thongtinnguoidung_m extends connectDB
{
    function get_masv_by_username($User) {
        $sql = "SELECT masv FROM tb_user WHERE User = '$User'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row ? $row['masv'] : null; // Trả về masv hoặc null nếu không tìm thấy
    }

    // Lấy thông tin sinh viên từ bảng hocsinh
    function get_student_info($masv) {
        $sql = "SELECT * FROM hocsinh WHERE masv = '$masv'";
        $result = mysqli_query($this->con, $sql);
        if (!$result) {
            echo "Lỗi truy vấn: " . mysqli_error($this->con);
            return null;
        }
        return mysqli_fetch_assoc($result);
    }

    // Cập nhật thông tin sinh viên
    function hocsinh_upd($masv, $hoten, $ns, $diachi, $email, $sdt, $khoa, $lop) {
        $sql = "UPDATE hocsinh 
                SET hoten = '$hoten', 
                    ngaysinh = '$ns', 
                    diachi = '$diachi', 
                    sodienthoai = '$sdt', 
                    email = '$email', 
                    khoa = '$khoa', 
                    lop = '$lop' 
                WHERE masv = '$masv'";
        return mysqli_query($this->con, $sql);
    }
}
?>
