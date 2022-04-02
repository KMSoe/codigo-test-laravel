<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function isValid(Request $request)
    {
        return PromoCode::where("code", $request->code)->get();
    }
}
