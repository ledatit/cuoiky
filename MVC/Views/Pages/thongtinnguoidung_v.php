<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin người dùng</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ffffff;
        }
        .container {
            position: relative;
            width: 1000px; 
            height: 600px; 
            background-image: url('/Public/Pictures/360_F_783061823_H4hem16sPE3CRrn1N8Lx6xyRbtad2aO8.jpg');
            background-size: cover;
            background-position: center;
            border: 2px solid #ccc;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .info-box {
            display: flex;
            justify-content: space-between; 
            width: 900px; 
            height: 500px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        .left {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 10px;
            width: 20%; /* Phần ảnh nhỏ */
        }
        .left img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
        .center, .right {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
            width: 39%; /* Mỗi phần giữa và bên phải sẽ chiếm 39% */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: none; /* Không cho phép thay đổi kích thước */
        }
        /* Thêm style cho button */
        .btn-save {
            width: 150px; /* Nút "Lưu" nhỏ */
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            position: absolute; /* Đặt nút ở vị trí tuyệt đối */
            bottom: 20px; /* Đặt cách đáy khung một khoảng */
            left: 50%;
            transform: translateX(-50%); /* Căn giữa nút */
        }
        .btn-save:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php
// Kiểm tra nếu biến $student_info tồn tại và không phải là null
if (isset($student_info) && !empty($student_info)) {
    // Hiển thị thông tin sinh viên
    ?>
    <div class="container">
        <div class="info-box">
            <div class="left">
                <img src="/Public/Pictures/tải xuống.png" alt="Ảnh người dùng">
            </div>

            <div class="center">
                <div class="form-group">
                    <label for="name">Họ tên:</label>
                    <input type="text" class="form-control" id="name" name="txtName" value="<?php echo htmlspecialchars($student_info['Hoten']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="studentId">Mã sinh viên:</label>
                    <input type="text" class="form-control" id="studentId" name="txtStudentId" value="<?php echo htmlspecialchars($student_info['Masv']); ?>" required readonly>
                </div>
                <div class="form-group">
                    <label for="dob">Ngày sinh:</label>
                    <input type="date" class="form-control" id="dob" name="txtDob" value="<?php echo htmlspecialchars($student_info['Ngaysinh']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" name="txtAddress" value="<?php echo htmlspecialchars($student_info['Diachi']); ?>" required>
                </div>
            </div>
            <div class="right">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="txtEmail" value="<?php echo htmlspecialchars($student_info['Email']); ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" class="form-control" id="phone" name="txtPhone" value="<?php echo htmlspecialchars($student_info['Dienthoai']); ?>">
                </div>
                <div class="form-group">
                    <label for="faculty">Khoa:</label>
                    <input type="text" class="form-control" id="faculty" name="txtFaculty" value="<?php echo htmlspecialchars($student_info['Khoa']); ?>">
                </div>
                <div class="form-group">
                    <label for="class">Lớp:</label>
                    <input type="text" class="form-control" id="class" name="txtClass" value="<?php echo htmlspecialchars($student_info['Lop']); ?>">
                </div>
            </div>
        </div>
    </div>
    <button class="btn-save" type="submit">Lưu thông tin</button>
    <?php
} else {
    // Nếu không có dữ liệu, thông báo lỗi
    echo "Thông tin sinh viên không tồn tại.";
}
?>

</body>
</html>
