<!DOCTYPE html>
<!--[if IE 6]><html id="ie6" lang="en"><![endif]-->
<!--[if IE 7]><html id="ie7" lang="en"><![endif]-->
<!--[if IE 8]><html id="ie8" lang="en"><![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!--><html lang="en"><!--<![endif]-->
<head>
<title>Negative.In.Ua {{ (isset($title)) ? ' : ' . $title : ''}}</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">

<meta name="description" content="{{ (isset($meta_desc)) ? $meta_desc : ''}}">
<meta name="keywords" content="{{ (isset($keywords)) ? $keywords : ''}}">

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('settings.theme')) }}/images/favico.ico">
<link rel="icon" type="image/x-icon" href="{{ asset(config('settings.theme')) }}/images/favico.ico">
<!-- CSSs -->
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/lessthen960.css" type="text/css" media="screen and (max-width: 960px)">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/lessthen600.css" type="text/css" media="screen and (max-width: 600px)">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/lessthen480.css" type="text/css" media="screen and (max-width: 480px)">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/memento.css" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/prettyPhoto.css" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/buttons.min.css" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/buttons.css" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/labels.min.css" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/wells.min.css" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/homes/default.css" type="text/css" media="all">
<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Droid+Sans&subset=latin,cyrillic,greek' type="text/css" media="all">
<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Shadows+Into+Light&subset=latin,cyrillic,greek' type="text/css" media="all">
<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:italic' type="text/css" media="all">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/fonts/socialico/stylesheet.css" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/fonts/font-awesome/font-awesome.css" type="text/css" media="all">
<!-- JAVASCRIPTs -->
<script>var yiw_prettyphoto_style = 'pp_default';</script>
<script src="{{ asset(config('settings.theme')) }}/js/jquery.js"></script>
<script src="{{ asset(config('settings.theme')) }}/js/jquery.cycle.min.js"></script>
<script src="{{ asset(config('settings.theme')) }}/js/jquery.easing.1.3.js"></script>
<script src="{{ asset(config('settings.theme')) }}/js/jquery.prettyPhoto.js"></script>
<script src="{{ asset(config('settings.theme')) }}/js/jquery.aw-showcase.js"></script>
<script src="{{ asset(config('settings.theme')) }}/js/superfish.js"></script>
<script src="{{ asset(config('settings.theme')) }}/js/buttons.min.js"></script>
<script src="{{ asset(config('settings.theme')) }}/js/jquery.quicksand.js"></script>
</head>
<!-- BODY -->
<body class="no_js responsive boxed-layout chrome">
@yield('topbar')
<div class="wrapper group">
    @yield('header')
    <!-- CONTENT -->
    @yield('content')
    <!-- SIDEBAR -->
    @yield('sidebar')
        </div>  
    </div>  
    <div class="clear"></div>
</div>
    <!-- FOOTER -->
    @yield('footer')
<div id="copyright" class="group">
  <div class="inner group">
    <div class="left">
      <p> Copyright <a href="#">Company Name</a> 2045 - Design by: <a target="_blank" rel="nofollow" href="#"><strong>OShaman</strong></a> </p>
    </div>
    <div class="right">
        <a href="#" class="socials facebook" style="font-size:30px;" title="Facebook">F</a>
        <a href="#" class="socials twitter" style="font-size:30px;" title="Twitter">L</a>
        <a href="#" class="socials skype" style="font-size:30px;" title="Skype">H</a>
        <a href="#" class="socials google" style="font-size:30px;" title="Google">G</a>
        <a href="#" class="socials linkedin" style="font-size:30px;" title="Linkedin">I</a>
        <a href="#" class="socials rss" style="font-size:30px;" title="RSS">R</a> </div>
  </div>
</div>
<script src="{{ asset(config('settings.theme')) }}/js/jquery.custom.js"></script>
<script src="{{ asset(config('settings.theme')) }}/js/gotop.js"></script>
</body>
</html>