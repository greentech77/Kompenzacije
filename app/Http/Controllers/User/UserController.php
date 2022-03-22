<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Entities\EntityService;
use App\Services\Entities\Models\Entity;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
//use Spatie\QueryBuilder\AllowedFilter;
//use Spatie\QueryBuilder\QueryBuilder;

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
        /*return Inertia::render('Entities', [
            'entities' => $entities,
            'breadcrumb' =>[
                [
                    'label' => 'Podjetja',
                ]
            ]
        ]);*/

        return Inertia::render('Entities', [
            'entities' => $entities,
            'breadcrumb' =>[
                [
                    'label' => 'Podjetja',
                ]
            ]
        ])->table(function (InertiaTable $table) {
            $table->addSearch('company_name', 'Ime podjetja');
        
            /*$table->addSearchRows([
                'email' => 'Email',
                'job_title' => 'Job Title',
            ]);*/
        });
    }
}
