<?php
require 'NovelModel.php';

// Tạo một thể hiện của NovelModel
$novelModel = new NovelModel();

// Lấy tất cả các tác phẩm
$allNovels = $novelModel->getAllNovels();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEMO CRUD VỚI COUCHDB - NHÓM 4</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">DEMO CRUD VỚI COUCHDB - NHÓM 4</h2>
        <!-- Alert container -->
        <div id="alertContainer"></div>
        <!-- Form Thêm hoặc Cập nhật Tác phẩm -->
        <form id="novelForm" method="post">
            <!-- Trường ẩn để lưu trữ ID của tác phẩm đang được cập nhật -->
            <input type="hidden" id="novelId" name="novelId" value="">

            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Tác giả:</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <!-- Nút Thêm hoặc Cập nhật dựa trên ngữ cảnh -->
                <button type="button" class="btn btn-success" id="submitBtn" onclick="submitForm()">Thêm</button>
                <button type="button" class="btn btn-secondary" id="cancelBtn" style="display: none;"
                    onclick="cancelUpdate()">Hủy</button>
            </div>
        </form>

        <!-- Bảng danh sách -->
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allNovels as $novel): ?>
                <tr>
                    <td><?php echo $novel['title']; ?></td>
                    <td><?php echo $novel['author']; ?></td>
                    <td>
                        <!-- Chuyển thông tin của tác phẩm cho loadUpdateForm -->
                        <a class="btn btn-primary" href="#"
                            onclick="loadUpdateForm('<?php echo $novel['_id']; ?>', '<?php echo $novel['title']; ?>', '<?php echo $novel['author']; ?>')">Cập
                            nhật</a>
                        <a class="btn btn-danger" href="#"
                            onclick="confirmDelete('<?php echo $novel['_id']; ?>')">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Modal "loading" -->
        <div class="modal" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <p class="mt-2">Đang xử lý, vui lòng đợi...</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bao gồm Bootstrap JS và Popper.js cho chức năng Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- JavaScript cho chức năng -->
    <script src="script.js"></script>

</body>

</html>