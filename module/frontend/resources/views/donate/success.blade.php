@extends('frontend::master')
@section('content')
    <section class="success_donate">
        <div class="container">
            <h1 class="title_donate">Thanks you ! <span>{{$data->full_name}}</span></h1>
            <div class="data_info">
                Số tiền ủng hộ : <span>{{number_format($data->amount)}} đồng</span>
            </div>
            <img src="{{public_url('frontend/assets/img/thank.jpg')}}">
            <p>Cảm ơn quý anh chị đã ủng hộ quỹ bệnh viện, chúng tôi sẽ sử dụng quỹ cho những mục đích từ thiện, nghiên cứu sức khỏe, phòng chống thiên tai, dịch bệnh.
                <a href="{{route('frontend::home')}}">Click vào đây</a> để quay lại trang chủ</p>
        </div>
    </section>
    @endsection
