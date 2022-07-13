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
                @if($user->isEmpty())
                <div class="container m-4">
                <h2 class="h2  mb-4 folot-left headerTitle">No Data Found</h2>
                </div>
                @else
                <h1 class="h3  mb-4 folot-left headerTitle">Contact Details</h1>
                                        @endif
            </div>
            
        </div>
    </div>

    <!-- Split section: Map + Contact form-->
    <div class="container m-4">
        <div class="row no-gutters">
            
            @foreach($user as $u)
            <div class="col-md-4">
                <div class="container">
<div class="card mb-3 box-shadow-sm" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4 mt-1">
       <img src="{{url('storage/app/public/sp_img/'.$u->img)}}" class="mt-3" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title mb-1">{{$u->name}}</h5>
        <p class="card-text mb-1"><a href="mailto:{{$u->email}}" class="btn p-0">{{$u->email}}</a></p>
        <p class="card-text"><small class="text-muted"><?php $professions = DB::table('profession')->where('id', $u->profession)->get(); 
                                        foreach($professions as $l){
                                        echo $l->profession;
                                        }  ?>, <?php $cities = DB::table('cities')->where('id', $u->city)->get(); 
                                        foreach($cities as $i){
                                        echo $i->city;
                                        }  ?></small></p>
                           <a href="tel:{{$u->phone}}" class="btn btn-primary">{{$u->phone}}</a>
                         
      </div>
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
</div>
</div>
@endsection
