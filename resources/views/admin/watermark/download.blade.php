
@extends('layouts.admin')

@include('admin.includes.userdetails')

@section('content')





    <?php
    function make_slide_indicators($data){

        $output = "";
        $count = 0;


        foreach($data as $d)
        {
            if($count==0){

                $output.='
                        <li data-target="#carouselExampleIndicators" data-slide-to="'.
                    $count.'" class="active"> </li>
                        ';
            }
            else{
                $output.='
                        <li data-target="#carouselExampleIndicators" data-slide-to="'.
                    $count.'" class="active"> </li>
                        ';
            }
            $count = $count + 1;

        }

        return $output;

    }



    function make_slides($data){
        $output = '';
        $count = 0;


        foreach($data as $d){


            if($count==0){
                $output.='<div class="carousel-item active">';



            }
            else{
                $output.='<div class="carousel-item">';
            }

            $output.= '

                        <img src="'.asset($d->name).'" alt="Failed to load pic" class="d-block w-100"/>

                        <div class="carousel-caption">
                         <h4> <a href="'. route('watermark.download', $d->id).'" class="nav-link text-white">'.$d->title.' </a></h4>
                         </div>
</div>
                    ';

            $count+=1;
        }

        return $output;
    }


    ?>

    
                    <h3 class="text-white text-center mb-3 py-4 mt-5 text-dark font-weight-bold"></h3>

                    <div class="col-md-10"></div>


                    <div class="container">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">



                        <div id="carouselExampleIndicators" class="carousel slide" data-ride ="carousel" data-interval="false">
                            <ol class="carousel-indicators">
                               <?php echo make_slide_indicators($data) ?>
                            </ol>
                            <div class="carousel-inner">
                             <?php   echo make_slides($data) ?>

                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                    </div>
                </div>
            </div>








                    <div id="page-wrapper">


                            <!-- Page Heading -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <h1 class="page-header mt-4 pt-4">
                                        PHOTOS
                                        <small></small>
                                    </h1>

{{--                                    <p class="bg-success lead"><?= $message; ?></p>--}}


                                        <table class="table table-striped bg-light text-center">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Trash</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($data->count() > 0)
                                            <?php $i = ($data->currentpage()-1)* $data->perpage() + 1;?>
                                            <?php  foreach ($data as $d): ?>

                                            <tr class="text-dark font-weight-bold">

                                                <td><?= $i; ?></td>

                                                <td> <img class="admin-photo-thumbnail" src="{{asset($d->name)}}" alt="" width="150px" height="120px">
                                                    <div class="action_links">
                                                        <a class="download_link" href="{{route('watermark.download', $d->id)}}">Download</a>

                                                    </div>

                                                </td>

                                                <td><?= $d->title; ?></td>
                                                <td>
                                                    <a href="{{ route('image.trash', $d->id) }}" class = "btn btn-secondary">Trash</a>
                                                </td>

                                            <?php $i++ ?>
                                            </tr>

                                            <?php   endforeach;      ?>
                            @else
                                <tr>
                                    <th colspan="5" class="text-center">No Images</th>
                                </tr>
                            @endif

                                            </tbody>
                                        </table>  <!-- End of Table-->

                                        {{ $data->render()}}
                                    </div>



                            </div>
                            <!-- /.row -->


                    </div>
                    <!-- /#page-wrapper -->

</div>
























                </div>
    </div>
    </div>
    </div>
    </div>



@endsection


















