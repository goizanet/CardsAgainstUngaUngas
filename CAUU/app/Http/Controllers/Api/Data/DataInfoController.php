<?php

namespace App\Http\Controllers\Api\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ambito;
use App\Continente;
use App\Dato;
use App\Mujer;
use App\User;
use Illuminate\Support\Facades\Log;

class DataInfoController extends Controller
{
    public function listFields (Request $request)
    {
        return response()->json(
            ['ambitos' => Ambito::all()]
        );
    }
}
