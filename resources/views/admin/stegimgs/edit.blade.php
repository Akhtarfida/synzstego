

@extends('layouts.admin')

@include('admin.includes.userdetails')





@section('content')

    {{--                        <div class="col-lg-5">--}}
    {{--                        <div class="col-lg-5 m-2">--}}
    {{--                            <img src="{{ asset($stegImage->name) }}" alt="Failed to load pic" class="d-block w-100"/>--}}
    {{--                       --}}
    {{--                        </div>--}}
    {{--                        </div>  --}}




                        <h3 class="text-white text-center mb-3 py-4 mt-5 text-dark font-weight-bold"></h3>

                        <div class="col-md-8"></div>


                        <div class="container">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">



                                    <div>
                                        <ol>

                                        </ol>
                                        <div >
                                            <img src="{{ asset($stegImage->name) }}" alt="Failed to load pic" class="d-block w-100"/><br>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>












                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-10">

                                    @include('admin.includes.errors')
                                    
                                    <div class="card">
                                        <div class="card-header">Steganography</div>

                                        <div class="card-body">


                                            <form action="{{ route('stgimg.update', $stegImage->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf



                                                {{-- <div class="form-group">
                                                    <input type="file" name="stegimg" disabled>
                                                </div> --}}

                                                <br>



                                                <div class="form-group">
                                                    <label for="enckey">Encryption Key:</label>
                                                    <input type="password" name="enckey" class="form-control" required
                                                           value="<?= $stegImage->enckey ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="extracted-message">Hidden Message</label>
                                                </div>

                                                <div class="text-center form-group">
                                                    <textarea class="form-control" name="secretmessage" id="" cols="" rows="4"><?= $message ?></textarea>
                                                </div>

                                                <div class="form-group text-center">
                                                    <input type="submit" value="Update" class="btn btn-secondary">
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        



@endsection


