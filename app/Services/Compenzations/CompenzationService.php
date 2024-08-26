<?php

namespace App\Services\Compenzations;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use App\Models\Compenzation;

class CompenzationService {

    public function compenzations() 
    {
        return Compenzation::paginate(5);
    }

    public function compenzation($id)
    {
        $compenzation = Compenzation::find($id);
        
        return $compenzation;
    }

    public function patchCompenzation($id, $data) {
        return Compenzation::find($id)->update($data);
    }

}