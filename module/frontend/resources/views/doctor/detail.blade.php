@extends('frontend::master')
@section('content')


<section class="detail_doc pdt50 pdb50">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="info_detail_doc">
					<h3>{{trans('frontend.full_name')}} : <span>{{$data->name}}</span></h3>

					<div class="desc_short_doc">
						{!! $data->description !!}
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="img_doc_detail">
					<img src="{{($data->thumbnail!='') ? upload_url($data->thumbnail) : public_url('admin/themes/images/no-image.png')}}" alt="{{$data->name}}">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="content_single_doc pdt50 pdb50">
	<div class="container">
		<h3 class="title_content_doc">{{trans('frontend.info_action')}}</h3>
		<div class="detail_content">
			{!! $data->content !!}
		</div>
	</div>
</section>

@endsection
