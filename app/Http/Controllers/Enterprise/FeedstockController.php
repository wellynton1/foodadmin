<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Requests\Enterprise\FeedstockRequest;
use App\Models\Enterprise\Feedstock;
use App\Models\Utilities\UnitOfMeasurement;
use App\Services\Enterprise\FeedstockService;
use App\Services\Enterprise\UnitOfMeasurementService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedstockController extends Controller
{
    private $feedstockService;

    private $unitofmeasurementService;

    public function __construct(FeedstockService $feedstockService, UnitOfMeasurementService $unitOfMeasurementService)
    {
        $this->feedstockService = $feedstockService;
        $this->unitofmeasurementService = $unitOfMeasurementService;
    }

    public function getCreate()
    {

        $unitMeasurements = $this->unitofmeasurementService->get()->pluck('name', 'id');


        return view('enterprise.feedstock.create', compact('unitMeasurements'));

    }

    public function postCreate(FeedstockRequest $request)
    {

        $this->feedstockService->create($request);

        return redirect()->route('enterprise.feedstock.list.get')->with(['status' => 'Insumo cadastrado com sucesso!']);

    }

    public function getUpdate(Feedstock $feedstock)
    {

        $unitMeasurements = $this->unitofmeasurementService->get()->pluck('name', 'id');

        return view('enterprise.feedstock.update', compact('feedstock', 'unitMeasurements'));

    }


    public function postUpdate(Feedstock $feedstock, FeedstockRequest $request)
    {

        $this->feedstockService->update($feedstock->id, $request);

        return redirect()->route('enterprise.feedstock.list.get')->with(['status' => 'Insumo editado com sucesso!']);

    }

    public function getList(Request $request)
    {

        $data = $this->feedstockService->get();

        $feedstocks = $data->when($request->name, function ($q) use($request){
            $q->where('name', 'like', '%'.$request->name.'%');
        })->paginate();

        return view('enterprise.feedstock.list', compact('feedstocks'));

    }
}
