<?php
class trangthaidetai_m extends connectDB
{
    // Hàm lấy toàn bộ dữ liệu
    public function getAllDetai()
    {
        $sql = "SELECT madetai, tendetai, giangvien FROM detai"; 
        $stmt = $this->con->prepare($sql);
        $stmt->execute(); 
        return $stmt->get_result(); 
    }

    public function detai_findID($madetai)
    {
        $sql = "SELECT madetai, tendetai, giangvien 
                FROM detai 
                WHERE madetai LIKE ?";
        $stmt = $this->con->prepare($sql); 
        $like_madetai = "%$madetai%"; 
        $stmt->bind_param("s", $like_madetai); 
        $stmt->execute(); 
        return $stmt->get_result(); 
    }

    public function detai_find($madetai, $tendetai)
    {
        $sql = "SELECT madetai, tendetai, giangvien 
                FROM detai 
                WHERE madetai LIKE ? AND tendetai LIKE ?";
        $stmt = $this->con->prepare($sql); 
        $like_madetai = "%$madetai%"; 
        $like_tendetai = "%$tendetai%"; 
        $stmt->bind_param("ss", $like_madetai, $like_tendetai); 
        $stmt->execute(); 
        return $stmt->get_result(); 
    }

    // Lấy masv từ bảng hocsinh theo masv
    public function getMasvById($masv)
    {
        $sql = "SELECT masv FROM hocsinh WHERE masv = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $masv);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['masv'] ?? null; // Trả về masv nếu tìm thấy, nếu không trả null
    }

    // Lấy danh sách đề tài liên quan đến sinh viên (theo masv)
    public function getDetaiByStudent($masv)
    {
        $sql = "SELECT detai. *
                FROM detai
                JOIN danhsachnhom ON detai.madetai = danhsachnhom.madetai 
                WHERE danhsachnhom.masv = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $masv);
        $stmt->execute();
    
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
    

    // Lấy danh sách thành viên trong nhóm (theo madetai)
    public function getThanhVienByMadetai($madetai)
    {
        $sql = "SELECT masv, hoten 
                FROM danhsachnhom 
                WHERE madetai = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $madetai);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
