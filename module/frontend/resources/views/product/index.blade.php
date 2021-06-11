@extends('frontend::master')
@section('content')
<div class="page-title">
    <div class="container">
        <div class="page-caption">
            <h2>{{$catInfor->name}}</h2>
            <p><a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a> <i class="ti-angle-double-right"></i> {{$catInfor->name}}</p>
        </div>
    </div>
</div>
<section class="utf_manage_jobs_area padd-top-80 padd-bot-80">
    <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="heading">
                <h2>{{trans('frontend.product_list')}}</h2>
                <p>{{trans('frontend.desc_product_page')}} <strong>{{$catInfor->name}}</strong></p>
            </div>
        </div>
        </div>

        <div class="table-responsive">
            <table class="table table-lg table-hover">
                <thead>
                <tr>
                    <th>{{trans('frontend.product_name')}}</th>
                    <th>{{trans('frontend.company_info')}}</th>
                    <th>{{trans('frontend.view_product')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                    <td><a href="{{route('frontend::product.detail.get',$row->slug)}}">
                            <img src="{{ ($row->thumbnail!='') ? upload_url($row->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                 class="avatar-lg" alt="{{$row->name}}">{{$row->name}} </a>
                    </td>
                    <td><a href="{{route('frontend::company.detail.get',$row->getCompany->slug)}}" target="_blank">{{$row->getCompanyName()}}</a></td>
                    <td><a class="btn-signup red-btn" href="{{route('frontend::product.detail.get',$row->slug)}}" ><span class="mng-jb">{{trans('frontend.view_product')}}</span></a></td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="utf_flexbox_area padd-10">
                {{$data->links()}}
            </div>
        </div>
    </div>
</section>

@include('frontend::blocks.newsletter')

    @endsection
