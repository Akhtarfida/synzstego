
@extends('layouts.admin')

@include('admin.includes.userdetails')

@section('content')






    
                        <h3 class="text-muted text-center mb-3 py-4 mt-5"></h3>
                        <table class="table table-light bg-light text-center">
                            <thead>
                            <tr class="text-left">

                                <th class="text-dark font-weight-bold"> <div class="container">Folders </div></th>

                                <th></th>
                                <th></th>
                                <th></th>


                            </tr>
                            </thead>
                            <tbody>



                                    <tr class="text-left">

                                        <th>
                                            <div class="container">
                                                <a href="{{ route('user.watermark.download') }}" style="text-decoration: none;">
                                                    <i class="fas fa-folder fa-2x align-middle" aria-hidden="true"></i>
                                                    <span class="align-middle p-1 text-uppercase">Watermarked Images</span>
                                                </a>
                                            </div>

                                        </th>

                                        <td>

                                        </td>

                                        <td>

                                        </td>

                                        <td>

                                        </td>

                                    </tr>


                                <tr class="text-muted text-left">
                                    <th>
                                        <div class="container">
                                            <a href="{{ route('stegimgs.view.downloads') }}" style="text-decoration: none;">
                                                <i class="fas fa-folder fa-2x align-middle" aria-hidden="true"></i>
                                                <span class="align-middle p-1 text-uppercase">Images with data</span>
                                            </a>
                                        </div>

                                    </th>

                                    <td>

                                    </td>

                                    <td>

                                    </td>

                                    <td>

                                    </td>

                                </tr>

                            </tbody>
                        </table>



@endsection


















