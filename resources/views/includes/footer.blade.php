

<footer class="bg-dark px-5">
  <div class="container-fluid">
    <div class="row text-light py-4">
      <div class="col-lg-5 col-sm-6">
        <h5 class="pb-3">About Us</h5>
        <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam nobis dicta molestiae id laboriosam natus repudiandae, ducimus illum veritatis perspiciatis possimus, at facere debitis accusantium?</p>
      </div>
      <div class="col-lg-3 col-sm-6">
        <h5 class="pb-3">Visit Us</h5>

        <ul class="list-unstyled">
          @if (Route::has('login'))
          @auth
          <li>
            <a href="{{ url('/home') }}" class="footer-link">Dashboard</a>
          </li>


          @else
              <li>
                <a href="#" class="footer-link">Sign in</a>
              </li>

              @if(Route::has('register'))
              <li>
                <a href="#" class="footer-link">Join us</a>
              </li>
              @endif

            @endauth
          @endif
          <li>
            <a href="#" class="footer-link">Watermark</a>
          </li>
          <li>
            <a href="#" class="footer-link">Steganography</a>
          </li>
          <li>
            <a href="#" class="footer-link">Download</a>
          </li>


        </ul>
      </div>

      <div class="col-lg-4 col-sm-6">
        <h5 class="pb-3">Stay Connected</h5>
        <p class="small">Feel free to contact me professionally.</p>

        <ul class="list-inline">
          <li><a href="#" class="text-info">akhtarm821@gmail.com</a></li>
          <li class="list-inline-item"><i class="fab fa-facebook-square fa-2x text-primary"></i></li>
          <li class="list-inline-item"><i class="fab fa-google-plus fa-2x text-danger"></i></li>
          <li class="list-inline-item"><i class="fab fa-instagram fa-2x text-danger"></i></li>
          <li class="list-inline-item"><i class="fab fa-twitter fa-2x text-info"></i></li>
          <li class="list-inline-item"><i class="fab fa-youtube fa-2x text-danger"></i></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col text-center text-light border-top pt-3">
        <p>&copy; 2020 Copyright, All Rights Reserved</p>
      </div>
    </div>
  </div>
</footer>

<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="{{asset('homepage/script.js')}}"></script>

</body>
</html>
