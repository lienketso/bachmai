@extends('wadmin-dashboard::master')

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::comment.index.get')}}">Comment</a></li>
        <li class="active">Sửa comment</li>
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
                        <h4 class="panel-title">Comment</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để Sửa Comment</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Tên người comment</label>
                            <input class="form-control"
                                   name="guest_name"
                                   type="text"
                                   value="{{$data->guest_name}}"
                                   placeholder="Nhập tên người comment">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control"
                                   name="guest_mail"
                                   type="text"
                                   value="{{$data->guest_mail}}"
                                   placeholder="Địac chỉ email">
                        </div>
                        <div class="form-group">
                            <label>Nội dung comment</label>
                            <textarea id="" name="content" class="form-control" rows="3" placeholder="Nội dung comment">{{$data->content}}</textarea>
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
                            <label>Trạng thái</label>
                            <select id="" name="status" class="form-control" style="width: 100%" data-placeholder="Trạng thái">
                                <option value="active" {{ ($data->status=='active') ? 'selected' : ''}}>Hiển thị</option>
                                <option value="disable" {{ ($data->status=='disable') ? 'selected' : ''}}>Tạm ẩn</option>
                            </select>
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
