
@extends('layouts.admin')

@include('admin.includes.userdetails')

@section('content')



                        <h3 class="text-muted text-center mb-3 py-4 mt-5">Trashed Users</h3>
                        <table class="table table-striped bg-light text-center">
                            <thead>
                            <tr class="text-muted">
                                <th>Image</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Restore</th>
                                <th>Destroy</th>

                            </tr>
                            </thead>
                            <tbody>

                            @if($users->count() > 0)
                                @foreach($users as $user)



                                    <tr class="text-dark font-weight-bold">

                                        <td>

                                            <img src="{{ asset($user->profile->avatar) }}" width="60px" height="60px" style="border-radius: 50%" class="link-image js-zoom-image">

                                        </td>

                                        <td>
                                            {{$user->name}}
                                        </td>

                                        <td>
                                            @if($user->admin)
                                                <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-danger btn-xs"> Remove</a>
                                            @else

                                                <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-success btn-xs">Make Admin</a>

                                            @endif
                                        </td>

                                        <td>
                                            @if(Auth::user()->id !== $user->id)
                                                <a href="{{ route('user.restore', ['id' => $user->id]) }}" class="btn btn-success btn-xs">Restore</a>

                                            @endif
                                        </td>

                                        <td>
                                            @if(Auth::user()->id !== $user->id)
                                                <a href="{{ route('user.kill', ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Delete</a>

                                            @endif
                                        </td>

                                    </tr>

                                @endforeach

                            @else
                                <tr>
                                    <th colspan="5" class="text-center">No user</th>
                                </tr>
                            @endif

                            </tbody>
                        </table>
       
@stop