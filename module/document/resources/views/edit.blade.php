@extends('wadmin-dashboard::master')

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::document.index.get')}}">Tài liệu và file</a></li>
        <li class="active">Sửa thông tin</li>
    </ol>

    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-sm-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Thêm tài liệu và file</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để thêm mới</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Tiêu đề </label>
                            <input class="form-control"
                                   name="name"
                                   type="text"
                                   value="{{$data->name}}"
                                   placeholder="Nhập tiêu đề">
                        </div>

                        <div class="form-group">
                            <label>Meta title </label>
                            <input class="form-control"
                                   name="meta_title"
                                   type="text"
                                   value="{{$data->meta_title}}"
                                   placeholder="Điều hướng đến trang theo link">
                        </div>
                        <div class="form-group">
                            <label>Meta description</label>
                            <textarea name="meta_desc" class="form-control" rows="3">{{$data->meta_desc}}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Lưu lại</button>
                            <button class="btn btn-success" name="continue_post" value="1">Lưu và tiếp tục thêm</button>
                        </div>
                    </div>
                </div><!-- panel -->

            </div><!-- col-sm-6 -->

            <!-- ####################################################### -->

            <div class="col-sm-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Tùy chọn thêm</h4>
                        <p>Thông tin các tùy chọn thêm </p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Danh mục tài liệu</label>
                            <select id="" name="category" class="form-control" style="width: 100%" >
                                @foreach($categoryList as $row)
                                    <option value="{{$row->id}}" {{ ($data->category==$row->id) ? 'selected' : ''}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select id="" name="status" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option value="active" {{ ($data->status=='active') ? 'selected' : ''}}>Hiển thị</option>
                                <option value="disable" {{ ($data->status=='disable') ? 'selected' : ''}}>Tạm ẩn</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Upload file</label>
                            <div class="custom-file">
                                <input type="file" name="thumbnail" value="" class="custom-file-input" id="inputGroupFile01" >
                                <p style="padding-top: 10px; color: #0000cc">{{$data->file_name}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Lưu lại</button>
                            <button class="btn btn-success" name="continue_post" value="1">Lưu và tiếp tục thêm</button>
                        </div>

                    </div><!-- col-sm-6 -->
                </div><!-- row -->

            </div>

        </form>
    </div>
@endsection
