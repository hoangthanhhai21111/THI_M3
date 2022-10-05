
<!DOCTYPE html>

<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Book</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center">Cập Nhật</h1>
        <div class="form-group">
            <form id="productForm" name="productForm" method="post" action="{{route('books.update', $book->id)}}" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Tên sách</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name_book"
                            placeholder="Tên sách" value="{{ $book->name_book }}" maxlength="50" required="">
                            @error('name_book')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Tác giã</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="author"
                            placeholder="Tác giã" value="{{ $book->author }}" maxlength="50" required="">
                            @error('author')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">mã sách</label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" id="name" name="ISBN"
                            placeholder="nhập mã sách" value="{{ $book->ISBN }}" maxlength="50" required="">
                            @error('ISBN')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Thể loại</label>
                    <div class="col-sm-12">

                            <select name="book_category"class="form-control" id="">
                                <option value="{{ $book->book_category}}">{{ $book->book_category}}</option>
                                <option value="Thơ">Thơ</option>
                                <option value="Truyện tranh">Truyện tranh</option>
                                <option value="Văn suôi">Văn suôi</option>
                                <option value="Truyện dài">Truyện dài</option>
                                <option value="Tình cảm">Tình cảm</option>
                                <option value="Kinh dị">Kinh dị</option>
                                <option value="Hài hước">Hài hước</option>
                            </select>
                            @error('book_category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Số trang</label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" id="name" name="number_of_pages"
                            placeholder="Số trang" value="{{ $book->number_of_pages }}" maxlength="50" required="">
                            @error('number_of_pages')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Năm xuất bản</label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" id="name" name="publishing_year"
                            placeholder="Năm xuất bản" value="{{ $book->publishing_year }}" maxlength="50" required="">
                            @error('publishing_year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <a class="btn btn-secondary float-left" href="{{route('books.index')}}">Hủy</a>
                    <button class="btn btn-primary float-right" type="submit">Lưu</button>

                </div>
            </form>
        </div>
        </div>
    </div>
</body>

</html>
