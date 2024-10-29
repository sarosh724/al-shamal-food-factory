<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="{{ @$seoKeywords ?: getSetting('seo-keywords')}}" />
  <meta name="description" content="{{ @$seoDescription ?: getSetting('seo-description')}}" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>{{@$seoTitle ?: getSetting('site-title')}}</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset("assets/front/css/bootstrap.css")}}" />


  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{asset("assets/front/css/style.css")}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset("assets/front/css/responsive.css")}}" rel="stylesheet" />

</head>
<body>
<!-- header section strats -->
    <div class="hero_bg_box">
      <div class="img-box">
        <img src="images/hero-bg.jpg" alt="">
      </div>
    </div>

    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="contact_link-container">
            <a href="" class="contact_link1">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                {{getSetting('location')}}
              </span>
            </a>
            <a href="" class="contact_link2">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : {{getSetting('contact')}}
              </span>
            </a>
            <a href="" class="contact_link3">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                {{getSetting('email')}}
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{route('index')}}">
              <span>
                Star Trading Service
              </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""></span>
            </button>

            <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <li class="nav-item {{is_active_menu(route('index'))}}">
                  <a class="nav-link" href="{{route('index')}}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{is_active_menu(route('about'))}}">
                  <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item {{is_active_menu(route('services'))}}">
                  <a class="nav-link" href="{{route('services')}}">Services</a>
                </li>
                <li class="nav-item {{is_active_menu(route('contact-us'))}}">
                  <a class="nav-link" href="{{route('contact-us')}}">Contact us</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
