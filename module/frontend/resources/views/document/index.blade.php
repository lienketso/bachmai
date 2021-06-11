@extends('frontend::master')
@section('content')
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>Tài liệu - Văn bản</h2>
			<p>
				<a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a>
				<i class="ti-angle-double-right"></i> Danh sách tài liệu, văn bản pháp quy
			</p>
		</div>
	</div>
</div>

<section class="file_page pdt50 pdb50">
	<div class="container">
		<div class="row">
        @foreach($data as $d)
			<div class="col-lg-4">
				<div class="list_file">
					<a href="{{route('frontend::document.list.get',$d->slug)}}">
						<p class="list_plug">
							<span><i class="fa fa-file-word-o"></i></span>
							<span><i class="fa fa-file-excel-o"></i></span>
							<span><i class="fa fa-file-pdf-o"></i></span>
							<span><i class="fa fa-file-powerpoint-o"></i></span>
						</p>
						<h4>{{$d->name}}</h4>
					</a>
				</div>
			</div>
            @endforeach

		</div>
	</div>
</section>

@endsection
