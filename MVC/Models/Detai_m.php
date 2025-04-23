<?php
class Detai_m extends connectDB
{
    
    function detai_ins($madetai, $tendetai, $masv, $giangvien, $ghichu) {
        if (empty($madetai) || empty($tendetai) || empty($masv) || empty($giangvien) || empty($ghichu)) {
            return "empty_fields";
        }
    
        $sql = "INSERT INTO detai (madetai, tendetai, masv, giangvien, ghichu) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sssss", $madetai, $tendetai, $masv, $giangvien, $ghichu);
    
        return $stmt->execute() ? "success" : "fail";
    }
    
    
    function checktrungmadetai($madetai) {
        if (empty($madetai)) {
            return "empty_fields";
        }
    
        $sql = "SELECT * FROM detai WHERE madetai = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $madetai);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->num_rows > 0 ? "duplicate" : "not_duplicate";
    }
    

    function themThanhVien($madetai, $masv, $hoten) {
        if (empty($madetai) || empty($masv) || empty($hoten)) {
            return "empty_fields";
        }
    
        $sql = "INSERT INTO danhsachnhom (madetai, masv, hoten) VALUES (?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sss", $madetai, $masv, $hoten);
    
        return $stmt->execute() ? "success" : "fail";
    }
    
  
}
