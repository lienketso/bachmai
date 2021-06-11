@extends('frontend::master')
@section('content')
<div class="page-title">
    <div class="container">
        <div class="page-caption">
            <h2>{{trans('frontend.all_categories')}}</h2>
            <p><a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a> <i class="ti-angle-double-right"></i> {{trans('frontend.all_categories')}}</p>
        </div>
    </div>
</div>

<section class="padd-top-80 padd-bot-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($data as $row)
                <div class="col-md-3 col-sm-6">
                    <a href="{{route('frontend::product.index.get',$row->slug)}}" title="{{$row->name}}">
                        <div class="utf_category_box_area">
                            <div class="utf_category_desc">
                                <div class="utf_category_icon"> <i class="icon-bargraph" aria-hidden="true"></i> </div>
                                <div class="category-detail utf_category_desc_text">
                                    <h4>{{$row->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                    <div class="clearfix"></div>
                    <div class="utf_flexbox_area padd-0">
                        {{$data->links()}}
                    </div>
            </div>
        </div>
    </div>
</section>

@include('frontend::blocks.newsletter')

@endsection
