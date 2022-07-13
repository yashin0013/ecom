@extends('layouts.front-end.app')

@section('title','Service Provider')

@push('css_or_js')
   
    <style>
        .headerTitle {
            font-size: 25px;
            font-weight: 700;
            margin-top: 2rem;
        }

        .for-contac-image {
            padding: 6%;
        }

        .for-send-message {
            padding: 26px;
            margin-bottom: 2rem;
            margin-top: 2rem;
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: {{$web_config['primary_color']}}

            }

            .headerTitle {

                font-weight: 700;
                margin-top: 1rem;
            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 sidebar_heading text-center mb-2">
                <h1 class="h3  mb-0 folot-left headerTitle">Become A Service Provider</h1>
            </div>
        </div>
    </div>

    <!-- Split section: Map + Contact form-->
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-2 iframe-full-height-wrap ">
                <!--<img style="" class="for-contac-image" src="{{asset("storage/app/public/png/contact.png")}}" alt="">-->
            </div>
            <div class="col-lg-8 for-send-message px-4 px-xl-5  box-shadow-sm">
                <h2 class="h4 mb-4 text-center"
                    style="color: #030303; font-weight:600;">Enter Your Details</h2>
                    <form action="{{url('/insert_service_provider')}}" method="POST" id="contactForm" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label >{{trans('messages.your_name')}}</label>
                                <input class="form-control name" name="name" type="text" placeholder="John Doe" required>

                              </div>
                            </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-email">{{trans('messages.email_address')}}</label>
                                <input class="form-control email" name="email" type="email" placeholder="johndoe@email.com" required >

                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-phone">{{trans('messages.your_phone')}}</label>
                                <input class="form-control mobile_number"  type="text" name="phone" placeholder="Contact Number" required>

                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-subject">{{trans('messages.City')}}:</label>
                                 <select class="custom-select" id="inputGroupSelect01" name="city" required>
                                    <option selected>Select City</option>
                                    @foreach($cities as $k)
                                    <option value="{{$k->id}}">{{$k->city}}</option>
                                    @endforeach
                                    <!--<option value="2">Two</option>-->
                                    <!--<option value="3">Three</option>-->
                                  </select>
                                <!--<input class="form-control subject" type="text" name="city"  placeholder="Short title" required>-->

                              </div>
                            </div>
                             <div class="col-md-12">
                            <div class="form-group">
                              <label for="cf-message">Profession</label>
                               <select class="custom-select" id="inputGroupSelect01" name="profession" required>
                                    <option selected>Select Profession</option>
                                    @foreach($profession as $k)
                                    <option value="{{$k->id}}">{{$k->profession}}</option>
                                    @endforeach
                                    <!--<option value="2">Two</option>-->
                                    <!--<option value="3">Three</option>-->
                                  </select>
                              <!--<input class="form-control subject" type="text" name="profession"  placeholder="Profession" required>-->

                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="img" class="control-label mb-1">Photo</label>
                                <input id="img" name="image" type="file" class="form-control-file" required>
                            </div>
                        </div>
                        <div class=" ">
                          <button class="btn btn-primary" type="submit"  id="submit">Submit</button>
                      </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
