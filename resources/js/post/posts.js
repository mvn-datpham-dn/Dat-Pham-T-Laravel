$(document).ready(function () {
    // Cấu hình các nhãn phân trang
    $('#post-table').dataTable({
      "language": {
        "sProcessing": "Đang xử lý...",
        "sLengthMenu": " _MENU_ ",
        "sZeroRecords": "Không tìm thấy user nào",
        "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
        "sInfoPostFix": "",
        "sSearch": "Search: ",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Đầu",
          "sPrevious": "Trước",
          "sNext": "Tiếp",
          "sLast": "Cuối"
        }
      }
    });
  
});