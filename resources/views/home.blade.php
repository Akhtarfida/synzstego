@extends('layouts.admin')

@include('admin.includes.userdetails')


@section('content')

    

                        <div class="col-md-10 py-4 mb-4" ></div>


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 col-md-12">
            <div class="card ">
                <h4> <div class="card-header text-uppercase">How to? </div></h4>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
                   
                    
                    <div class="justify-content-end text-muted font-weight-50 " id="myNavbar">
                    <ul class="navbar-nav"> 
                        <li class="nav-item text-center">        
                            <a href="#" class="nav-link m-2 menu-item ">
                            <i class="fas fa-question-circle fa-lg fa-4x mr-3"></i>
                            </a>
                        </li> 
                        
                        <li class="nav-item text-uppercase p m-2">        
                            
                            <i class="fas fa-info fa-lg fa-2x mr-3 text-primary"></i>
                                To hide message into an image, 
                            
                        </li>  

                        
                        <li class="nav-item text-center">        
                            
                            <i class="fas fa-arrow-right fa-lg mt-3 text-primary p"></i>
                                1st, Click hide data, Choose an image you want to use
                        </li>  

                        <li class="nav-item text-center">        
                            
                            <i class="fas fa-arrow-right fa-lg mt-3 text-primary p"></i>
                                2nd, Type any secret message and encryption key.
                        </li>  

                        <li class="nav-item text-center">        
                        
                            <i class="fas fa-arrow-right fa-lg mt-3 text-primary p"></i>
                                3rd, Press hide button.
                        </li>  

                        <li class="nav-item text-center">        
                        
                            <i class="fas fa-arrow-right fa-lg mt-3 text-primary p"></i>
                                To download images click My Images.
                        </li>  

                        <li class="nav-item text-uppercase p py-4   ">        
                            
                            <i class="fas fa-info fa-lg fa-2x mr-3 text-primary"></i>
                                To extract message from an image, 
                            
                        </li>  

                        <li class="nav-item text-center">        
                        
                            <i class="fas fa-arrow-right fa-lg mt-3 text-primary p"></i>
                                1st, Click Extract Data. Type Encryption Key
                        </li>  

                        <li class="nav-item text-center">        
                        
                            <i class="fas fa-arrow-right fa-lg mt-3 text-primary p"></i>
                                2nd, Press Extract Button
                        </li>  

                        <li class="nav-item text-uppercase p py-4   ">        
                            
                            <i class="fas fa-info fa-lg fa-2x mr-3 text-primary"></i>
                                Add watermark to images, 
                            
                        </li>  

                        <li class="nav-item text-center">        
                        
                            <i class="fas fa-arrow-right fa-lg mt-3 text-primary p"></i>
                                1st, Choose image or images to be watermarked
                        </li>  

                        <li class="nav-item text-center">        
                        
                            <i class="fas fa-arrow-right fa-lg mt-3 text-primary p"></i>
                                2nd, Select watermark position from given options
                        </li>  

                        <li class="nav-item text-center">        
                        
                            <i class="fas fa-arrow-right fa-lg mt-3 text-primary p"></i>
                                3rd, Choose/upload logo and press preview button
                        </li>  

                        <li class="nav-item text-uppercase p py-4   ">        
                            
                            <i class="fas fa-info fa-lg fa-2x mr-3 text-primary"></i>
                                Goto 'My Images' link to download desired images 
                            
                        </li>  

                        <li class="nav-item text-uppercase p py-4   ">        
                            
                            <i class="fas fa-info fa-lg fa-2x mr-3 text-primary"></i>
                                Goto 'Download' link to download steganography Software
                            
                        </li> 
                        
                    </ul>                         
                
                </div>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
