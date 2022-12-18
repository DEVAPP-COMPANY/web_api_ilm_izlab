<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Offer;

class ApiOfferController extends Controller
{
    public function offers(){
        $offers = Offer::select('offers.id','offers.title', 'offers.image')
        ->get();
        return $this->sendResponse($offers, true, "");
    }

    public function offerContent($offer_id){
        return $this->sendResponse(Offer::where('id', $offer_id)
        ->select('offers.id', 'offers.title', 'offers.content')
        ->first(), true, "");
    }
}
