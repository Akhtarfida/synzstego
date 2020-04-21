

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
                                <div class="card-header">Steganography</div>

                        <div class="card-body">
                        <form action="{{ route('stgimg.steganofy') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="file" name="stegimg" required>
                        </div>

                        <br> 

                        

                        <div class="form-group">
                            <label for="enckey">Enter Encryption Key:</label>
                            <input type="password" name="enckey" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Enter Secret Message:</label>
                            <textarea name="secretmessage" class="form-control" id=""  required></textarea>
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" value="Hide" class="btn btn-secondary">
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


