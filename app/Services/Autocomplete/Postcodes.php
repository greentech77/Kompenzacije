<?php 

namespace App\Services\Autocomplete;

use App\Services\Autocomplete\Traits\HasPostcode;

class PostCodes {

    use HasPostcode;

    public function getPost($key) {
        return $this->codes[$key] ?? null;
    }

}
