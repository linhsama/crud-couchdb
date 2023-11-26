# Demo CouchDB - Nhóm 4

## Mô tả
Demo CouchDB của nhóm 4 môn Cơ sở dữ liệu nâng cao. Dự án này minh họa cách thực hiện CRUD với cơ sở dữ liệu CouchDB.

## Cấu Trúc Thư Mục
crud-couchdb/
│
├── css/
│ └── style.css
│
├── js/
│ └── script.js
│
├── demo/
│ ├── config.php
│ ├── index.php
│ ├── NovelController.php
│ └── NovelModel.php
│
└── README.md
- **css/:** Chứa tất cả các tệp CSS, trong trường hợp này chỉ có `style.css`.
- **js/:** Chứa tất cả các tệp JavaScript, trong trường hợp này chỉ có `script.js`.
- **demo/:** Thư mục chính của ứng dụng, bao gồm các tệp PHP và cấu hình.
- **README.md:** Tệp chứa thông tin chi tiết về dự án, bao gồm hướng dẫn cài đặt, hướng dẫn sử dụng và các chi tiết khác.
# CRUD CouchDB Demo - Nhóm 4

## Hướng Dẫn Cài Đặt

### Bước 1: Tải CouchDB và Xampp
- Truy cập trang chính thức của Apache CouchDB để tải gói cài đặt phù hợp với hệ điều hành của bạn: https://couchdb.apache.org/.
- Truy cập trang chính thức của Apache Xampp để tải gói cài đặt phù hợp với hệ điều hành của bạn: https://www.apachefriends.org/download.html.
### Bước 2: Tải Dự Án
- Sử dụng Git để sao chép dự án về máy tính của bạn:
- git clone https://github.com/linhsama/crud-couchdb.git
- Hoặc tải mã nguồn dưới dạng ZIP và giải nén.
- Di chuyển folder vào C:xampp/htdocs/ (nếu cài xampp ở ổ đĩa C)
### Bước 3: Cấu Hình Cơ Sở Dữ Liệu
- Mở tệp C:xampp/htdocs/crud-couchdb/demo/config.php.
- Điều chỉnh các thông số kết nối cơ sở dữ liệu theo cấu hình CouchDB của bạn.
### Bước 4: Chạy Ứng Dụng
- Mở trình duyệt và truy cập đường dẫn tới tệp demo/index.php.
- http://localhost/crud-couchdb/demo/index.php
### Bước 5: Sử Dụng Ứng Dụng
- Thao tác CRUD trong trình duyệt.