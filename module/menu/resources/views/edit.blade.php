@extends('wadmin-dashboard::master')

@section('js-init')
    <script type="text/javascript">
        var node_blog = $('.node_blog');
        node_blog.hide();
        var node_page = $('.node_page');
        node_page.hide();

        var nodeType = $('select[name="type"]');
        if(nodeType.val() === 'blog'){
            node_blog.show();
        }
        if(nodeType.val() === 'page'){
            node_page.show();
        }

        nodeType.on('change', function (e) {
            var _this = $(e.currentTarget);
            var value = _this.val();
            if (value === 'blog') {
                node_blog.show();
                node_page.hide();
                $('#selectBlog').attr('disabled',false);
            }
            else if(value === 'page'){
                node_page.show();
                node_blog.hide();
                $('#selectBlog').attr('disabled',true);
            }
            else if(value === 'link'){
                node_page.hide();
                node_blog.hide();
                $('#urlLink').attr('readonly',false);
            }
        });

        $('select[id="selectBlog"]').on('change', function (e) {
            var selectedData = $(this).children("option:selected").text();
            var url = $(this).children("option:selected").val();
            $('input[name="name"]').val(selectedData);
            $('input[name="link"]').val(url);
            $('#urlLink').attr('readonly',true);
        });

        $('select[id="selectPage"]').on('change', function (e) {
            let public_url = window.location.protocol+'//'+window.location.hostname;
            var selectedData = $(this).children("option:selected").text();
            var url = $(this).children("option:selected").val();
            $('input[name="name"]').val(selectedData);
            $('input[name="link"]').val(url);
            $('#urlLink').attr('readonly',true);
        });


    </script>

@endsection

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="{{route('wadmin::menu.index.get')}}">Menu</a></li>
        <li class="active">Sửa Menu</li>
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
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-sm-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Sửa Menu</h4>
                        <p>Bạn cần nhập đầy đủ các thông tin để Sửa Menu </p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Loại menu</label>
                            <div class="col-sm-8">
                                <select id="selectType" name="type" class="form-control" style="width: 100%" data-placeholder="">
                                    <option value="0">--Chọn loại--</option>
                                    <option value="blog" {{($data->type=='blog') ? 'selected' : ''}}>Danh mục bài viết</option>
                                    <option value="page" {{($data->type=='page') ? 'selected' : ''}}>Trang tĩnh</option>
                                    <option value="link" {{($data->type=='link') ? 'selected' : ''}}>Link khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group node_blog" >
                            <label class="col-sm-3 control-label">Danh mục bài viết</label>
                            <div class="col-sm-8">
                                <select id="selectBlog" name="blog" class="form-control" style="width: 100%" >
                                    <option value="0">--Chọn danh mục--</option>
                                    @foreach($listBlog as $b)
                                        <option value="{{domain_url().'/blog/'.$b->slug}}" {{($b->slug==str_slug($data->name))?'selected' : ''}} >{{$b->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group node_page" >
                            <label class="col-sm-3 control-label">Trang tĩnh</label>
                            <div class="col-sm-8">
                                <select id="selectPage" name="page" class="form-control" style="width: 100%" >
                                    <option value="0">--Chọn trang tĩnh--</option>
                                    @foreach($listPage as $b)
                                        <option value="{{domain_url().'/page/'.$b->slug}}">{{$b->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tên menu <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Nhập tên menu" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Danh mục cha</label>
                            <div class="col-sm-8">
                                <select id="" name="parent" class="form-control" style="width: 100%" data-placeholder="">
                                    <option value="0">--Không chọn--</option>
                                   {{$menuModel->optionMenu(0,1,4,$data->parent,$data->id)}}
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">URL</label>
                            <div class="col-sm-8">
                                <input type="text" id="urlLink" value="{{$data->link}}" name="link" class="form-control">
                            </div>
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
                            <label>Thứ tự ưu tiên</label>
                            <input class="form-control"
                                   name="sort_order"
                                   type="number"
                                   min="0"
                                   value="{{$data->sort_order}}"
                                   placeholder="">
                        </div>
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
