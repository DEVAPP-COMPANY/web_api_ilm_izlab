<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Region;

class ApiRegionController extends Controller
{
    public function regions(){
        $regions = Region::select('id', 'name_uz', 'created_at')
        ->with('districts')->get();
        return $this->sendResponse($regions, true, "");
    }
}
