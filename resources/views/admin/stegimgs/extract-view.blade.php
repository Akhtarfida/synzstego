@extends('layouts.admin')

@include('admin.includes.userdetails')

@section('content')



         <h3 class="text-white text-center mb-3 py-4 mt-5 text-dark font-weight-bold"></h3>

                        <div class="col-md-8"></div>




                        <div id="page-wrapper">


           @if(session()->has('message'))

             <form action="{{ route('download.text.file') }}" method="post">
                 @csrf

                 <div class="form-group text-muted text-center">
                <label for="extracted-message">Extracted Message</label>
            </div>

            @if(session('message'))
            <div class="text-center form-group">
            <textarea class="form-control" name="secmessage" id="" cols="" rows="4"><?= session()->get('message') ?></textarea>
            
            </div>
            <div class="form-group text-muted text-center">
                <button class="btn btn-success" type="submit">Save As Text File</button>
            </div>
            @else
                <div class="alert alert-danger">
                    <ul class="list-group">
                        <li class="list-group-item">Incorrect Encryption Key!!!</li>
                    </ul>
                </div>
            @endif

           

             </form>

            @endif

            <table class="table table-striped bg-light text-center">
                <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Encryption Key</th>
                    <th>Extract</th>
                    
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
                    <form action="{{ route('stegimg.extract.data') }}" method="post">
                        @csrf
                    <input type="text" name="id" hidden value="<?= $d->id ?>">
                    <td><input type="password" class="form-control" name="enckey"></td>
                    <td><input type="submit" value="Extract" class="btn btn-primary btn-sm"></td>
                    </form>

                    <?php $i++ ?>
                </tr>

                <?php   endforeach;      ?>
                @else
                                <tr>
                                    <th colspan="6" class="text-center">No Images</th>
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


@endsection



