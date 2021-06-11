@extends('frontend::master')
@section('content')
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>{{$data->name}}</h2>
			<p>
				<a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a>
                <i class="ti-angle-double-right"></i>
				<a href="" title="Triệu chứng bệnh và tình trạng">{{trans('frontend.diseases_conditions')}}</a>
				<i class="ti-angle-double-right"></i> {{$data->name}}
			</p>
		</div>
	</div>
</div>
<section class="diseas_page pdt50 pdb50">
	<div class="container">

		<div class="row">
			<div class="col-lg-8">
				<h2 class="title_overview">Overview <span><a href="#"><i class="fa fa-print"></i> {{trans('frontend.print_post')}}</a></span></h2>
				<div class="content_desi_single">
					{!! $data->content !!}
				</div>
				<div class="relate_desi">
					<h3>Related</h3>
					<ul>
                        @foreach($related as $d)
						    <li><a href="{{route('frontend::diseases.detail.get',$d->slug)}}">{{$d->name}}</a></li>
                        @endforeach
					</ul>
				</div>
			</div>
			<div class="col-lg-4">
                @include('frontend::diseases.blocks.sidebar',['catSidebar'=>$catSidebar])
			</div>
		</div>
	</div>
</section>
@endsection
