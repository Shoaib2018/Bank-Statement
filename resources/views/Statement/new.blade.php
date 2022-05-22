<div class="container">
    <div class="d-flex justify-content-center">
        <form method="POST" action="new">
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
                        @foreach ($particulars as $key => $particular)
                            <option value="{{ $particular->id }}">{{ $particular->particular }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col"> 
                    <textarea name="note"></textarea>
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