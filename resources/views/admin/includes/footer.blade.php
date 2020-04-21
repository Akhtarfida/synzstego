  <!-- footer -->
  <div class="container-fluid">
    <div class="row mt-5 py-5">
    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
      <div class="row border-top pt-3 bg-transparent">
      <div class="col-lg-6 text-center">
          <ul>
    <li class="list-inline-item mr-2">
            <a href="" class="text-dark">Synzstego</a>
          </li>
          <li class="list-inline-item mr-2">
            <a href="" class="text-dark">About</a>
          </li>
          <li class="list-inline-item mr-2">
            <a href="" class="text-dark">Guide</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-6 text-center">
        <p>&copy; 2020 Copyright. Made with <i class="fas fa-heart text-danger"> </i> by
        <span class="text-success">Me</span></p>
      </div>
    </div>
  </div>
  </div>
</div>
<!-- End of Footer  -->

<!-- Scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
<script src="{{asset('js/scripts.js')}}"></script>
<!-- <script src="{{asset('js/script2.js')}}"></script> -->
<script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<script>
@if(Session::has('success'))
toastr.success("{{ Session::get('success') }}")
@endif

@if(Session::has('info'))
toastr.info("{{ Session::get('info') }}")
@endif
</script>

@yield('scripts')

</body>
</html>
