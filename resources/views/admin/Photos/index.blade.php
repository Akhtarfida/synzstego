
@extends('layouts.admin')

@include('admin.includes.userdetails')

@section('content')






    <div class="container-fluid">


        <div class="row mb-5">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">

                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9 col-12 mb-4 mb-4 mb-xl-0">
                        <h3 class="text-white text-center mb-3 py-4 mt-5 text-dark font-weight-bold">Click picture name to download it </h3>

                        <div class="col-md-8"></div>





                        <div id="page-wrapper">

                            <div class="container-fluid">

                                <!-- Page Heading -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="page-header mt-4 pt-4">
                                            PHOTOS
                                            <small></small>
                                        </h1>

                                        {{--                                    <p class="bg-success lead"><?= $message; ?></p>--}}
                                        <div class="col-md-12" >

                                            <table class="table table-striped bg-light text-center">
                                                <thead>
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>Photo</th>
                                                    <th>Title</th>
                                                    <th>Size</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php $i = ($data->currentpage()-1)* $data->perpage() + 1;?>
                                                <?php  foreach ($data as $d): ?>

                                                <tr class="text-dark font-weight-bold">

                                                    <td><?= $i; ?></td>

                                                    <td><img class="admin-photo-thumbnail" src="{{asset($d->name)}}" alt="" width="150px" height="120px">

                                                        <div class="action_links">
                                                            <a class="download_link" href="{{route('watermark.download', $d->id)}}">Download</a>

                                                        </div>

                                                    </td>

                                                    <td><?= $d->title; ?></td>
                                                    {{--                                                <td><?= $d->size; ?></td>--}}

                                                    <?php $i++ ?>
                                                </tr>

                                                <?php   endforeach;      ?>

                                                </tbody>
                                            </table>  <!-- End of Table-->

                                            {{ $data->render()}}
                                        </div>


                                    </div>

                                </div>
                                <!-- /.row -->



                            </div>
                            <!-- /.container-fluid -->

                        </div>
                        <!-- /#page-wrapper -->












                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


















