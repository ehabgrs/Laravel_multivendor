<!doctype html>
<html lang="en">
<head>


    <meta charset="utf-8">


    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <title>Prestashop_Savemart</title>
    <meta name="description" content="Shop powered by PrestaShop">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=yes">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{asset('assets/front/img/favicon.ico')}}?1531456858">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/img/favicon.ico')}}?1531456858">
    <link href="{{asset('assets/front/css/css.css')}}?family=Roboto:300,400,500,600,700,900" rel="stylesheet">
    <link href="{{asset('assets/front/css/css-1.css')}}?family=Oswald:300,400,500,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/front/themes/vinova_savemart/assets/cache/theme-78026624.css')}}"
          type="text/css" media="all">


    <script type="text/javascript">
        var prestashop = {
            "static_token": "28add935523ef131c8432825597b9928",
            "token": "cad5fe8236d849a3b4023c4e5ca6a313"
        };
    </script>

    <script type="text/javascript">
        var baseDir = "/savemart/";
        var static_token = "28add935523ef131c8432825597b9928";
    </script>


    <style type="text/css">
        #main-site {
            background-color: #ffffff;
        }
        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }
            #header .container {
                width: 1200px;
            }
            .footer .container {
                width: 1200px;
            }
            #index .container {
                width: 1200px;
            }
        }
        #popup-subscribe .modal-dialog .modal-content {
            background-image: url(../modules/novthemeconfig/images/newsletter_bg-1.png);
        }
    </style>

    @yield('styles')
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
</head>
<body id="index" class="lang-en country-gb currency-gbp layout-full-width page-index tax-display-enabled">