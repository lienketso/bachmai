@extends('frontend::master')
@section('content')
<section class="diseas_page pdt50 pdb50">
	<div class="container">
		<h1 class="title_diseas">{{trans('frontend.find_diseases')}}</h1>
		<div class="row">
			<div class="col-lg-3">
				<div class="left_desi">
					<h3>{{trans('frontend.guides_condition')}}</h3>
					<div class="list_alpha_desi">
						<h4>{{trans('frontend.narrow_your_search')}}</h4>
						<ol class="acces-alpha">
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'a'])}}">A</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'b'])}}">B</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'c'])}}">C</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'d'])}}">D</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'e'])}}">E</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'f'])}}">F</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'g'])}}">G</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'h'])}}">H</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'i'])}}">I</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'j'])}}">J</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'k'])}}">K</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'l'])}}">L</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'m'])}}">M</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'n'])}}">N</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'o'])}}">O</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'p'])}}">P</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'q'])}}">Q</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'r'])}}">R</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'s'])}}">S</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'t'])}}">T</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'u'])}}">U</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'v'])}}">V</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'w'])}}">W</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'x'])}}">X</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'y'])}}">Y</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'z'])}}">Z</a></li>
                            <li><a href="{{route('frontend::diseases.index.get',['letter'=>'all'])}}">#</a></li>
					</ol>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<h3 class="title_ap">{{($topic) ? $topic->name : $letter}}</h3>
				<div class="list_desi">
                   @if(!empty($data))
                    @foreach($data as $d)
					<div class="desi_item">
						<a href="{{route('frontend::diseases.detail.get',$d->slug)}}">{{$d->name}}</a>
					</div>
                    @endforeach
                       @else
                        <p>{{trans('frontend.keyword_data_update')}}</p>
                    @endif

				</div>
			</div>

			<div class="col-lg-3">
                @include('frontend::diseases.blocks.sidebar',['catSidebar'=>$catSidebar])
			</div>
		</div>
	</div>
</section>

@endsection
