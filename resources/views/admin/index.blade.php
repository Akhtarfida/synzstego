
@extends('layouts.admin')

@include('admin.includes.userdetails')

@section('content')


    
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row pt-md-5 mt-md-3 mb-5">

                

                    <div class="col-xl-4 col-sm-6 p-2">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-images fa-3x text-warning"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Total Images</h5>
                                        <h3>23</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <i class="fas fa-sync mr-3"></i>
                                <span>Updated Now</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6 p-2">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-users fa-3x text-info"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Total Users</h5>
                                        <h3>{{  count(App\User::all())   }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <i class="fas fa-sync mr-3"></i>
                                <span>Updated Now</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6 p-2">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-chart-line fa-3x text-danger"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Visitors</h5>
                                        <h3>21</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <i class="fas fa-sync mr-3"></i>
                                <span>Updated Now</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
  

    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif



@endsection

