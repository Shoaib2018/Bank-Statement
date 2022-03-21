<html>
<head>
    <title>Statement Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/statment.css')}}">

</head>
<body class="mt-5">
    <div class="container">
        <div class="d-flex justify-content-center">
            <a href="/new">Add New</a>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
            <!--Table-->
            <table class="table table-striped w-auto table-hover">

                <!--Table head-->
                <thead>
                <tr>
                    <th>SL#</th>
                    <th>Date</th>
                    <th>Particulars</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Balance</th>
                    
                </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    @foreach ($statements as $key => $statement)
                        @if($key%2 == 0)
                        <tr class="table-info">
                        @else
                        <tr>
                        @endif
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ \Carbon\Carbon::parse($statement->statement_date)->format('d/m/Y')}}</td>
                            <td>{{ $statement->particulars }}</td>
                            @if($statement->cr_dr == 'Credit')
                            <td></td>
                            <td>{{ $statement->amount }}</td>
                            @else
                            <td>{{ $statement->amount }}</td>
                            <td></td>
                            @endif
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
                <!--Table body-->

            </table>
            <!--Table-->
            {{ $statements->links() }}
        </div>
    </div>
</body>
</html>