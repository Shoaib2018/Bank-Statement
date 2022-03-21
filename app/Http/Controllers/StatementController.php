<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interfaces\IStatementRepository;
use Illuminate\Support\Facades\DB;
use Session;

class StatementController extends Controller
{
    public $statementRepo;

	public function __construct(IStatementRepository $statement) {
        $this->statementRepo = $statement;
    }

    public function index()
    {
        $accountId = Session::get('accountId');
        $statements = $this->statementRepo->getStatement($accountId);

        return view('statement/index', ['statements' => $statements]);
    }

    public function new()
    {
        return view('statement/new');
    }

    public function add(Request $request)
    {
        $accountId = Session::get('accountId');
        $collection['statement_date'] = $request->statement_date;
        $collection['cr_dr'] = $request->cr_dr;
        $collection['particulars'] = $request->particulars;
        $collection['amount'] = $request->amount;

        $newStatement = $this->statementRepo->createOrUpdate($accountId, $collection);

        return redirect()->route('statement');
    }
}
