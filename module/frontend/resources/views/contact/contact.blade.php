@extends('frontend::master')
@section('content')
    <section class="map-contact">
        <div class="iframe_contact">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7760327209776!2d105.83778156533192!3d21.001613094079445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad02398e4907%3A0x52c4b4d3fa152a4e!2zxJDDoGkgcGh1biBuxrDhu5tjIEJWIELhuqFjaCBNYWk!5e0!3m2!1svi!2s!4v1623048800721!5m2!1svi!2s"
                    width="" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <section class="padd-top-80 padd-bot-70">
        <div class="container">
            <div class="title_contact">
                <h1>Have a Question? Get In Touch</h1>
                <p>Have a question? Want to book an appointment for yourself or your children? Give us a call or send an email to contact the MedService.</p>
            </div>
            <div class="col-lg-4">
                <div class="list_contact">
                    <div class="contact_item">
                        <h3>{{trans('frontend.bachmai_hospital')}}</h3>
                        <ul>
                            <li>{{$setting['site_address_'.$lang]}}</li>
                            <li>Tel : {{$setting['site_hotline_'.$lang]}}</li>
                            <li>Email :<a href="mailto:{{$setting['site_email_'.$lang]}}">{{$setting['site_email_'.$lang]}}</a> </li>
                        </ul>
                    </div>
                    <div class="contact_item">
                        <h3>{{trans('frontend.date_working')}}</h3>
                        <ul>
                            <li>{{trans('frontend.mon_to_sun')}} </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list_alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" class="mrg-bot-40 frmContact">
                        {{csrf_field()}}
                        <div class="col-md-6 col-sm-6">
                            <label>{{trans('frontend.name')}} (*) :</label>
                            <input type="text" class="form-control" name="name" placeholder="{{trans('frontend.full_name')}}">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label>{{trans('frontend.email')}} (*):</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label>{{trans('frontend.subject')}}:</label>
                            <input type="text" class="form-control" name="title" placeholder="{{trans('frontend.subject')}}">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <label>{{trans('frontend.message')}}:</label>
                            <textarea class="form-control height-120" rows="8" name="messenger" placeholder="{{trans('frontend.message')}}"></textarea>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <button class="btn theme-btn" name="submit">{{trans('frontend.send_message')}}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
