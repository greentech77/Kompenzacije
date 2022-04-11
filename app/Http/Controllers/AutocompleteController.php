<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Autocomplete\IBAN;
use App\Services\Autocomplete\PostCodes;
use Illuminate\Support\Facades\Response;

class AutocompleteController extends Controller
{
    
    /**
     * Autofill slovenskih pošt po poštni številki
     *
     * @param Request $request
     * @param PostCodes $postCodes
     * @return Response
     */
    public function getPost(Request $request, PostCodes $postCodes) 
    {
        $post = $postCodes->getPost($request->postCode);
        return response()->api($post ? [
            'post' => $post
        ] : null);
    }

    /**
     * Autofill slovenskih bank za slovenski IBAN
     *
     * @param Request $request
     * @return Response
     */
    public function getVerifyIBAN(Request $request, IBAN $ibanService)
    {
        $iban = preg_replace('/\s+/', '', $request->iban);
        return response()->api($ibanService->verifyIBAN($iban));
    }

}
