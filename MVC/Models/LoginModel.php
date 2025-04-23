<?php
// models/LoginModel.php

class LoginModel extends connectDB
{
    public function checkUser($user, $pass)
{
    $stmt = $this->con->prepare("SELECT Name, Role, masv FROM tb_user WHERE User=? AND Pass=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    if ($userData) {
        return $userData; // Trả về mảng có 'Name', 'Role', và 'masv'
    } else {
        return null; // Không tìm thấy tài khoản
    }
}


}
