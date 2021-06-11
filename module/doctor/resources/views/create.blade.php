@extends('wadmin-dashboard::master')
@section('js')
    <script type="text/javascript" src="{{asset('admin/libs/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/libs/ckfinder/ckfinder_v1.js')}}"></script>
@endsection
@section('js-init')
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1', {
            filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}', //route dashboard/upload
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace( 'editor2', {
            filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}', //route dashboard/upload
            filebrowserUploadMethod: 'form'
        });
    </script>

@endsection

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::doctor.index.get')}}">Bác sỹ</a></li>
        <li class="active">Thêm bác sỹ</li>
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
                        <h4 class="panel-title">Thêm Bác sỹ</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để thêm Bác sỹ mới</p>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="padding-bottom: 20px;">
                            <div class="col-lg-6">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input class="form-control"
                                   name="name"
                                   type="text"
                                   value="{{old('name')}}"
                                   placeholder="VD : Nguyễn Thành">
                        </div>
                            </div>
                            <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control"
                                   name="first_name"
                                   type="text"
                                   value="{{old('first_name')}}"
                                   placeholder="VD : An - sử dụng để lọc dữ liệu theo tên chữ cái đầu">
                        </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            <textarea id="editor1" name="description" class="form-control" rows="3" placeholder="Mô tả ngắn">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Thông tin chi tiết</label>
                            <textarea id="editor2" name="content" class="form-control" rows="3" placeholder="Thông tin chi tiết">{{old('content')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Thẻ Meta title</label>
                            <input class="form-control"
                                   name="meta_title"
                                   type="text"
                                   value="{{old('meta_title')}}"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Thẻ meta description</label>
                            <textarea id="" name="meta_desc" class="form-control" rows="3" placeholder="Thẻ Meta description">{{old('meta_desc')}}</textarea>
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
                            <label>Khoa </label>
                            <select id="" name="category" class="form-control" style="width: 100%" data-placeholder="">
                                <option value="0">--Chọn khoa--</option>
                                @foreach($khoaList as $k)
                                <option value="{{$k->id}}">{{$k->name}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select id="" name="status" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option value="active" {{ (old('status')=='active') ? 'selected' : ''}}>Hiển thị</option>
                                <option value="disable" {{ (old('status')=='disable') ? 'selected' : ''}}>Tạm ẩn</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Ảnh đại diện</label>
                            <div class="custom-file">
                                <input type="file" name="thumbnail" value="{{old('thumbnail')}}" class="custom-file-input" id="inputGroupFile01" >
                                <label class="custom-file-label" for="inputGroupFile01">{{old('thumbnail')}}</label>
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
