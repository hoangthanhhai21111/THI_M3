<div class="modal fade" id="ajaxModelAdd" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="modal-header">
            </div> --}}
            <h1 style="text-align: center">Thêm Sách</h1>
            <h4 class="modal-title" id="modelHeading"></h4>
            <div class="modal-body">
                <form id="productForm" name="productForm" method="post" action="{{route('books.store')}}" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tên sách</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name_book"
                                placeholder="Tên sách" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tác giã</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="author"
                                placeholder="Tác giã" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">mã sách</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="name" name="ISBN"
                                placeholder="nhập mã sách" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Thể loại</label>
                        <div class="col-sm-12">

                                <select name="book_category"class="form-control" id="">
                                    <option value="">--Chọn thể loại--</option>
                                    <option value="Thơ">Thơ</option>
                                    <option value="Truyện tranh">Truyện tranh</option>
                                    <option value="Văn suôi">Văn suôi</option>
                                    <option value="Truyện dài">Truyện dài</option>
                                    <option value="Tình cảm">Tình cảm</option>
                                    <option value="Kinh dị">Kinh dị</option>
                                    <option value="Hài hước">Hài hước</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Số trang</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="name" name="number_of_pages"
                                placeholder="Số trang" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Năm xuất bản</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="name" name="publishing_year"
                                placeholder="Năm xuất bản" value="" maxlength="50" required="">
                        </div>
                    </div>


                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Thêm mới
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
