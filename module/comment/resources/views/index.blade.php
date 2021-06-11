@extends('wadmin-dashboard::master')
@section('content')
    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="">Danh sách Danh mục</a></li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title">Danh sách Comment</h4>
            <p>Danh sách comment trên trang</p>
        </div>

        <div class="search_page">
            <div class="panel-body">
                <div class="row">
                    <form method="get">
                        <div class="col-sm-5">
                            <input type="text" name="name" placeholder="Nhập tiêu đề" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-info">Tìm kiếm</button>
                            <a href="{{route('wadmin::comment.index.get')}}" class="btn btn-default">Làm lại</a>
                        </div>
                        <div class="col-sm-5">
                            <div class="button_more">
                                <a class="btn btn-primary" href="{{route('wadmin::comment.create.get')}}">Thêm mới</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                @if (session('edit'))
                    <div class="alert alert-info">{{session('edit')}}</div>
                @endif
                @if (session('create'))
                    <div class="alert alert-success">{{session('create')}}</div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-success">{{session('delete')}}</div>
                @endif
                <table class="table nomargin">
                    <thead>
                    <tr>
                        <th>Thông tin</th>
                        <th>Nội dung</th>
                        <th>Comment bài</th>
                        <th class="">Trạng thái</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>

                            <td><b>{{$d->guest_name}}</b>
                                <br/>{{$d->guest_mail}}
                                <br/><span style="font-style: italic">Comment time : {{stringDate($d->created_at)}} lúc {{showtime($d->created_at)}}</span>
                            </td>
                            <td>{{cut_string($d->content,50)}}</td>
                            <td><a href="{{route('frontend::post.detail.get',$d->post->slug)}}" target="_blank">{{cut_string($d->post->name,80)}}</a></td>
                            <td><a href="{{route('wadmin::comment.change.get',$d->id)}}"
                                   class="btn btn-sm {{($d->status=='active') ? 'btn-success' : 'btn-warning'}} radius-30">
                                    {{($d->status=='active') ? 'Đang hiển thị' : 'Tạm ẩn'}}</a></td>
                            <td>
                                <ul class="table-options">
                                    <li><a href="{{route('wadmin::comment.edit.get',$d->id)}}"><i class="fa fa-pencil"></i></a></li>
                                    <li><a class="example-p-6" data-url="{{route('wadmin::comment.remove.get',$d->id)}}"><i class="fa fa-trash"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$data->links()}}
            </div><!-- table-responsive -->
        </div>
    </div>
@endsection
