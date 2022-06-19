<div>
    <form method="" id="form">
	{{csrf_field()}}
        <!--Table-->
        <table class="table table-striped w-auto table-hover text-nowrap">

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
                @php
                $balance = 0;
                $cr_balance = 0;
                $dr_balance = 0;
                @endphp
                @foreach ($statements as $key => $statement)
                    @if($key%2 == 0)
                    <tr class="table-info">
                    @else
                    <tr>
                    @endif
                        <th scope="row" class="pt-0 pb-0">{{ $key+1 }}</th>
                        <td class="pt-0 pb-0">{{ \Carbon\Carbon::parse($statement->statement_date)->format('d/m/Y')}}</td>
                        <td class="pt-0 pb-0">
                            {{ $statement->pparticular}}
                            @if($statement->note != "")
                                ({{$statement->note}})
                            @endif
                        </td>
                        @if($statement->cr_dr == 'Credit')
                        @php
                        $balance += $statement->amount;
                        $cr_balance += $statement->amount;
                        @endphp
                        <td class="pt-0 pb-0">{{ number_format(0, 2, '.', ',') }}</td>
                        <td class="pt-0 pb-0">{{ number_format($statement->amount, 2, '.', ',') }}</td>
                        <td class="pt-0 pb-0">{{ number_format($balance, 2, '.', ',') }}</td>
                        @else
                        @php
                        $balance -= $statement->amount;
                        $dr_balance += $statement->amount;
                        @endphp
                        <td class="pt-0 pb-0">{{ number_format($statement->amount, 2, '.', ',') }}</td>
                        <td class="pt-0 pb-0">{{ number_format(0, 2, '.', ',') }}</td>
                        <td class="pt-0 pb-0">{{ number_format($balance, 2, '.', ',') }}</td>
                        @endif
                        <td class="pt-0 pb-0">
                            <button type="button" class="btn btn-info pt-0 pb-0" style="height: 25px" onclick="return confirm({{ $statement->id }});">
                                Remove
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Balance Carry Forward</td>
                    <td>{{ number_format($cr_balance, 2, '.', ',') }}</td>
                    <td>{{ number_format($dr_balance, 2, '.', ',') }}</td>
                    <td>{{ number_format($balance, 2, '.', ',') }}</td>
                    <td></td>
                </tr>
            </tfoot>
            <!--Table body-->

        </table>
        <!--Table-->
    </form>
</div>
{{-- {{ $statements->links() }} --}}
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
