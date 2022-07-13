@extends('layouts.back-end.app')
@section('title','City List')
@push('css_or_js')
    <!-- Custom styles for this page -->
    <link href="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('messages.Dashboard')}}</a></li>
            <li class="breadcrumb-item" aria-current="page">Directory</li>
            <li class="breadcrumb-item" aria-current="page">City</li>
        </ol>
    </nav>


    <!-- Content Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Enter City
                </div>
                <div class="card-body">
                    <form action="{{url('admin/insert_city')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name">City</label>
                                    <input type="text" name="city" class="form-control" id="name"
                                           placeholder="City"  required>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">{{trans('messages.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
   
     <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Enter Profession
                </div>
                <div class="card-body">
                    <form action="{{url('admin/insert_profession')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name">Profession</label>
                                    <input type="text" name="profession" class="form-control" id="name"
                                           placeholder="Profession"  required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{trans('messages.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="row ml-2" >
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Cities Table</h5>
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
                                <th>SL</th>
                                <th>{{trans('messages.Name')}}</th>
                                <th style="width: 50px">{{trans('messages.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($cities as $k=>$e)
                                <tr>
                                    <th scope="row">{{$k+1}}</th>
                                    <td class="text-capitalize">{{$e->city}}</td>
                                    <td>
                                        <a href="{{url('admin/delete_city/'.$e->id)}}"
                                           class="btn btn-danger btn-sm">
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
   
      <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Profession Table</h5>
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
                                <th>SL</th>
                                <th>{{trans('messages.Name')}}</th>
                                <th style="width: 50px">{{trans('messages.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($profession as $k=>$e)
                                <tr>
                                    <th scope="row">{{$k+1}}</th>
                                    <td class="text-capitalize">{{$e->profession}}</td>
                                    <td>
                                        <a href="{{url('admin/delete_profession/'.$e->id)}}"
                                           class="btn btn-danger btn-sm">
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
