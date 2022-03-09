<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>{{ __('E-commerce | Home') }}</title>
    {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('AdminAsset/plugins/images/favicon.png') }}">
    
    <!-- Font awesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.simpleLens.css') }}">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nouislider.css') }}">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('css/theme-color/default-theme.css') }}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{ asset('css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>{{ __('Loading') }}</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                @if(session('language') && session('language') == 'es')
                  <?php $spanish = true; ?>
                @else
                  <?php $spanish = false; ?>
                @endif
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      @if($spanish)
                        <img src="{{ asset('img/flag/french.jpg') }}" alt="english flag">
                        {{ __('SPANISH') }}
                      @else
                        <img src="{{ asset('img/flag/english.jpg') }}" alt="english flag">
                        {{ __('ENGLISH') }} 
                      @endif
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="{{ route('set_lang', ['es']) }}"><img src="{{ asset('img/flag/french.jpg') }}" alt="">{{ __('SPANISH') }}</a></li>
                      <li><a href="{{ route('set_lang', ['en']) }}"><img src="{{ asset('img/flag/english.jpg') }}" alt="">{{ __('ENGLISH') }}</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="{{ route('my_account') }}">{{ __('My Account') }}</a></li>
                  <li class="hidden-xs"><a href="{{ route('wishlist') }}">{{ __('Wishlist') }}</a></li>
                  <li class="hidden-xs"><a href="{{ route('cart') }}">{{ __('My Cart') }}</a></li>
                  <li class="hidden-xs"><a href="{{ route('checkout') }}">{{ __('Checkout') }}</a></li>
                  <li><a href="javascript:void();" data-toggle="modal" data-target="#login-modal">{{ __('Login') }}</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="/">
                  <span class="fa fa-shopping-cart"></span>
                  <p>{{ __('e-commerce') }}<strong>{{ __('Store') }}</strong> <span>{{ __('Your Shopping Partner') }}</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">{{ __('SHOPPING CART') }}</span>
                  <span class="aa-cart-notify">2</span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="{{ asset('img/woman-small-2.jpg') }}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">{{ __('Product Name') }}</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="{{ asset('img/woman-small-1.jpg') }}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">{{ __('Product Name') }}</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>                    
                    <li>
                      <span class="aa-cartbox-total-title">
                        {{ __('Total') }}
                      </span>
                      <span class="aa-cartbox-total-price">
                        $500
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">{{ __('Checkout') }}</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="{{ __('Search here ex. \'man\'') }}">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">{{ __('Toggle navigation') }}</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.html">{{ __('Home') }}</a></li>
              <li><a href="#">{{ __('Men') }} <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">{{ __('Casual') }}</a></li>
                  <li><a href="#">{{ __('Sports') }}</a></li>
                  <li><a href="#">{{ __('Formal') }}</a></li>
                  <li><a href="#">{{ __('Standard') }}</a></li>                                                
                  <li><a href="#">{{ __('T-Shirts') }}</a></li>
                  <li><a href="#">{{ __('Shirts') }}</a></li>
                  <li><a href="#">{{ __('Jeans') }}</a></li>
                  <li><a href="#">{{ __('Trousers') }}</a></li>
                  <li><a href="#">{{ __('And more..') }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">{{ __('Sleep Wear') }}</a></li>
                      <li><a href="#">{{ __('Sandals') }}</a></li>
                      <li><a href="#">{{ __('Loafers') }}</a></li>                                      
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#">{{ __('Women') }} <span class="caret"></span></a>
                <ul class="dropdown-menu">  
                  <li><a href="#">{{ __('Kurta & Kurti') }}</a></li>                                                                
                  <li><a href="#">{{ __('Trousers') }}</a></li>              
                  <li><a href="#">{{ __('Casual') }}</a></li>
                  <li><a href="#">{{ __('Sports') }}</a></li>
                  <li><a href="#">{{ __('Formal') }}</a></li>                
                  <li><a href="#">{{ __('Sarees') }}</a></li>
                  <li><a href="#">{{ __('Shoes') }}</a></li>
                  <li><a href="#">{{ __('And more..') }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">{{ __('Sleep Wear') }}</a></li>
                      <li><a href="#">{{ __('Sandals') }}</a></li>
                      <li><a href="#">{{ __('Loafers') }}</a></li>
                      <li><a href="#">{{ __('And more..') }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">{{ __('Rings') }}</a></li>
                          <li><a href="#">{{ __('Earrings') }}</a></li>
                          <li><a href="#">{{ __('Jewellery Sets') }}</a></li>
                          <li><a href="#">{{ __('Lockets') }}</a></li>
                          <li class="disabled"><a class="disabled" href="#">{{ __('Disabled item') }}</a></li>                       
                          <li><a href="#">{{ __('Jeans') }}</a></li>
                          <li><a href="#">{{ __('Polo T-Shirts') }}</a></li>
                          <li><a href="#">{{ __('Skirts') }}</a></li>
                          <li><a href="#">{{ __('Jackets') }}</a></li>
                          <li><a href="#">{{ __('Tops') }}</a></li>
                          <li><a href="#">{{ __('Make Up') }}</a></li>
                          <li><a href="#">{{ __('Hair Care') }}</a></li>
                          <li><a href="#">{{ __('Perfumes') }}</a></li>
                          <li><a href="#">{{ __('Skin Care') }}</a></li>
                          <li><a href="#">{{ __('Hand Bags') }}</a></li>
                          <li><a href="#">{{ __('Single Bags') }}</a></li>
                          <li><a href="#">{{ __('Travel Bags') }}</a></li>
                          <li><a href="#">{{ __('Wallets & Belts') }}</a></li>                        
                          <li><a href="#">{{ __('Sunglases') }}</a></li>
                          <li><a href="#">{{ __('Nail') }}</a></li>                       
                        </ul>
                      </li>                   
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#">Kids <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Casual</a></li>
                  <li><a href="#">Sports</a></li>
                  <li><a href="#">Formal</a></li>
                  <li><a href="#">Standard</a></li>                                                
                  <li><a href="#">T-Shirts</a></li>
                  <li><a href="#">Shirts</a></li>
                  <li><a href="#">Jeans</a></li>
                  <li><a href="#">Trousers</a></li>
                  <li><a href="#">And more.. <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Sleep Wear</a></li>
                      <li><a href="#">Sandals</a></li>
                      <li><a href="#">Loafers</a></li>                                      
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#">Sports</a></li>
             <li><a href="#">Digital <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Camera</a></li>
                  <li><a href="#">Mobile</a></li>
                  <li><a href="#">Tablet</a></li>
                  <li><a href="#">Laptop</a></li>                                                
                  <li><a href="#">Accesories</a></li>                
                </ul>
              </li>
              <li><a href="#">Furniture</a></li>            
              <li><a href="blog-archive.html">Blog <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="blog-archive.html">Blog Style 1</a></li>
                  <li><a href="blog-archive-2.html">Blog Style 2</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>                
                </ul>
              </li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="#">Pages <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="product.html">Shop Page</a></li>
                  <li><a href="product-detail.html">Shop Single</a></li>                
                  <li><a href="404.html">404 Page</a></li>                
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->