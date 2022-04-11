<?php

namespace App\Services\Autocomplete;

use App\Services\Autocomplete\Traits\HasBanks;

class IBAN {

    use HasBanks;

    /**
     * Formatira iban in vrne banko
     *
     * @param string $iban
     * @return array
     */
    public function verifyIBAN($iban) 
    {
        $split = str_split($iban, 4);
        if (strlen($iban) != 19 || $split[0] != 'SI56') {
            return;
        }
        $id = substr($split[1], 0, 2);
        return array_merge($this->banks[$id] ?? null, [
            'IBAN' => $this->formatIBAN($iban)
        ]);
    }

    /**
     * Formatira iban SI56XXXXXX... => SI56 XXXX XXXX...
     *
     * @param string $iban
     * @return string
     */
    private function formatIBAN($iban) {
        return implode(' ', str_split($iban, 4));
    }
    
}