<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Showtrakt
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200|Open+Sans+Condensed:700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/circle.css" rel="stylesheet" />
    <link href="/assets/css/now-ui-kit.css?v=1.2.2" rel="stylesheet" />
  @stack('styles')
    <style>
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        ::-webkit-scrollbar-button {
            width: 13px;
            height: 13px;
        }
        ::-webkit-scrollbar-thumb {
            background: #0395b2;
            border: 2px none #ffffff;
            border-radius: 93px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1d2ac7;
        }
        ::-webkit-scrollbar-thumb:active {
            background: #3f60df;
        }
        ::-webkit-scrollbar-track {
            background: #666666;
            border: 3px none #ffffff;
            border-radius: 77px;
        }
        ::-webkit-scrollbar-track:hover {
            background: #666666;
        }
        ::-webkit-scrollbar-track:active {
            background: #333333;
        }
        ::-webkit-scrollbar-corner {
            background: transparent;
        }
        summary::-webkit-details-marker {
            display: none
        }

        details > summary {
            padding: 6px;
            width: 100%;
            background-color: white;
            border: none;
            box-shadow: 1px 1px 2px #bbbbbb;
            cursor: pointer;
        }

        details > p {
            background-color: black;
            color:white;
            padding: 4px;
            margin: 0;
            box-shadow: 1px 1px 2px #bbbbbb;
        }
        *{padding:0;margin:0;}

        .float{
            position:fixed;
            width:40px;
            height:40px;
            bottom:15px;
            right:15px;
            background-color:#3f9ae5;
            border-radius:20px;
            text-align:center;
        }

        .my-float{
            margin-top: -15px;
            margin-left: -8px;
        }
    </style>
</head>