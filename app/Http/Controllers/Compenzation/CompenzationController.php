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

    public function newCompenzation(EntityService $entityService) 
    {
        $entities = $entityService->getEntitiesIdName();
        return Inertia::render('NewCompenzation', [
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
        $request->validate($validation->compenzationData());
        return redirect()->back();
    }

      /**
     * Post za authorised registration / final step.
     * 
     * @param Request $request
     * @param Validation $validation
     * @param Compenzation $registration
     * @return RedirectResponse
     */
    public function postCompenzation(Request $request, Validation $validation, Compenzation $compenzation) {

        $request->validate($validation->compenzationData());

        $user = $registration->registerAuthorised($request->input());

        //Notification::send($user, new PersonalIdentification($user)); //TO DO: PREVERI KAJ TO NAREDI

        return redirect()->route('home')->with([
            'modal' => [
                'title' => __('modals.register.title'),
                'content' => __('modals.register.success'),
                'status' => 'success',
                'actions' => [[
                    'action' => [
                        'type' => 'close',
                    ],
                    'text' => __('modals.common.confirm')
                ]]
            ]
        ]);

    }

}