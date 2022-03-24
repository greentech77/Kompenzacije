<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Entities\EntityService;
use App\Models\Entity;

class UserController extends Controller
{
    public function getDashboard(Request $request, EntityService $entityService) 
    {
        //$pendingEntities = $entityService->pendingRegistrations();
        return Inertia::render('Dashboard', [
            //'pendingEntities' => $pendingEntities,
            'breadcrumb' =>[
                [
                    'label' => 'Nadzorna plošča',
                ]
            ]
        ]);


    }

    public function getEntities(Request $request, EntityService $entityService) 
    {
        $entities = $entityService->entities();
        return Inertia::render('Entities', [
            'entities' => $entities,
            'breadcrumb' =>[
                [
                    'label' => 'Podjetja',
                ]
            ]
        ]);
    }

    public function getEntity(Request $request, EntityService $entityService, $id) 
    {
        $entity =  $entityService->entity($id);
        return Inertia::render('Entity', [
            'entity' => $entity,
            'breadcrumb' =>[
                [
                    'label' => 'Podjetja',
                    'route' => route('entities')
                ], [
                    'label' => $entity->company_name,
                ]
            ]
        ]);
    }

    public function patchEntity(Request $request, EntityService $entityService, $id) 
    {
        $data = $request->except('action');
        print_r($data);
        switch ($request->action) {
            case 'update':
                $entityService->patchEntity($data['id'], Arr::except($data, 'id'));
                break;
        }

        return redirect()->back();
    }

    public function newEntity(Request $request) 
    {
        return Inertia::render('EntityNew', [
            'breadcrumb' =>[
                [
                    'label' => 'Dodaj podjetje',
                ]
            ]
        ]);
    }
}
