<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entity;
use Illuminate\Support\Facades\Schema;

class AdminApiController extends Controller
{
    public function getEntities(Request $request) {

        if ($request->method) {

            $entities = call_user_func([Entity::class, $request->method], ...$request->arguments);

        } else {

            $table = (new Entity)->getTable();
            $query = Entity::query();

            foreach ($request->input() as $key => $value) {
                if (Schema::hasColumn($table, $key)) {
                    if (is_array($value)) {
                        $query = $query->whereIn($key, $value);
                    } else {
                        $query = $query->where($key, $value);
                    }
                } else {
                    // call entity scopes
                    $query->$key($value);
                }
            }
            $entities = $query->get();

        }

        return response()->api($entities);
    }
}

