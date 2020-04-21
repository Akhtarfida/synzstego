@extends('layouts.admin')

@include('admin.includes.userdetails')



@section('content')


                        <h3 class="text-muted text-center mb-3 py-4 mt-5">Edit your profile</h3>

                            <div class="col-md-5"></div>

                            @include('admin.includes.errors')


                                <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="form-group p-lg-2" >
                                        <h5><label for="name" class="text-weight-bold">Username</label></h5>
                                        <input type="text" name="name" class="form-control search-input" value="{{ $user->name }}">
                                    </div>

                                    <div class="form-group p-lg-2">
                                        <h5><label for="name" class="text-weight-bold">Email</label></h5>
                                        <input type="email" name="email" class="form-control search-input" value="{{ $user->email }}">
                                    </div>

                                    <div class="form-group p-lg-2">
                                        <h5><label for="name" class="text-weight-bold">New Password</label></h5>
                                        <input type="password" name="password" class="form-control search-input">
                                    </div>

                                    <div class="form-group p-lg-2">
                                        <h5><label for="name" class="text-weight-bold">Upload new avatar</label></h5>
                                        <input type="file" name="avatar" class="form-control search-input">
                                    </div>

                                    <div class="form-group">
                                        <div class="text-center">
                                            <input class="btn btn-success" type="submit" value="Update profile">


                                        </div>
                                    </div>

                                </form>
               
    @endsection