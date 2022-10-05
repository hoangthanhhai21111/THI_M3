<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Book</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center">Tủ Sách</h1>
        <div class="form-group">
            <form action="" method="GET" id="form-search">
                <a class="btn btn-warning float-left "id="createNew">Thêm mới</a>
                <button class="btn btn-info float-right" type="submit">Tìm kiếm</button>
                <input type="text" name="key"class="form-control float-right" value="{{ $f_key }}"
                    placeholder='Nhập tên sách bạn muốn tìm:' style="width:300px">
            </form>
        </div>
        <br>
        <br>
        @if (Session::has('success'))
        <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i>{{session::get('success')}}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-success"> <i class="bi bi-x-circle"></i>{{session::get('error')}}</div>
        @endif
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Sách</th>
                    <th>Thể Loại</th>
                    <th>Tác Giã</th>
                    <th>Mã Sách</th>
                    <th>Số Trang</th>
                    <th>Năm Xuất Bản</th>
                    <th width="280px">Tùy chọn</th>
                </tr>
            </thead>
            <tbody id="addRow" class="addRow">
                @foreach ($books as $book)
                    <tr class="item-{{ $book->id }}">
                        <th>{{ $book->id }}</th>
                        <td>{{ $book->name_book }}</td>
                        <td>{{ $book->book_category }}</td>
                        <td>{{ $book->author }}</td>
                        <td>ISBN {{ $book->ISBN }}</td>
                        <td>{{ $book->number_of_pages }}</td>
                        <td>{{ $book->publishing_year }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn" style="color:brown">Sửa</a>
                            <a data-url="{{ route('books.destroy', $book->id) }}"
                                id="{{ $book->id }}"class="btn btn-light deleteIcon">Xóa</i></a>
                            </td>
                        </tr>
                        @endforeach
            </tbody>
        </table>
        <div style="float:right">
            {{ $books->links() }}
        </div>
    </div>
    @include('books.modal.modalAdd')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
            $('#createNew').click(function() {
        $('#ajaxModelAdd').modal('show');
    });
        $(document).on('click', '.deleteIcon', function(e) {
               e.preventDefault();
               let id = $(this).attr('id');
               let url = $(this).data('url');
               let csrf ='{{csrf_token()}}';
               Swal.fire({
                   title: 'Are you sure?',
                   text: "You won't be able to revert this!",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                   if (result.isConfirmed) {
                       $.ajax({
                           url: url,
                           method: 'delete',
                           data: {
                               id:id,
                               _token: csrf
                           },
                           success: function(res) {
                               Swal.fire(
                                   'Deleted!',
                                   'Your file has been deleted.',
                                   'success'
                               )
                               $('.item-' + id).remove();
                           }
                       });
                   }
               });
           });
    </script>
</body>

</html>
