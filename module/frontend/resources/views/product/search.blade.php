@extends('frontend::master')


@section('js-init')

    <script type="text/javascript">
        $("#sortGo").on('change',function(e){
            $('#sortForm').submit();
        })
    </script>
@endsection

@section('content')
<div class="page-title">
    <div class="container">
        <div class="page-caption">
            <h2>{{trans('frontend.product_list')}}</h2>
            <p><a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a> <i class="ti-angle-double-right"></i> {{trans('frontend.product_list')}}</p>
        </div>
    </div>
</div>
<section class="padd-top-80 padd-bot-80">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-5">
                <form method="get" action="">
                <div class="widget-boxed padd-bot-0">
                    <div class="widget-boxed-body">
                        <div class="search_widget_job">
                            <div class="field_w_search">
                                <input type="text" name="name" value="{{$name}}" class="form-control" placeholder="{{trans('frontend.search_keywords')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-boxed padd-bot-0">
                    <div class="widget-boxed-header">
                        <h4>{{trans('frontend.categories')}}</h4>
                    </div>
                    <div class="widget-boxed-body " id="">
                        <div class="side-list no-border">
                            <ul>
                                @foreach($allCategory as $row)
                                <li> <span class="custom-checkbox">
                  <input type="checkbox" name="category[]" {{($category&&in_array($row->id,$category)) ? 'checked' : ''}} value="{{$row->id}}" id="{{$row->id}}">
                  <label for="{{$row->id}}"></label>
                  </span> {{$row->name}}
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                    <div class="col-md-12 padd-top-10 text-center">
                        <button type="submit" class="btn btn-m theme-btn full-width">{{trans('frontend.search')}}</button>
                    </div>
                </form>

            </div>

            <!-- Start Job List -->
            <div class="col-md-9 col-sm-7">
                <div class="row mrg-bot-20">
                    <div class="col-md-4 col-sm-12 col-xs-12 browse_job_tlt">
                        <h4 class="job_vacancie">{{trans('frontend.total_product')}} {{$countProduct}} {{trans('frontend.products')}}</h4>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="fl-right short_by_filter_list">
                            <div class="search-wide short_by_til">
                                <h5>{{trans('frontend.short_by')}}</h5>
                            </div>
                            <div class="search-wide full">
                                <form method="get" name="sort_form" id="sortForm">
                                    <select id="sortGo" class="wide form-control" name="sort_order" style="display: none;">
                                        <option value="1">{{trans('frontend.most_recent')}}</option>
                                        <option value="2" {{(isset($sort_order)&&$sort_order==2) ? 'selected' : ''}}>{{trans('frontend.most_viewed')}}</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($data as $row)
                    <div class="col-lg-4">
                    <div class="list_product_search">
                        <div class="img_product_search">
                            <a href="{{route('frontend::product.detail.get',$row->slug)}}">
                                <img src="{{ ($row->thumbnail!='') ? upload_url($row->thumbnail) : public_url('admin/themes/images/no-image.png')}}" alt="{{$row->name}}">
                            </a>
                        </div>
                        <h3><a href="{{route('frontend::product.detail.get',$row->slug)}}">{{$row->name}}</a></h3>
                    </div>
                    </div>
                    @endforeach
                </div>


                <div class="clearfix"></div>
                <div class="utf_flexbox_area padd-0">
                    {{$data->links()}}
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</section>

@include('frontend::blocks.newsletter')

    @endsection
