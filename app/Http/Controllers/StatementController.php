<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interfaces\IStatementRepository;
use App\Repository\Interfaces\IParticularRepository;
use Session;

class StatementController extends Controller
{
    public $statementRepo;
    public $particularRepo;

	public function __construct(IStatementRepository $statement, IParticularRepository $particular) {
        $this->statementRepo = $statement;
        $this->particularRepo = $particular;
    }

    public function index()
    {
        $particulars_search = $_GET['particulars_search'] ?? "";
        $cr_dr_search = $_GET['cr_dr_search'] ?? "";
        
        $particulars = $this->particularRepo->getParticular();
        $accountId = Session::get('accountId');
        $statements = $this->statementRepo->getStatement($accountId, $particulars_search, $cr_dr_search);

        return view('statement/index', ['statements' => $statements, 'particulars' => $particulars]);
    }

    public function add(Request $request)
    {
        $accountId = Session::get('accountId');
        $collection['statement_date'] = $request->statement_date;
        $collection['cr_dr'] = $request->cr_dr;
        $collection['particulars'] = $request->particulars;
        $collection['amount'] = $request->amount;
        $collection['note'] = $request->note;

        $newStatement = $this->statementRepo->createOrUpdate($accountId, $collection);

        return redirect()->route('statement');
    }

    public function destroy($id){

        $newStatement = $this->statementRepo->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
