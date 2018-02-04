@extends('front.layout')
@section('content')
<div class="page-title-container">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">{{ $details->{$slug->title} }}</h2>
        </div>
        <ul class="breadcrumbs pull-right">
            <li><a href="{{ url('/'.$lang.'/') }}">{{ trans("lang.home") }}</a></li>
            <li><a href="{{ url('/'.$lang.'/programs') }}">{{ trans("lang.umrah_packages") }}</a></li>
            <li class="active">
                {{ $details->{$slug->title} }}
            </li>
        </ul>
    </div>
</div>
<section id="content">
    <div class="container">
        <div class="row">
            <div id="main" class="col-md-9 pull-left">
                <div class="tab-container style1" id="cruise-main-content">

                    <div class="tab-content">
                        <div id="photos-tab" class="tab-pane fade in active">
                            @if(!$details->slider->isEmpty())
                            <div class="photo-gallery style1 ltr" data-animation="slide" data-sync="#photos-tab .image-carousel">
                                <ul class="slides">
                                    @foreach($details->slider as $one)
                                    <li>
                                        <img src="{{ asset($one->image) }}" style="width: 870px;height: 484px;" alt="" />
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="image-carousel style1 ltr" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                                <ul class="slides">
                                    @foreach($details->slider as $one)
                                    <li>
                                        <img src="{{ asset($one->image) }}" style="width: 70px;height: 70px;" alt="" />
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @else
                            <div class="photo-gallery style1 ltr" data-animation="slide" data-sync="#photos-tab .image-carousel">
                                <ul class="slides">
                                    <li>
                                        <img src="{{ asset($details->image) }}" style="width: 870px;height: 484px;" alt="" />
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>

                <div id="cruise-features" class="tab-container">
                    <ul class="tabs">
                        <li class="active"><a href="#cruise-description" data-toggle="tab">{{ trans("lang.overview") }}</a></li>
                        <li><a href="#cruise-amenities" data-toggle="tab">{{ trans("lang.features") }}</a></li>
                        <li><a href="#cruise-reviews" data-toggle="tab">{{ trans("lang.city") }}</a></li>
                        <li><a href="#cruise-availability" data-toggle="tab"> {{ trans("lang.reservation") }}</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade in active" id="cruise-description">

                            <div class="long-description">
                                <h2>{{ $details->{$slug->title} }}</h2>
                                <p> {{ $details->{$slug->content} }}
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cruise-amenities">
                            <h2> {{ trans("lang.features") }} </h2>

                            <ul>
                                @foreach($features_array as $one)
                                <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4 list-group-item padding-0-4  pull-left">
                                    <img src="{{ asset($one->image) }}" class="image-32 margin-4"> {{ $one->{$slug->title} }}
                                </li>
                                @endforeach
                            </ul>
                        </div>




                        <div class="tab-pane fade" id="cruise-reviews">
                            <div class="border-box travelo-box clearfix">
                                <div class="image-box style12">
                                    <article class="box">
                                        <figure>
                                            <a href="{{ url('/'.$lang.'/destinations/details/'.$details->city->id.'/'.str_replace(' ', '-', $details->city->{$slug->title})) }}">
                                                <img src="{{ asset($details->city->image) }}" alt="{{ $details->city->{$slug->title} }}" class="middle-item" style="width:121px;height:101px;">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h4 class="box-title"><a href="{{ url('/'.$lang.'/destinations/details/'.$details->city->id.'/'.str_replace(' ', '-', $details->city->{$slug->title})) }}">{{ $details->city->{$slug->title} }}</a></h4>
                                            <p> {{ mb_substr($details->city->{$slug->content}, 0, 300) }} <a href="{{ url('/'.$lang.'/destinations/details/'.$details->city->id.'/'.str_replace(' ', '-', $details->city->{$slug->title})) }}">[ ... ]</a> </p>
                                        </div>
                                    </article>
                                    <hr>


                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="cruise-availability">
                            <div class="border-box travelo-box clearfix">
                                <h4 class="title col-xs-12"> {{ trans("lang.reservation") }}</h4>
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-sm-4  pull-left">
                                            <div class="form-group">
                                                <label> {{ trans("lang.full_name") }}</label>
                                                <input type="text" name="name" class="input-text full-width">
                                            </div>
                                            <div class="form-group">
                                                <label> {{ trans("lang.email") }}</label>
                                                <input type="text" name="email" class="input-text full-width">
                                            </div>
                                            <div class="form-group">
                                                <label> {{ trans("lang.phone") }}</label>
                                                <input type="text" name="subject" class="input-text full-width">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 form-group pull-left">
                                            <label class="control-label"> {{ trans("lang.date_of_trip") }}</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="801">06 / 04 / 2018</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group pull-left">
                                            <label class="control-label">{{ trans("lang.room_type") }}</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="5">Individual</option>
                                                    <option value="6">المزدوجة</option>
                                                    <option value="7">الثلاثية</option>
                                                </select><span class="custom-select full-width">Individual</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group pull-left">
                                            <label class="control-label">{{ trans("lang.number_of_rooms") }}</label>
                                            <input type="number" name="subject" class="input-text full-width">
                                        </div>

                                        <div class="col-sm-2 form-group pull-left">
                                            <label class="control-label">{{ trans("lang.adults") }}</label>
                                            <input type="number" name="subject" class="input-text full-width">
                                        </div>

                                        <div class="col-sm-2 form-group pull-left">
                                            <label class="control-label">{{ trans("lang.children") }}</label>
                                            <input type="number" name="subject" class="input-text full-width">
                                        </div>
                                        <div class="col-sm-2 form-group pull-left">
                                            <label class="control-label">{{ trans("lang.infants") }}</label>
                                            <input type="number" name="subject" class="input-text full-width">
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label class="control-label">{{ trans("lang.details") }}</label>
                                            <textarea class="form-control" name="program_details" type="text"></textarea>
                                        </div>



                                        <div class="col-sms-offset-6 col-sm-12">
                                            <button class="btn-medium full-width">{{ trans("lang.send_booking_request") }}</button>
                                        </div>
                                    </div>


                                </form>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
            <div class="sidebar col-md-3 pull-left">
                <article class="detailed-logo">

                    <div class="details">
                        <h2 class="box-title">{{ $details->{$slug->title} }}</h2>

                        <div class="feedback clearfix">
                            <div title="{{ $details->stars }} {{ trans("lang.stars") }}" class="five-stars-container" data-toggle="tooltip" data-placement="bottom">
                                @for($i = 0; $i < $details->stars; $i++)
                                <span class="five-stars" style=""></span>
                                @endfor

                            </div>
                        </div>
                        <a class="button yellow full-width uppercase btn-small">{{ trans("lang.book_now") }}</a>
                    </div>
                </article>



                @if(!$similar_hotels->isEmpty())
                <div class="travelo-box">
                    <h4>{{ trans("lang.similar_hotels") }}</h4>
                    <div class="image-box style14">
                        @foreach($similar_hotels as $one)
                        <article class="box">
                            <figure>
                                <a href="{{ url('/'.$lang.'/programs/details/'.$one->id.'/'.str_replace(' ', '-', $one->{$slug->title})) }}">
                                    <img src="{{ asset($one->image) }}" style="width: 63px;height: 69px;" alt="{{ $one->{$slug->title} }}">
                                </a>
                            </figure>
                            <div class="details">
                                <h5 class="box-title">
                                    <a href="{{ url('/'.$lang.'/programs/details/'.$one->id.'/'.str_replace(' ', '-', $one->{$slug->title})) }}">{{ $one->{$slug->title} }}</a>
                                </h5>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
                @endif


                <div class="travelo-box contact-box">
                    <h4 class="box-title">{{ trans("lang.need_help") }}</h4>
                    <p>{{ mb_substr($settings->{$slug->about_us}, 0, 100) }}</p>
                    <address class="contact-details">
                        <span class="contact-phone"><i class="soap-icon-phone"></i> {{ $settings->site_phone }}
                        </span>
                        <br />
                        <a href="javascript:;" class="contact-email">{{ $settings->site_email }}</a>
                    </address>
                </div>


            </div>
        </div>
    </div>
</section>
@stop