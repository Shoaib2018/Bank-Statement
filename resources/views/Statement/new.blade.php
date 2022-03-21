<html>
<head>
    <title>Add new</title>
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
            <form method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6"> 
                        <label>Amount</label>
                    </div>
                    <div class="col-6"> 
                        <label>Date</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"> 
                        <input type="number" name="amount" />
                    </div>
                    <div class="col-6"> 
                        <input type="date" name="statement_date" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"> 
                        <label>Dr/Cr</label>
                    </div>
                    <div class="col-6"> 
                        <label>Particulars</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"> 
                        <select name="cr_dr">
                            <option value="Debit">Debit</option>
                            <option value="Credit">Credit</option>
                        </select>
                    </div>
                    <div class="col-6"> 
                        <select name="particulars">
                            <option value="Cash Withdraws">Cash Withdraws</option>
                            <option value="Salary">Salary</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"> 
                        <input type="submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>