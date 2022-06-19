<html>
<head>
    <title>Statement Page</title>
   <!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!--Fontawesome CDN-->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">

	<!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/statment.css')}}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"          ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"    ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"    ></script>

</head>
<body class="mt-5">
    <div class="container">
        <div class="d-flex justify-content-center">
            @include('Statement.new')
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
            @include('Statement.list')
        </div>
    </div>
    @include('Statement.removeConfirm')
</body>
</html>
