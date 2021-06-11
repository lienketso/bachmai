@extends('wadmin-dashboard::master')

@section('js')
    <script type="text/javascript" src="{{asset('admin/libs/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/libs/ckfinder/ckfinder_v1.js')}}"></script>
@endsection
@section('js-init')
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1', {
            filebrowserUploadUrl: '{{route('ckeditor.upload',['_token' => csrf_token() ])}}',
            filebrowserUploadMethod: 'form'
        });
    </script>

@endsection

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::setting.index.get')}}">Cấu hình trang ủng hộ</a></li>
        <li class="active">Thông tin cấu hình</li>
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
                        <h4 class="panel-title">Thông tin cấu hình </h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để cấu hình thông tin mong muốn</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Tiêu đề trang</label>
                            <input class="form-control"
                                   name="donate_name_{{$language}}"
                                   type="text"
                                   value="{{$setting->getSettingMeta('donate_name_'.$language)}}"
                                   placeholder="Tiêu đề trang">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea id="" name="donate_description_{{$language}}" class="form-control" rows="3"
                                      placeholder="Mô tả ">{{$setting->getSettingMeta('donate_description_'.$language)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Thông tin chuyển khoản</label>
                            <textarea id="editor1" name="donate_bank_info_{{$language}}"
                                      class="form-control makeMeRichTextarea" rows="3"
                                      placeholder="">{{$setting->getSettingMeta('donate_bank_info_'.$language)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Thông tin khác</label>
                            <textarea id="" name="donate_info_home_{{$language}}"
                                      class="form-control makeMeRichTextarea" rows="4"
                                      placeholder="">{{$setting->getSettingMeta('donate_info_home_'.$language)}}</textarea>
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
                            <button class="btn btn-primary">Lưu lại</button>
                            <button class="btn btn-success" name="continue_post" value="1">Lưu và tiếp tục thêm</button>
                        </div>

                    </div><!-- col-sm-6 -->
                </div><!-- row -->

            </div>

        </form>
    </div>
@endsection
