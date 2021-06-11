@extends('wadmin-dashboard::master')
@section('content')
    <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="{{route('wadmin::dashboard.index.get')}}"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li><a href="">Danh sách ủng hộ quỹ</a></li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <h4 class="panel-title">Danh sách ủng hộ quỹ</h4>
            <p>Danh sách ủng hộ quỹ bệnh viện</p>
        </div>

        <div class="search_page">
            <div class="panel-body">
                <div class="row">
                    <form method="get">
                        <div class="col-sm-5">
                            <input type="text" name="name" placeholder="Tên hoặc số điện thoại" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-info">Tìm kiếm</button>
                            <a href="{{route('wadmin::donate.index.get')}}" class="btn btn-default">Làm lại</a>
                        </div>
                        <div class="col-sm-5">
                            <div class="button_more">

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
                        <th>Họ tên</th>
                        <th>Thông tin</th>
                        <th>Số tiền ủng hộ</th>
                        <th>Nội dung</th>
                        <th class="">Ngày gửi</th>
                        <th class="">Trạng thái</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->title}} {{$d->full_name}}</td>
                            <td> Số điện thoại : {{$d->phone}} - Email : {{$d->email}}</td>
                            <td>{{number_format($d->amount)}} đ</td>
                            <td>{{$d->donate_for}}</td>
                            <td>{{format_date($d->created_at)}}</td>
                            <td><a href="{{route('wadmin::donate.change.get',$d->id)}}"
                                   class="btn btn-sm {{($d->status=='active') ? 'btn-success' : 'btn-warning'}} radius-30">
                                    {{($d->status=='active') ? 'Thành công' : 'Chưa hoàn thành'}}</a></td>
                            <td>
                                <ul class="table-options">
                                    <li><a class="example-p-6" data-url="{{route('wadmin::donate.remove.get',$d->id)}}"><i class="fa fa-trash"></i></a></li>
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
