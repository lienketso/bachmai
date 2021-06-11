@extends('frontend::master')
@section('content')
<div class="page-title">
    <div class="container">
        <div class="page-caption">
            <h2>{{trans('frontend.product_detail')}}</h2>
            <p><a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a> <i class="ti-angle-double-right"></i> {{$data->name}}</p>
        </div>
    </div>
</div>
<section class="padd-top-80 padd-bot-50">
    <div class="container">
        <div class="user_product_info">
            <div class="col-md-3 col-sm-5">
                <div class="emp-pic">
                    <img class="img-responsive width-270" src="{{ ($data->thumbnail!='') ? upload_url($data->thumbnail) : public_url('admin/themes/images/no-image.png')}}" alt="{{$data->name}}">
                </div>
            </div>
            <div class="col-md-9 col-sm-7">
                <div class="emp-des">
                    <h3>{{$data->name}}</h3>
                    <p>{{trans('frontend.company')}} : <a href="{{route('frontend::company.detail.get',$data->getCompany->slug)}}"
                                                          target="_blank"><span class="theme-cl">{{$data->getCompanyName()}}</span></a></p>
                    <p>{{trans('frontend.category')}} : {{$data->getCategory()}}</p>
                    <p>{{trans('frontend.dis_price')}} : {{number_format($data->disprice)}}  đ</p>
                    <div class="desc_product_page">{{$data->description}}</div>
                    <div class="col-sm-12 mrg-bot-10">
                        <button type="button" id="btnPopup" data-id="{{$data->company_id}}"
                                data-company="{{$data->getCompanyName()}}" data-toggle="modal" data-target="#partner" class="btn-job theme-btn btnPopup">{{trans('frontend.co_operate')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padd-top-30">
    <div class="container">
        <h2>{{trans('frontend.product_info')}}</h2>
        <div class="row">

            <div class="col-lg-12">
                <div class="content_product">{!! $data->content !!}</div>
            </div>

        </div>

        @if(!empty($relatedProduct) && count($relatedProduct)>0)
        <h2 class="title_related">{{trans('frontend.related_products')}}</h2>
        <div class="row">
            @foreach($relatedProduct as $row)
            <!-- Single Job -->
            <div class="col-md-3 col-sm-6">
                <div class="img_product_related">
                    <a href="{{route('frontend::product.detail.get',$row->slug)}}">
                        <img src="{{ ($row->thumbnail!='') ? upload_url($row->thumbnail) : public_url('admin/themes/images/no-image.png')}}" alt="{{$row->name}}">
                    </a>
                </div>
                <div class="title_product_related">
                    <h3><a href="{{route('frontend::product.detail.get',$row->slug)}}">{{$row->name}}</a></h3>
                </div>
            </div>
            @endforeach
        </div>
            @endif

    </div>
</section>

@include('frontend::blocks.newsletter')

@endsection
