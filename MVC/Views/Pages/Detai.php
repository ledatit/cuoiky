<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký đề tài</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .readonly-input {
            background-color: #f8f9fa;
            cursor: not-allowed;
        }

        .btn-add-member {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-add-member:hover {
            background-color: #218838;
        }

        .file-input {
            margin-top: 10px;
        }

        .member-list {
            margin-top: 20px;
        }

        .member-row {
            margin-bottom: 10px;
        }

        .btn-remove-member {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-remove-member:hover {
            background-color: #c82333;
        }

        /* Custom styling for the two columns */
        .left-column, .right-column {
            padding: 20px;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        .right-column {
            border-left: 1px solid #ddd;
        }

        .form-control {
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Đăng ký đề tài</h2>
    
    <!-- Display result message -->
    <?php if (isset($result) && $result != ''): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $result; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <form method="post" action="/Detai/themmoi" enctype="multipart/form-data">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6 left-column">
                <div class="form-group">
                    <label for="topicName">Mã đề tài</label>
                    <input type="text" class="form-control" id="madetai" name="txtmadetai" placeholder="Nhập mã đề tài" required>
                </div>
                <div class="form-group">
                    <label for="topicName">Tên đề tài</label>
                    <input type="text" class="form-control" id="tendetai" name="txttendetai" placeholder="Nhập tên đề tài" required>
                </div>
                <div class="form-group">
    <label for="studentName">Họ và tên</label>
    <input type="text" class="form-control readonly-input" id="studentName" name="txthoten" 
           value="<?php echo isset($_SESSION['Name']) ? $_SESSION['Name'] : ''; ?>" readonly>
</div>
                <div class="form-group">
                    <label for="studentId">Mã số sinh viên</label>
                    <input type="text" class="form-control" id="masv" name="txtmasv" placeholder="Nhập mã sinh viên" required>

                    <!-- Nút thêm sinh viên -->
                    <button type="button" class="btn btn-success btn-add-member mt-2" data-toggle="modal" data-target="#addStudentModal">
                        Thêm sinh viên
                    </button>
                </div>

                <!-- Modal thêm sinh viên -->
                <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addStudentModalLabel">Thêm sinh viên</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="newStudentId">Mã số sinh viên</label>
                                    <input type="text" class="form-control" id="newStudentId" placeholder="Nhập mã số sinh viên">
                                </div>
                                <div class="form-group">
                                    <label for="newStudentName">Tên sinh viên</label>
                                    <input type="text" class="form-control" id="newStudentName" placeholder="Nhập tên sinh viên">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-primary" id="confirmAddStudentBtn">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="studentId">Giảng viên hướng dẫn</label>
                    <input type="text" class="form-control" id="giangvien" name="txtgiangvien" placeholder="Nhập giảng viên hướng dẫn" required>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6 right-column">
                <div class="form-group">
                    <label for="notes">Ghi chú</label>
                    <textarea class="form-control" id="ghichu" name="txtghichu" rows="4" placeholder="Nhập ghi chú"></textarea>
                </div>
                <div class="member-list">
                    <h4>Danh sách thành viên</h4>
                    <div id="memberListContainer">
                        <!-- Danh sách thành viên sẽ được hiển thị ở đây -->
                    </div>
                </div>
                <!-- Input ẩn chứa danh sách thành viên -->
                <input type="hidden" id="membersInput" name="members" value="[]">
            </div>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" name='btnthem'>Đăng ký đề tài</button>
        </div>
    </form>
</div>

<script>
    let members = []; // Mảng lưu danh sách sinh viên

    // Xử lý khi nhấn nút "Xác nhận" trong modal
    $('#confirmAddStudentBtn').click(function () {
        const studentId = $('#newStudentId').val();
        const studentName = $('#newStudentName').val();

        if (studentId && studentName) {
            // Thêm sinh viên mới vào danh sách
            members.push({ 
                madetai: document.getElementById('madetai').value, // Mã đề tài
                masv: studentId, // Mã số sinh viên
                hoten: studentName // Họ tên sinh viên
            });

            // Cập nhật danh sách hiển thị và input ẩn
            updateMemberList();
            updateMembersInput();

            // Đóng modal và reset các trường nhập
            $('#addStudentModal').modal('hide');
            $('#newStudentId').val('');
            $('#newStudentName').val('');
        } else {
            alert('Vui lòng nhập đầy đủ thông tin!');
        }
    });

    // Hàm cập nhật danh sách sinh viên
    function updateMemberList() {
        const container = $('#memberListContainer');
        container.empty(); // Xóa nội dung cũ

        members.forEach((member, index) => {
            const memberHtml = `
                <div class="member-row" id="member-${index}">
                    <p><strong>${member.hoten}</strong> (Mã số: ${member.masv})</p>
                    <button class="btn btn-danger btn-remove-member" onclick="removeMember(${index})">Xóa</button>
                </div>
            `;
            container.append(memberHtml);
        });
    }

    function updateMembersInput() {
        $('#membersInput').val(JSON.stringify(members)); // Lưu danh sách thành viên dưới dạng JSON
    }

    // Hàm xóa sinh viên khỏi danh sách
    function removeMember(index) {
        members.splice(index, 1); // Xóa sinh viên tại vị trí index
        updateMemberList(); // Cập nhật lại danh sách hiển thị
        updateMembersInput(); // Cập nhật lại input ẩn
    }
</script>

</body>
</html>
