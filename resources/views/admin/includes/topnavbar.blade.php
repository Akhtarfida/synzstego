<div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
  <div class="row allign-items-center">
    <div class="col-md-4">
      <h4 class="text-light text-uppercase mb-0 py-2">Dashboard</h4>
    </div>
    <div class="col-md-5">
      <form action="/results" method="GET">
        <div class="input-group">
          <input name="query" class="form-control search-input text-light" placeholder="Search...." />
          <button type="submit" class="btn btn-white search-button">
            <i class="fas fa-search text-danger"></i>
          </button>
        </div>
      </form>
    </div>
    <div class="col-md-3">
      <ul class="navbar-nav">



        <li class="nav-item ml-md-auto">
          <a href="#" class="nav-link text-danger" data-toggle="modal" data-target="#sign-out">
            <i class="fas fa-sign-out-alt text-danger fa-lg"></i>
            Logout
          </a>
        </li>

      </ul>
    </div>
  </div>
</div>