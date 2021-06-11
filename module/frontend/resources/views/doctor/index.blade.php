@extends('frontend::master')
@section('content')

<section class="banner_find">
	<div class="bao_opacity">
		<div class="container">
			<div class="form_search_doc">
				<div class="info_form">
					<h3><span><i class="fa fa-search"></i></span> {{trans('frontend.find_doctor')}}</h3>
					<div class="form_find_detail">
                        <form method="get" action="{{route('frontend::doctor.result.get')}}">
						<div class="form-title">
							<label>{{trans('frontend.doctor_name')}}</label>
							<input type="text" name="name" placeholder="{{trans('frontend.input_keywords')}}">
						</div>
						<div class="form-title">
							<label>{{trans('frontend.faculties')}}</label>
							<select name="khoa">
								<option value="">{{trans('frontend.all_faculties')}}</option>
                                @foreach($catList as $c)
								<option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
							</select>
						</div>
						<div class="form-title">
							<input type="submit" name="" value="{{trans('frontend.search')}}" id="searchBtn" >
						</div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="alphabet_find pdt50 pdb50">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h4 class="title_alpha"><i class="fa fa-eye"></i> {{trans('frontend.search_first_keyword')}}</h4>
				<div class="list_alphabet">
					<ol class="acces-alpha">
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'a'])}}"><span aria-hidden="true">A</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'b'])}}"><span aria-hidden="true">B</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'c'])}}"><span aria-hidden="true">C</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'d'])}}"><span aria-hidden="true">D</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'e'])}}"><span aria-hidden="true">E</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'f'])}}"><span aria-hidden="true">F</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'g'])}}"><span aria-hidden="true">G</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'h'])}}"><span aria-hidden="true">H</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'i'])}}"><span aria-hidden="true">I</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'j'])}}"><span aria-hidden="true">J</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'k'])}}"><span aria-hidden="true">K</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'l'])}}"><span aria-hidden="true">L</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'m'])}}"><span aria-hidden="true">N</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'n'])}}"><span aria-hidden="true">M</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'o'])}}"><span aria-hidden="true">O</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'p'])}}"><span aria-hidden="true">P</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'q'])}}"><span aria-hidden="true">Q</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'r'])}}"><span aria-hidden="true">R</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'s'])}}"><span aria-hidden="true">S</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'t'])}}"><span aria-hidden="true">T</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'u'])}}"><span aria-hidden="true">U</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'v'])}}"><span aria-hidden="true">V</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'w'])}}"><span aria-hidden="true">W</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'x'])}}"><span aria-hidden="true">X</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'y'])}}"><span aria-hidden="true">Y</span></a></li>
						<li><a id="" href="{{route('frontend::doctor.result.get',['letter'=>'z'])}}"><span aria-hidden="true">Z</span></a></li>

					</ol>
				</div>
			</div>
			<div class="col-lg-4">
				<a href="#">
				<h4 class="title_alpha">{{trans('frontend.view_all_faculties')}}</h4>
				<p>{{trans('frontend.info_text_faculties')}}</p>
				</a>
			</div>
			<div class="col-lg-4">
				<a href="{{route('frontend::diseases.topic.get')}}">
				<h4 class="title_alpha">{{trans('frontend.diseases_conditions')}}</h4>
				<p>{{trans('frontend.info_text_diseases')}}</p>
				</a>
			</div>
		</div>
	</div>
</section>

@endsection
