<!DOCTYPE html>
<html lang="en">
  <head>

  <style>
 
@import url("https://fonts.googleapis.com/css?family=Poppins:400,600,700");
@import url("https://fonts.googleapis.com/css?family=Courgette");
.bg-mattBlackLight {
  background-color: #303337;
}

.text-mattBlackLight {
  color: #303337;
}

.bg-mattBlackDark, body, .nav-link:hover, .nav-link.active {
  background-color: #212121;
}

.text-mattBlackDark {
  color: #212121;
}

.bg-mattGray {
  background-color: #878d8d;
}

.text-mattGray, body, .nav-link .icon, .nav-link .text {
  color: #878d8d;
}

.bg-mattRed {
  background-color: #ec6271;
}

.text-mattRed, .nav-link:hover .icon,
.nav-link:hover .text, .nav-link.active .icon,
.nav-link.active .text {
  color: #ec6271;
}

* {
  font-family: 'Poppins', sans-serif;
}

body {
  height: 1000px;
}

.wrapper {
  margin-top: 3.5rem;
}

.wrapper .sideMenu {
  position: fixed;
  top: 0;
  bottom: 0;
  margin: 3.5rem auto auto;
  left: 0;
  width: 12.5rem;
  -webkit-transition: all ease 0.25s;
  transition: all ease 0.25s;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
  z-index: 2000;
}

.wrapper .content {
  width: 100%;
  margin-left: 0rem;
  -webkit-transition: all ease 0.25s;
  transition: all ease 0.25s;
}

.wrapper.active .sideMenu {
  -webkit-transform: translateX(0);
          transform: translateX(0);
}

.nav-link {
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  display: block;
  white-space: nowrap;
}

.nav-link .icon {
  margin-right: 0.25rem;
  font-size: 1.875rem;
  vertical-align: middle;
  height: 2rem;
  width: 2rem;
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.nav-link .text {
  font-size: 0.875rem;
}

@media (min-width: 992px) {
  .wrapper .sideMenu {
    -webkit-transform: translateX(0);
            transform: translateX(0);
  }
  .wrapper .content {
    margin-left: 12.5rem;
  }
  .wrapper.active .sideMenu {
    width: 5rem;
  }
  .wrapper.active .sideMenu .nav-link {
    text-align: center;
  }
  .wrapper.active .sideMenu .nav-link .icon {
    margin-right: 0;
  }
  .wrapper.active .sideMenu .nav-link .text {
    display: none;
  }
  .wrapper.active .content {
    margin-left: 5rem;
  }
}
/*# sourceMappingURL=style.css.map */
{
    "version": 3,
    "mappings": "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",
    "sources": [
        "../scss/style.scss"
    ],
    "names": [],
    "file": "style.css"
}
  </style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>FrontendFunn -</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y="
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
      integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body style="background-color: #fff;">
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight fixed-top"
    >
      <button class="navbar-toggler sideMenuToggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="#">Hi, {{ Auth::user()->name }}</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle p-0"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="material-icons icon">
                person
              </i>
              <span style="font-size: 16px;" class="text">Account</span>
            </a>
            <div
              class="dropdown-menu dropdown-menu-right"
              aria-labelledby="navbarDropdown"
            >
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="text-bg-primary" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"  style="font-size:18px"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout  </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="wrapper d-flex">
      <div class="sideMenu bg-mattBlackLight">
        <div class="sidebar">
          <ul class="navbar-nav">
            <li  style="margin-top: 20px; font-size: 20px;"class="nav-item">
              <a href="{{ route('user.dashboard') }}" class="nav-link px-2">
                <i  style="color:white" class="fa fa-home fa-fw">
                Dashboard
                </i>
                <span class="text"></span>
              </a>
            </li>
          
            
            
          </ul>
        </div>
      </div>
      <div class="content">
        <main>
          <div class="container-fluid">
          @yield('content')
          </div>
        </main>
      </div>
    </div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
      integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"
      integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI="
      crossorigin="anonymous"
    ></script>
    <script src="./js/script.js"></script>
    <script>
    $(document).ready(function() {
  $('.sideMenuToggler').on('click', function() {
    $('.wrapper').toggleClass('active');
  });

  var adjustSidebar = function() {
    $('.sidebar').slimScroll({
      height: document.documentElement.clientHeight - $('.navbar').outerHeight()
    });
  };

  adjustSidebar();
  $(window).resize(function() {
    adjustSidebar();
  });
});

    </script>
  </body>
</html>
