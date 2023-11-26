function loadUpdateForm(novelId, title, author) {
  // Đặt ID của tác phẩm đang được cập nhật
  document.getElementById("novelId").value = novelId;

  // Điền biểu mẫu với thông tin của tác phẩm
  document.getElementById("title").value = title;
  document.getElementById("author").value = author;

  // Cập nhật nhãn và sự hiển thị của nút
  document.getElementById("submitBtn").innerText = "Cập nhật";
  document.getElementById("cancelBtn").style.display = "inline";
}

function cancelUpdate() {
  // Đặt lại biểu mẫu
  document.getElementById("novelId").value = "";
  document.getElementById("title").value = "";
  document.getElementById("author").value = "";

  // Đặt lại nhãn và sự hiển thị của nút
  document.getElementById("submitBtn").innerText = "Thêm";
  document.getElementById("cancelBtn").style.display = "none";
}

function confirmDelete(novelId) {
  if (confirm("Bạn có chắc chắn muốn xóa tác phẩm này?")) {
      // Nếu người dùng xác nhận, hiển thị "loading"
      showLoading();
      // Nếu người dùng xác nhận, chuyển hướng đến NovelController.php với novelId
      window.location.href = "NovelController.php?req=delete&id=" + novelId;
  }
}

function submitForm() {
  // Kiểm tra hợp lệ của biểu mẫu
  var isValid = validateForm();

  if (isValid) {
      // Hiển thị "loading"
      showLoading();

      // Xác định hành động của biểu mẫu dựa trên ngữ cảnh
      var formAction = document.getElementById("novelId").value
          ? "NovelController.php?req=update"
          : "NovelController.php?req=add";

      // Đặt hành động của biểu mẫu và gửi biểu mẫu
      document.getElementById("novelForm").action = formAction;
      document.getElementById("novelForm").submit();
  } else {
      // Nếu biểu mẫu không hợp lệ, hiển thị thông báo
      showAlert("Vui lòng điền đầy đủ thông tin.");
  }
}

function validateForm() {
  // Kiểm tra hợp lệ của biểu mẫu ở đây
  // Trong ví dụ này, chỉ kiểm tra xem title và author có giá trị không

  var title = document.getElementById("title").value;
  var author = document.getElementById("author").value;

  if (title.trim() === "" || author.trim() === "") {
      return false; // Biểu mẫu không hợp lệ
  }

  return true; // Biểu mẫu hợp lệ
}

function showAlert(message) {
  // Tạo một div alert Bootstrap
  var alertDiv = document.createElement("div");
  alertDiv.className = "alert alert-danger alert-dismissible fade show";
  alertDiv.setAttribute("role", "alert");

  // Nội dung của alert
  alertDiv.innerHTML = '<strong>Lỗi!</strong> ' + message +
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span>' +
      '</button>';

  // Hiển thị alert trong phần tử có id là "alertContainer"
  var alertContainer = document.getElementById("alertContainer");
  alertContainer.innerHTML = "";
  alertContainer.appendChild(alertDiv);
}


function showLoading() {
  // Hiển thị modal "loading" bằng Bootstrap
  $('#loadingModal').modal('show');
}

function hideLoading() {
  // Ẩn modal "loading" bằng Bootstrap
  $('#loadingModal').modal('hide');
}
function showLoading() {
  // Kiểm tra xem modal có tồn tại hay không
  var modalElement = document.getElementById("loadingModal");

  if (!modalElement) {
      // Nếu không tồn tại, tạo một modal mới và thêm vào body
      modalElement = document.createElement("div");
      modalElement.id = "loadingModal";
      modalElement.className = "modal fade";
      modalElement.setAttribute("tabindex", "-1");
      modalElement.setAttribute("role", "dialog");
      modalElement.setAttribute("aria-labelledby", "loadingModalLabel");
      modalElement.setAttribute("aria-hidden", "true");

      var modalDialog = document.createElement("div");
      modalDialog.className = "modal-dialog";
      modalDialog.setAttribute("role", "document");

      var modalContent = document.createElement("div");
      modalContent.className = "modal-content";

      var modalBody = document.createElement("div");
      modalBody.className = "modal-body text-center";

      var loadingSpinner = document.createElement("div");
      loadingSpinner.className = "spinner-border text-primary";
      loadingSpinner.role = "status";

      var srOnlyText = document.createElement("span");
      srOnlyText.className = "sr-only";
      srOnlyText.textContent = "Loading...";

      // Tạo cấu trúc modal
      modalBody.appendChild(loadingSpinner);
      loadingSpinner.appendChild(srOnlyText);
      modalContent.appendChild(modalBody);
      modalDialog.appendChild(modalContent);
      modalElement.appendChild(modalDialog);
      document.body.appendChild(modalElement);
  }

  // Hiển thị modal "loading"
  $(modalElement).modal({ backdrop: 'static', keyboard: false });
}

function hideLoading() {
  // Ẩn modal "loading"
  $("#loadingModal").modal("hide");
}
