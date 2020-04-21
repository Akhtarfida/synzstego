

	@include('admin.includes.head')

  <body style="background:lightgray">
  
	<!-- navbar -->
	
    <nav class="navbar navbar-expand-md navbar-light">
    	<button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
    		<span class="navbar-toggler-icon"></span>
    	</button>
    	<div class="collapse navbar-collapse" id="myNavbar">
    		 <div class="container-fluid">
    		 	<div class="row">
						 
						<!--Sidebar  -->
							@include('admin.includes.sidenavbar')
    		 		<!-- End of Sidebar -->

						 
						<!-- Top Navbar -->
							@include('admin.includes.topnavbar')
    		 		<!-- End of Top Navbar -->
					 
					</div>
    		 </div>
    	</div>

    </nav>
  <!-- end of navbar -->

	{{-- Modal --}}
	@include('admin.includes.modal')
	{{-- End of Modal --}}
  

  <!-- Cards -->
  <section>
		<div class="container-fluid">
			<div class="row mb-5">
				<div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
					<div class="row align-items-center justify-content-center">
						<div class="col-xl-9 col-12 mb-4 mb-4 mb-xl-0">
							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</div>
  </section>



@include('admin.includes.footer')