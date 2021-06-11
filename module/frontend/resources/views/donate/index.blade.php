@extends('frontend::master')

@section('js-init')
    <script type="text/javascript">
        $('#other_Amount').hide();
        $('#otherTab').on('click',function (e) {
            e.preventDefault();
            $('#otherTab').addClass('active');
            $('#other_Amount').show();
            $(".tab").removeClass("active");
        });
        $(".tab").click(function (e) {
            e.preventDefault();
            let _this = $(e.currentTarget);
            let amount = _this.attr('data-amount');
            $(".tab").removeClass("active");
            $(this).addClass("active");
            $('#totalAmount').val(amount);
        });

    </script>
@endsection

@section('content')
<div class="page-title">
	<div class="container">
		<div class="page-caption">
			<h2>{{trans('frontend.hospital_fund')}}</h2>
			<p>
				<a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a>
				<i class="ti-angle-double-right"></i>
				<a href="{{route('frontend::doctor.search.get')}}" title="">Donate</a>
				<i class="ti-angle-double-right"></i> {{trans('frontend.giving_to')}}
			</p>
		</div>
	</div>
</div>

<section class="donate_page pdt50 pdb50">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="detail_donate">
					<h3>{{trans('frontend.detail_giving')}}</h3>
					<div class="list_money">
						<ul>
							<li><a href="javascript:void(0)" class="tab" data-amount="1000000" id="tab_1" >{{trans('frontend.50_dollar')}}</a></li>
							<li><a href="javascript:void(0)" class="tab" data-amount="2000000" id="tab_2" >{{trans('frontend.100_dollar')}}</a></li>
							<li><a href="javascript:void(0)" class="tab" data-amount="5000000" id="tab_3" >{{trans('frontend.250_dollar')}}</a></li>
							<li><a href="javascript:void(0)" class="tab" data-amount="10000000" id="tab_4" >{{trans('frontend.500_dollar')}}</a></li>
							<li><a href="javascript:void(0)" class="tab" data-amount="20000000" id="tab_5" >{{trans('frontend.1000_dollar')}}</a></li>
							<li><a href="javascript:void(0)" class="tab" id="otherTab">{{trans('frontend.other_dollar')}}</a></li>
						</ul>
					</div>
					<form method="post" class="frm_donate">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{csrf_field()}}
						<div class="form-group" id="other_Amount">
							<label>{{trans('frontend.enter_an_amount ')}} (*)</label>
							<input type="text" name="amount" id="totalAmount" value="" class="form-control txtstyle" placeholder="{{trans('frontend.other_amount')}}">
						</div>
						<div class="form-group">
							<label>{{trans('frontend.support_for')}} (*)</label>
							<select name="donate_for" class="form-control txtstyle">
								<option value="{{trans('frontend.against_covid')}}">{{trans('frontend.against_covid')}}</option>
								<option value="{{trans('frontend.medical_research')}}">{{trans('frontend.medical_research')}}</option>
								<option value="{{trans('frontend.development_fund')}}">{{trans('frontend.development_fund')}}</option>
							</select>

						</div>
						<h2 class="title_donate">{{trans('frontend.billing_info')}}</h2>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Title</label>
									<select name="title" class="form-control txtstyle">
										<option value="Mr.">Mr.</option>
										<option value="Mrs.">Mrs.</option>
										<option value="Ms.">Ms.</option>
										<option value="Mss.">Mss.</option>
										<option value="Dr.">Dr.</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{{trans('frontend.full_name')}} (*)</label>
									<input type="text" name="full_name" value="{{old('full_name')}}" class="form-control txtstyle" placeholder="Ex : Nguyen Van A">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{{trans('frontend.country')}}</label>
									<select name="country" class="form-control txtstyle">
										<option>{{trans('frontend.country')}}</option>
										<option value="Việt Nam">Việt Nam</option>
										<option value="England">England</option>
										<option value="Japan">Japan</option>
										<option value="Korea">Korea</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Usa">USA</option>
									</select>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label>Zip/Postal Code </label>
									<input type="text" name="zip_code" value="{{old('zip_code')}}" class="form-control txtstyle" placeholder="Ex : 100000">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{{trans('frontend.address')}} (*)</label>
									<input type="text" name="address" value="{{old('address')}}" class="form-control txtstyle" placeholder="Địa chỉ">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{{trans('frontend.city')}} </label>
									<input type="text" name="city" value="{{old('city')}}" class="form-control txtstyle" placeholder="Thành phố">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>{{trans('frontend.phone')}} (*)</label>
									<input type="text" name="phone" value="{{old('phone')}}" class="form-control txtstyle" placeholder="Số điện thoại">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" value="{{old('email')}}" class="form-control txtstyle" placeholder="Email">
								</div>
							</div>

						</div>
						<div class="btn_donate">
							<button>{{trans('frontend.send_giving')}}</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="support_bachmai">
					<h3>{{$setting['donate_name_'.$lang]}}</h3>
					<div class="content_support">
                        {{$setting['donate_description_'.$lang]}}
					</div>

					<div class="list_alert_support">
						<div class="support_item">
							<div class="icon_left_s">
								<i class="fa fa-info-circle"></i>
							</div>
							<div class="info_support">
                                {!! $setting['donate_bank_info_'.$lang] !!}
							</div>
						</div>
						<div class="support_item">
							<div class="icon_left_s">
								<i class="fa fa-info-circle"></i>
							</div>
							<div class="info_support">
                                {{$setting['donate_info_home_'.$lang]}}
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

@endsection
