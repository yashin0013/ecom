@extends('layouts.back-end.app')
@section('title','Service Providers List')
<!--@push('css_or_js')-->
    <!-- Custom styles for this page -->
<!--    <link href="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">-->
<!--@endpush-->

@section('content')
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('messages.Dashboard')}}</a></li>
            <li class="breadcrumb-item" aria-current="page">Directory</li>
            <li class="breadcrumb-item" aria-current="page">{{trans('messages.List')}}</li>
        </ol>
    </nav>

    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Service Providers List</h5>
                    <!--<a href="{{route('admin.employee.add-new')}}" class="btn btn-primary  float-right">-->
                    <!--    <i class="tio-add-circle"></i>-->
                    <!--    <span class="text">{{trans('messages.Add')}} {{trans('messages.New')}}</span>-->
                    <!--</a>-->
                </div>
                <div class="card-body" style="padding: 0">
                    <div class="table-responsive">
                        <table id="datatable"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               style="width: 100%">
                            <thead class="thead-light">
                            <tr>
                                <th>{{trans('messages.SL#')}}</th>
                                <th>{{trans('messages.Name')}}</th>
                                <th>{{trans('messages.Email')}}</th>
                                <th>{{trans('messages.Phone')}}</th>
                                <th>{{trans('messages.City')}}</th>
                                <th>Profession</th>
                                <th style="width: 50px">{{trans('messages.Status')}}</th>
                                <th style="width: 50px">{{trans('messages.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($service_providers as $key=>$k )
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td class="text-capitalize">{{$k->name}}</td>
                                    <td >{{$k->email}}</td>
                                    <td>{{$k->phone}}</td>
                                    <td>
                                        <?php $city = DB::table('cities')->where('id', $k->city)->get(); 
                                        foreach($city as $i){
                                        echo $i->city;
                                        }  ?>
                                        </td>
                                    <td>
                                        <?php $profession = DB::table('profession')->where('id', $k->profession)->get(); 
                                        foreach($profession as $l){
                                        echo $l->profession;
                                        }  ?></td>
                                    <td>
                                        @if($k->status == 1)
                                        <form action="{{url('admin/sp_status/0')}}" method="post" >
                                            @csrf
                                            <input type="hidden" name="id" value="{{$k->id}}" >
                                        <button type="submit" class="btn btn-info btn-sm">
                                           Approved
                                        </button>
                                        </form>
                                        @else
                                        <form action="{{url('admin/sp_status/1')}}" method="post" >
                                            @csrf
                                            <input type="hidden" name="id" value="{{$k->id}}" >
                                        <button type="submit" class="btn btn-warning btn-sm">
                                           Approve
                                        </button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/sp_delete/'.$k->id)}}" class="btn btn-danger btn-sm">
                                           Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--@push('script')-->
    <!-- Page level plugins -->
<!--    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/jquery.dataTables.min.js"></script>-->
<!--    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>-->
    <!-- Page level custom scripts -->
<!--    <script>-->
        <!--// Call the dataTables jQuery plugin-->
<!--        $(document).ready(function () {-->
<!--            $('#dataTable').DataTable();-->
<!--        });-->
<!--    </script>-->
<!--@endpush-->
