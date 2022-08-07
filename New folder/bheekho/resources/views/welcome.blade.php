<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap Responsive Onepage HTML Template">
    <meta name="author" content="">
    <!--title-->
    <title>Bheekho Foundation | Home</title>
    
    <!--CSS-->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
     
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">  
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">  
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link id="css-preset" href="{{asset('css/presets/preset1.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">   
    
    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,700,800,100,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,900' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/ico/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('images/ico/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/ico/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/ico/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/ico/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/ico/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/ico/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/ico/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/ico/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('images/ico/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/ico/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/ico/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/ico/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/ico/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('images/ico/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
</head><!--/head-->
<body>
    <!-- Page Loader 
    <div class="preloader">
        <div id="loaderImage"></div>
    </div>-->
    <header id="navigation">
        <div class="navbar main-nav" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        <h1><img class="img-responsive" src="{{asset('images/bheekho-foundation.png')}}" alt="logo"></h1>
                    </a>                    
                </div>  
                <div class="top-bar">   
                    <span class="contact-mail"><a href="#"><i class="fa fa-envelope-o"></i>contact@bheekhofoundation.com</a></span>
                    <span><i class="fa fa-phone"></i> +91 8987425586</span>
                    <span><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login </a></span>
                </div>
                <nav class="collapse navbar-collapse navbar-right">                 
                    <ul class="nav navbar-nav">
                        
                    </ul>                   
                </nav>
            </div>
        </div>
    </header><!--/#navigation--> 
    
    <div id="carousel-wrapper">
        <div id="main-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#main-carousel" data-slide-to="1"></li>
                <li data-target="#main-carousel" data-slide-to="2"></li>
                <li data-target="#main-carousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/home/1.jpg)">
                    <div class="carousel-caption container">
                        <h1 class="animated rollIn">Bheekho Foundation</h1>
                        <p class="animated rollIn">One person can make a difference, and Everyone should try.<br/>- John Fitzgerald Kennedy</p>
                        <a href="{{ route('login') }}" class="pull-right btn btn-primary" target="_blank">I want to Get Help</a>
                        <br><a href="{{ route('login') }}" id="tohash" class="animated rollIn btn btn-primary" target="_blank">Join as Social Revolutionaries</a>
                        
                        
                    </div>                  
                </div>
                <div class="item" style="background-image: url(images/home/2.jpg)">
                    <div class="carousel-caption container">
                        <h1 class="animated rollIn">Bheekho Foundation</h1>
                        <p class="animated rollIn">It is one of the most beautiful compensations of this life that you cannot sincerely try to help another without helping yourself. – Ralph Waldo Emerson</p>
                        <a href="{{ route('login') }}" class="pull-right btn btn-primary" target="_blank">I want to Get Help</a>
                        <br><a href="{{ route('login') }}" id="tohash" class="animated rollIn btn btn-primary" target="_blank">Join as Social Revolutionaries</a>
                    </div>
                </div>
                <div class="item" style="background-image: url(images/home/3.jpg)">
                    <div class="carousel-caption container">
                        <h1 class="animated rollIn">Bheekho Foundation</h1>
                        <p class="animated rollIn">There is no greater joy nor greater reward than to make a fundamental difference in someone’s life. – Mary Rose McGeady</p>
                        <a href="{{ route('login') }}" class="pull-right btn btn-primary" target="_blank">I want to Get Help</a>
                        <br><a href="{{ route('login') }}" id="tohash" class="animated rollIn btn btn-primary" target="_blank">Join as Social Revolutionaries</a>
                    </div>
                </div>
                <div class="item" style="background-image: url(images/home/4.jpg)">
                    <div class="carousel-caption container">
                        <h1 class="animated rollIn">Bheekho Foundation</h1>
                        <p class="animated rollIn">Vestibulum vitae urna quis eros convallis hendrerit. Sed magna magna, congue vel dapibus a, sagittis in enim.</p>
                        <a href="{{ route('login') }}" class="pull-right btn btn-primary" target="_blank">I want to Get Help</a>
                        <br><a href="{{ route('login') }}" id="tohash" class="animated rollIn btn btn-primary" target="_blank">Join as Social Revolutionaries</a>
                    </div>
                </div>
            </div>  
        </div> <!--/#main-carousel--> 
    </div><!--/#carousel-wrapper--> 
    
    <div id="who-we-are">
        <div class="container">
            <!--/.call to action-->
            <div class="text-center who-we-are padding-bottom padding-top">
                <div class="row">
                    <div class="col-sm-4">
                        <img class="img-responsive" src="{{asset('images/about/1.png')}}" alt="" />
                        <h2>Our World</h2>
                        <p class="lead">We are in 32 Countries</p>
                    </div>
                    <div class="col-sm-4">
                        <img class="img-responsive" src="{{asset('images/about/2.png')}}" alt="" />
                        <h2>Our Promise</h2>
                        <p class="lead">59% Of all $ goes to Programs</p>
                    </div>
                    <div class="col-sm-4">
                        <img class="img-responsive" src="{{asset('images/about/3.png')}}" alt="" />
                        <h2>Our Reach</h2>
                        <p class="lead">1198 Million Member</p>
                    </div>                  
                </div>
            </div>
            <div class="our-details-tab padding-bottom">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div id="about-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="img-responsive" src="{{asset('images/about/p1.jpg')}}" alt="" />
                                </div>
                                <div class="item">
                                    <img class="img-responsive" src="{{asset('images/about/p2.jpg')}}" alt="" />
                                </div>
                                <div class="item">
                                    <img class="img-responsive" src="{{asset('images/about/p3.jpg')}}" alt="" />
                                </div>
                            </div>
                        </div><!--/#about-carousel--> 
                    </div>
                    <div class="col-sm-12 col-md-6 tab-section">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="active"><a href="#story" role="tab" data-toggle="tab">About Us</a></li>
                            <li><a href="#mission" role="tab" data-toggle="tab">Mission</a></li>
                            <li><a href="#activity" role="tab" data-toggle="tab">Our Activity</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="story">
                                
                                <p>Lets Connect with each other to redefined the social cause and help who needs us! This platform to connect with social revolutionaries for Investigation, Treatment, and Material aid of the economically, physically, mentally, or socially disadvantaged.</p> <p>We believe kindness is powerful and that by leveraging today's technology.</p>
                            </div>
                            <div class="tab-pane fade " id="mission">                               
                                <p>The vision and mission of Bheekho foundation guide us towards our goal of overcoming poverty, and ensuring a life of dignity and security for the marginalized populations. We focus on women and girls to enable them to realise their rigths, avail resources and opportunities, fight social injustice, develop leadership capabilities and build a better future for themselves.</p>
                                <p>To work for the cause and care of disadvantaged older persons and to improve their quality of life.</p>
                            </div>
                            <div class="tab-pane fade " id="activity">                              
                                <p>We do campaign on child and their rights. we are creating awareness and campaign about women empowerment, Right to Information and other activities and schemes. </p> <p>Also we recently started creating  awareness campaigns for livelihood, health and education and food activities.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#who-we-are--> 
    
    <!--/#our-member--> 
    
    <div id="photo-gallery" class="padding-bottom-two">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/1.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Education For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/2.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Education For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/3.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Education For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/4.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Education For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/5.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Education For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/6.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Education For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/7.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Toy For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/8.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>House For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/9.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Education For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/10.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Medical For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/11.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Education For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2">
                    <div class="single-photo">
                        <div class="gallery-content">
                            <img class="img-responsive" src="{{asset('images/gallery/12.jpg')}}" alt="" />
                            <div class="photo-info">                            
                                <a href="{{asset('images/gallery/full/1.jpg')}}" data-gallery="prettyPhoto"><i class="fa fa-camera"></i></a>
                                <h4>Education For Child</h4>
                                <span>Bheekho Foundation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#Photo-Gallery--> 
    
    
    
    <div id="word-for-humanity" class="padding-top parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1>Some Words For Humanity</h1>
                    <div id="humanity-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-circle" src="{{asset('images/partner/partner1.jpg')}}" alt="" />
                                <p>You must not lose faith in humanity. Humanity is an ocean; if a few drops of the ocean are dirty, the ocean does not become dirty. </p>
                                <p class="word-author">Mahatma Gandhi - India</p>
                            </div>
                            <div class="item">
                                <img class="img-responsive img-circle" src="{{asset('images/partner/partner2.jpg')}}" alt="" />
                                <p>To deny people their human rights is to challenge their very humanity.</p>
                                <p class="word-author">Nelson Mandela - Africa</p>
                            </div>
                            <div class="item">
                                <img class="img-responsive img-circle" src="{{asset('images/partner/partner3.jpg')}}" alt="" />
                                <p>Let us sacrifice our today so that our children can have a better tomorrow.</p>
                                <p class="word-author">A.P.J Abdul Kalam - India</p>
                            </div>
                        </div>
                        <ol class="carousel-indicators">
                            <li data-target="#humanity-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#humanity-carousel" data-slide-to="1"></li>
                            <li data-target="#humanity-carousel" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#word-for-humanity-->
    
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <a href=""><img class="img-responsive" src="{{asset('images/bheekho-foundation.png')}}" alt="" /></a>
                </div>
                <div class="col-sm-4">
                    <div class="copyright-text">
                        <p>&copy; copyright 2020 by <a href="#"> Bheekho Foundation.</a> All rights reserved.</p>
                    </div>                  
                </div>
                <div class="col-sm-4">
                    <div class="footer-socials">
                        <ul>
                            <li><a href="https://www.facebook.com/bheekho" target="_blank"><i class="fa fa-facebook" ></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer><!--/#footer--> 
    
    <!--/#scripts--> 
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>  
    <script type="text/javascript" src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/smoothscroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.nav.js')}}"></script>   
    
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script> 
</body>


</html>