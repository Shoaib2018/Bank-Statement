<div>
    <form method="" id="form">
	{{csrf_field()}}
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
                <th></th>
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
                        <td>
                            {{ $statement->pparticular}}  
                            @if($statement->note != "")
                                ({{$statement->note}})
                            @endif
                        </td>
                        @if($statement->cr_dr == 'Credit')
                        <td></td>
                        <td>{{ $statement->amount }}</td>
                        @else
                        <td>{{ $statement->amount }}</td>
                        <td></td>
                        @endif
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-info" onclick="return confirm({{ $statement->id }});">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!--Table body-->

        </table>
        <!--Table-->
    </form>
</div>
{{ $statements->links() }}
<script>
    function confirm(id) {
        $('#removeConfirmBox').modal();
        $("#removeConfirmBox #id").val( id );
    }
    function cancel() {
        $('#removeConfirmBox').modal('toggle');
    };

    function remove() {
        var id = $("#removeConfirmBox #id").val();
        $.ajax(
        {
            url: "remove-statement/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                _token: '{!! csrf_token() !!}',
            },
            success: function (data){
                //console.log(data.success);
                window.location = "statement"; 
            }
        });
    }
</script>