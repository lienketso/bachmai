@extends('frontend::master')
@section('content')
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>{{trans('frontend.find_doctor')}}</h2>
			<p>
				<a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a>
				<i class="ti-angle-double-right"></i> {{trans('frontend.search_result')}}
			</p>
		</div>
	</div>
</div>
<section class="result_find_doc pdt50 pdb50">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<p class="back_to_find"><a href="{{route('frontend::doctor.search.get')}}"><i class="fa fa-long-arrow-left"></i> {{trans('frontend.new_search')}}</a></p>
				<div class="chuyenkhoa">
                    <form method="get" action="">
                        <input type="hidden" name="name" value="{{(isset($letter) ? $letter : $name)}}">
					<h4>{{trans('frontend.short_by_faculties')}}</h4>
                    @foreach($catList as $c)
					<div class="item_chuyenkhoa">
						<span><input type="checkbox" value="{{$c->id}}" {{($category==$c->id) ? 'checked' : ''}} name="khoa"></span>
						<span class="label_span">{{$c->name}}</span>
					</div>
                    @endforeach

                    <div class="button_khoa">
                        <button type="submit" class="btn_khoa">{{trans('frontend.filter')}}</button>
                    </div>
                    </form>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="content_list_doc">
					<h3>{{trans('frontend.display')}} {{count($data)}} {{trans('frontend.doctor')}} </h3>
					<div class="result_key">
						<p>{{trans('frontend.result_for_keyword')}} "<span>{{(isset($letter) ? $letter : $name)}}</span>"</p>
					</div>

                    @foreach($data as $d)
					<div class="list_doc">
						<div class="img_doc">
							<a href="{{route('frontend::doctor.detail.get',$d->slug)}}">
                                <img src="{{($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}" alt="{{$d->name}}">
                            </a>
						</div>
						<div class="info_doc">
							<h4><a href="{{route('frontend::doctor.detail.get',$d->slug)}}">{{$d->name}}</a></h4>
							<div class="desc_doc">
								{!! $d->description !!}
							</div>
						</div>
					</div>
                    @endforeach

                    <div class="paginate_bm">
                        {{$data->links()}}
                    </div>

				</div>
			</div>
		</div>
	</div>
</section>

@endsection
