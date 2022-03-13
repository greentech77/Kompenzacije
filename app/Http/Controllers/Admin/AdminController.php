<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getDashboard(Request $request/*, EntityService $entityService*/) 
    {
        //$pendingEntities = $entityService->pendingRegistrations();
        return Inertia::render('Admin/Dashboard', [
            //'pendingEntities' => $pendingEntities,
            'breadcrumb' =>[
                [
                    'label' => 'Nadzorna plošča',
                ]
            ]
        ]);
    }
}
