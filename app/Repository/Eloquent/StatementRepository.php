<?php  
namespace App\Repository\Eloquent;

use App\Models\Statements;
use App\Repository\Interfaces\IStatementRepository;

class StatementRepository implements IStatementRepository
{   
    protected $statement = null;

    public function getStatement($accountId) {
        $data = Statements::from('Statements as s')
                        ->join('particulars as p', 's.particulars', '=', 'p.id')
                        ->where('bank_account', '=', $accountId)
                        ->orderBy('statement_date')
                        ->orderBy('id')
                        ->select('s.*', 'p.particular as pparticular')
                        ->paginate(20);        
        
        return $data;
    }

    public function createOrUpdate( $bank_account = null, $collection = [], $id = null )
    {   
        if(is_null($id)) {
            $statement = new Statements;
            $statement->bank_account = $bank_account;
            $statement->statement_date = $collection['statement_date'];
            $statement->cr_dr = $collection['cr_dr'];
            $statement->particulars = $collection['particulars'];
            $statement->amount = $collection['amount'];
            $statement->note = $collection['note'];
            $statement->save();
            return $statement;
        }
        $statement = statements::find($id);
        $statement->bank_account = $bank_account;
        $statement->statement_date = $collection['statement_date'];
        $statement->cr_dr = $collection['cr_dr'];
        $statement->particulars = $collection['particulars'];
        $statement->amount = $collection['amount'];
        $statement->note = $collection['note'];
        $statement->save();
        return $statement;
    }

    public function delete( $id ) 
    {
        return statements::find($id)->delete();
    }
}
?>