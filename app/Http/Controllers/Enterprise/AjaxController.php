<?php

namespace App\Http\Controllers\Enterprise;

use App\Services\Enterprise\FeedstockService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    private $feedstockService;

    public function __construct(FeedstockService $feedstockService)
    {
        $this->feedstockService = $feedstockService;
    }

    public function getFeedstockAjax()
    {
        $feedstocks = $this->feedstockService->get();

        return response()->json($feedstocks->with('unitOfMeasurement')->get());
    }
}
