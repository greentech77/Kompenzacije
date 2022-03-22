<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Entities\EntityService;
use App\Services\Entities\Models\Entity;

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
}
