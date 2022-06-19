<div class="container mb-2">
    <div class="justify-content-center">
        <div class="row">
            <div class="col-8">
                <form method="POST" action="new">
                    <fieldset class="border p-2">
                        <legend class="w-auto">Add New</legend>
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
                                <input type="number" name="amount" step="any"/>
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
                        <div class="row mb-1">
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
                        <div class="row mb-1">
                            <div class="col">
                                <textarea name="note"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" />
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-4">
                <form method="get" action="">
                    <fieldset class="border p-2">
                        <legend class="w-auto">Search:</legend>
                        <div class="row">
                            <div class="col-6">
                                <label>Dr/Cr</label>
                            </div>
                            <div class="col-6">
                                <label>Particulars</label>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-6">
                                <select name="cr_dr_search">
                                    <option value=""></option>
                                    <option value="Debit">Debit</option>
                                    <option value="Credit">Credit</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select name="particulars_search">
                                    <option value=""></option>
                                    @foreach ($particulars as $key => $particular)
                                        @php
                                        $particularId = $particular->id;
                                        @endphp
                                        <option value="{{ $particular->id }}" >
                                            {{ $particular->particular }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" value="Search"/>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
