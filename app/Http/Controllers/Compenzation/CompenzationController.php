<?php

namespace App\Http\Controllers\Compenzation;

use Inertia\Inertia;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Validation\Validation;
use App\Models\Compenzation;
use App\Services\Compenzations\CompenzationService;
use App\Services\Entities\EntityService;


class CompenzationController extends Controller
{
    public function getCompenzations(Request $request, CompenzationService $compenzationsService) 
    {
        $compenzations = $compenzationsService->compenzations();
        return Inertia::render('Compenzations', [
            'compenzations' =>$compenzations,
            'breadcrumb' =>[
                [
                    'label' => 'Kompenzacije',
                ]
            ]
        ]);
    }


    public function getCompenzation(Request $request, CompenzationService $compenzationService, $id) 
    {
        $compenzation =  $compenzationService->compenzation($id);
        return Inertia::render('Compenzation', [
            'compenzation' => $compenzation,
            'breadcrumb' =>[
                [
                    'label' => 'Podjetja',
                    'route' => route('entities')
                ], [
                    'label' => $compenzation->name,
                ]
            ]
        ]);
    }

    public function addCompenzation(EntityService $entityService) 
    {
        $entities = $entityService->getEntitiesIdName();
        return Inertia::render('AddCompenzation', [
            'entities' => $entities,
            'breadcrumb' =>[
                [
                    'label' => 'Dodaj kompenzacijo',
                ]
            ]
        ]);
    }

    /**
     * Post za compenzation / Data step validacija.
     */
    public function postCompenzationData(Request $request, Validation $validation) 
    {
        $request->validate($validation->CompenzationData());
        return redirect()->back();
    }

}