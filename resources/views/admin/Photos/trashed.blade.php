@extends('layouts.admin')

@include('admin.includes.userdetails')

@section('content')



                        <h3 class="text-muted text-center mb-3 py-4 mt-5">Trashed Images</h3>
                        <table class="table table-striped bg-light text-center">
                            <thead>
                            <tr class="text-muted">
                                <th>Sr.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Restore</th>
                                <th>Destroy</th>



                            </tr>
                            </thead>
                            <tbody>

                            @if($images->count() > 0)

                                <?php $i = ($images->currentpage()-1)* $images->perpage() + 1;?>

                                @foreach($images as $image)



                                    <tr class="text-dark font-weight-bold">

                                        <td><?= $i; ?></td>

                                        <td>

                                            <img src="{{ asset($image->name) }}" width="150px" height="100px" class="link-image js-zoom-image">

                                        </td>

                                        <td>
                                            {{$image->title}}
                                        </td>


                                        <td>

                                                <a href="{{ route('image.restore', ['id' => $image->id]) }}" class="btn btn-success btn-xs">Restore</a>


                                        </td>

                                        <td>
                                                <a href="{{ route('image.kill', ['id' => $image->id]) }}" class="btn btn-danger btn-xs">Delete</a>


                                        </td>

                                        <?php $i++ ?>

                                    </tr>

                                @endforeach

                            @else
                                <tr>
                                    <th colspan="5" class="text-center">No Images</th>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                    
@stop