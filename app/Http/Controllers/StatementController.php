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
}
