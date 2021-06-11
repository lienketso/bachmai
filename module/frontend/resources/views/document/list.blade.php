@extends('frontend::master')
@section('content')
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>Tài liệu - Văn bản</h2>
			<p>
				<a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a>
				<i class="ti-angle-double-right"></i> {{$data->name}}
			</p>
		</div>
	</div>
</div>

<section class="list_tailieu pdt50 pdb50">
	<div class="container">
		<div class="row">
            @foreach($documentList as $d)
			<div class="col-lg-6">
				<div class="info_file">
					<a href="{{upload_url($d->file_download)}}" target="_blank" title="Click để tải file về máy tính"><i class="fa fa-download"></i> {{$d->name}}</a>
				</div>
			</div>
            @endforeach
                <div class="paginate_bm">
                    {{$documentList->links()}}
                </div>
		</div>
	</div>
</section>

@endsection
