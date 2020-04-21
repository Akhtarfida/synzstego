@extends('layouts.admin')

@include('admin.includes.userdetails')





@section('content')

                <h3 class="text-muted text-center mb-3 py-4 mt-5"></h3>

                <div class="col-md-5">

                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            @include('admin.includes.errors')
                            
                            <div class="card">
                                <div class="card-header">Watermark</div>

                                        <div class="card-body">
                                            <form action="{{ route('user.upload.watermark') }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group" >
                                <h5><label for="name" class="text-weight-bold">Upload Images</label></h5>
                                <input type="file" name="images[]" multiple>
                            </div>
                            <br>
                            <div class="form-group">
                                <h5><label for="name" class="text-weight-bold">Choose Watermark Position</label></h5>
                                <select name="wposition" id="" class="form-control">
{{--                                    tl, t, tr, l, m, r, bl, b, br, auto--}}

                                    <option value="m">Center</option>
                                    <option value="auto">Auto</option>
                                    <option value="tl">Top Left</option>
                                    <option value="t">Top</option>
                                    <option value="tr">Top Right</option>
                                    <option value="l">Left</option>
                                    <option value="r">Right</option>
                                    <option value="bl">Bottom Left</option>
                                    <option value="b">Bottom</option>
                                    <option value="br">Bottom Right</option>



                                </select>
                            </div>
                            
                            <br>
                            <div class="form-group">
                                <label for="watermarkedimage">Choose watermark</label>
                            </div>

                            <div class="form-group">
                                <input type="file" name="watermarkedlogo" id="watermarkedlogo">
                            </div>
                            
                            <div class="form-group">
                                <div class="text-center">
                                    <input class="btn btn-success" type="submit" value="Preview" name="preview">


                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
                    </div>
                </div>

           



@endsection