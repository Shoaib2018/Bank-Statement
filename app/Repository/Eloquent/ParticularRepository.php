<?php  
namespace App\Repository\Eloquent;

use App\Models\Particulars;
use App\Repository\Interfaces\IParticularRepository;

class ParticularRepository implements IParticularRepository
{   
    protected $particular = null;

    public function getParticular() {
        $data = particulars::orderBy('particular')
                        ->get();        
        
        return $data;
    }
}
?>