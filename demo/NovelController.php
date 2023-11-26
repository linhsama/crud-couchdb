<?php
// Import class NovelModel
require 'NovelModel.php';

// Tạo một instance của NovelModel
$NovelModel = new NovelModel();

// Kiểm tra loại yêu cầu
if (isset($_GET['req'])) {
    // Lấy loại yêu cầu từ tham số truy vấn
    $requestType = $_GET['req'];

    // Sử dụng câu lệnh switch để xử lý các loại yêu cầu khác nhau
    switch ($requestType) {
        case 'add':
            // Kiểm tra xem tất cả dữ liệu cần thiết có được cung cấp hay không
            if (isset($_POST['title'], $_POST['author'])) {
                // Lấy dữ liệu từ tham số POST
                $title = $_POST['title'];
                $author = $_POST['author'];

                // Thực hiện thêm mới trong NovelModel
                $NovelModel->addNovel($title, $author);
            }
            break;

        case 'update':
            // Kiểm tra xem tất cả dữ liệu cần thiết có được cung cấp hay không
            if (isset($_POST['novelId'], $_POST['title'], $_POST['author'])) {
                // Lấy dữ liệu từ tham số POST
                $novelId = $_POST['novelId'];
                $title = $_POST['title'];
                $author = $_POST['author'];

                // Thực hiện cập nhật trong NovelModel
                $NovelModel->updateNovel($novelId, $title, $author);
            }
            break;

        case 'delete':
            // Kiểm tra xem ID của tiểu thuyết có được cung cấp hay không
            if (isset($_GET['id'])) {
                // Lấy ID của tiểu thuyết từ tham số truy vấn
                $novelId = $_GET['id'];

                // Thực hiện xóa trong NovelModel
                $NovelModel->deleteNovel($novelId);
            }
            break;

        // Thêm các case khác cho các thao tác CRUD khác nếu cần

        default:
            // Xử lý các trường hợp khác nếu cần
            break;
    }
}

// Chuyển hướng người dùng về trang index.php sau khi xử lý yêu cầu
header('Location: index.php');
exit();
?>
