<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trạng Thái Đề Tài</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Trạng Thái Đề Tài</h1>
        <hr>

        <!-- Kiểm tra và hiển thị dữ liệu -->
        <?php if (isset($listDetai) && $listDetai->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã Đề Tài</th>
                            <th>Tên Đề Tài</th>
                            <th>Giảng Viên</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $listDetai->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['madetai']) ?></td>
                                <td><?= htmlspecialchars($row['tendetai']) ?></td>
                                <td><?= htmlspecialchars($row['giangvien']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center text-danger">Không có đề tài nào liên quan.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
