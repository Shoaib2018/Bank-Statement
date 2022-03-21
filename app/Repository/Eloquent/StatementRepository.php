<?php  
namespace App\Repository\Eloquent;

use App\Models\Statements;
use App\Repository\Interfaces\IStatementRepository;

class StatementRepository implements IStatementRepository
{   
    protected $statement = null;

    public function createOrUpdate( $collection = [], $id = null )
    {   
        if(is_null($id)) {
            $statement = new statement;
            $statement->product_id = $collection['product_id'];
            $statement->SKU = $collection['sku'];
            $statement->stock_quantity = $collection['stock_quantity'];
            $statement->unit_buying_price = $collection['unit_buying_price'];
            $statement->unit_selling_price = $collection['unit_selling_price'];
            $statement->save();
            return $statement;
        }
        $statement = statement::find($id);
        $statement->product_id = $collection['product_id'];
        $statement->SKU = $collection['sku'];
        $statement->stock_quantity = $collection['stock_quantity'];
        $statement->unit_buying_price = $collection['unit_buying_price'];
        $statement->unit_selling_price = $collection['unit_selling_price'];
        $statement->save();
        return $statement;
    }

    public function getStatement($accountId) {
        $data = Statements::where('bank_account', '=', $accountId)
                        ->orderBy('statement_date', 'DESC')
                        ->paginate(20);        
        
        return $data;
    }
}
?>