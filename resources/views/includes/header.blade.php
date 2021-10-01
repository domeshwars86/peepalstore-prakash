  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{URL::to('/')}}">
            <span>
              Peepal
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/')}}">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('all_list')}}"> Watches </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{route('about_us')}}"> About <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
              </li>
            </ul>
            <div class="user_option-box">
               <div class="form-outline">
                    <input type="search" id="form1" class="form-control" />
                  </div>
               <a type="button" class="btn btn-lg btn-warning">
                <div class="input-group">
                  </button>
                </div>
                <i class="fa fa-search" aria-hidden="true">Search</i>
              </a>
              <a type="button" class="btn btn-lg btn-warning" id="login_head_btn">Login</i>
              </a>
               <a type="button" class="btn btn-lg btn-warning">
                <i class="fa fa-cart-plus" aria-hidden="true">Cart</i>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>
<script type="text/javascript">
  $(document).ready( () => {
    $('#login_head_btn').click( () => {
      alert('login_head_btn clicked');
      $('#myModal').modal({backdrop:'static',keyboard:false});
    });
  });
</script>