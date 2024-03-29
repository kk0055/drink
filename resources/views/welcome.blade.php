<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>俺の飲んだもの</title>
    <meta name="description" content="俺の飲んだもの">
    <meta name="keywords" content="俺の飲んだもの,drink,ドリンク,飲み物">
    <meta property="og:type" content="" />
    <meta property="og:url" content="https://oreno-drink.com/" />
    <meta property="og:image" content="https://pbs.twimg.com/media/EvNwpbTU4AYVIgx?format=png&name=medium" />
    <meta property="og:site_name" content="俺が飲んだもの" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    {{-- <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}


    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Stick&display=swap" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
  {{-- Favicon --}}
  <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@1,500&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap');

        .worksans {
            font-family: 'Work Sans', sans-serif;
        }
                
        #menu-toggle:checked + #menu {
            display: block;
        }
        .main-title{
          font-size: 4rem;
          font-family: 'Stick', sans-serif;
          margin-bottom: 50px
        }
       .nav{
        font-family: 'Stick', sans-serif;
       }

       .drink-show {
        width: 80%;
        margin: 0 auto;
        max-width: 500px;
    
       }

       .show-item-image{
        width:80% !important;
        height:auto;
        margin: 0 auto;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }
        
        .hover\:grow:hover {
            transform: scale(1.02);
        }
        
        .body-box{
        height:100px;
        overflow: hidden;
        text-overflow: ellipsis ;
        }
        .drink-name{
         white-space: nowrap; 
         overflow: hidden;
         text-overflow: ellipsis;    
        }
        .drink-place {
         white-space: nowrap; 
         overflow: hidden;
         text-overflow: ellipsis;  
         margin-bottom: 1.2px;   
        }
       
        .drink-text{
         white-space: nowrap; 
         overflow: hidden;
         text-overflow: ellipsis; 
         margin-bottom: 1.2px;   
        }

        p {
       overflow-wrap: break-word;
       }
       .search-text{
        font-size: 2rem;
        font-family: 'Stick', sans-serif;
        width: 80%;
        margin: 0 auto;
        margin-top: 20px;
       }

       .create-text{
        font-size: 1rem;
        font-family: 'Stick', sans-serif;
        width: 80%;
        margin: 0 auto;
        margin-top: 20px;
       }
        .item-image{
        width:185px !important;
        height:215px !important;
        }
        @media (max-width: 500px){
         .main-title{
          font-size: 2rem;
          font-family: 'Stick', sans-serif;
          margin-bottom: 50px
        }
}
    </style>
   <!-- Global site tag (gtag.js) - Google Analytics -->
   {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-D044F053SJ"></script>
   <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
 
    gtag('config', 'G-D044F053SJ');
    </script>     --}}
    <script>
    //  function loginAlert() {
    //    alert("ごめんなさい。ログインして(T_T)");
    //  }
     </script>  
<meta name="google-site-verification" content="hfxhZpIpglETSHt-BZBBPnQTp5XE-7nkkN09kyLwQSg" />
{{-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet"> --}}
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
</div>
<script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>