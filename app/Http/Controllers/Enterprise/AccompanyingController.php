<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Requests\Enterprise\AccompanyingRequest;
use App\Services\Enterprise\AccompanyingFeedstockService;
use App\Services\Enterprise\AccompanyingService;
use App\Services\Enterprise\FeedstockService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AccompanyingController extends Controller
{
    private $accompanyingService;
    private $accompanyingFeedstockService;
    private $feedstockService;
    public function __construct(AccompanyingService $accompanyingService,
                                AccompanyingFeedstockService $accompanyingFeedstockService,
                                FeedstockService $feedstockService)
    {
        $this->accompanyingService = $accompanyingService;
        $this->accompanyingFeedstockService = $accompanyingFeedstockService;
        $this->feedstockService = $feedstockService;
    }

    public function getCreate()
    {

        return view('enterprise.accompanying.create');
    }

    public function validateFeedstock(Request $request)
    {
        $this->validate($request, ['feedstockSelected' => 'required', 'amount' => 'required'],
            ['feedstockSelected.required' => 'Selecione um insumo', 'amount.required' => 'O campo quantidade é obrigatório']);
    }

    public function postCreate(AccompanyingRequest $request)
    {
        DB::transaction(function () use ($request) {

            $id_accompanying = $this->accompanyingService->create($request->only('name', 'calorific_value'));

            $request->merge(['accompanying_id' => $id_accompanying->id]);

            $feedstocks = $request['feedstocks'];

            foreach ($feedstocks as $feedstock) {

                $request->merge(['feedstock_id' => $feedstock['feedstock_id'], 'amount' => $feedstock['amount']]);

                $this->accompanyingFeedstockService->create($request->only('feedstock_id', 'amount'), $id_accompanying->id);
            }
        });
    }

    public function getList(Request $request)
    {
       $accompanyings = $this->accompanyingService->get();

       $accompanyings = $accompanyings->when($request->name, function ($q) use($request){

           $q->where('name', 'like', '%'.$request->name.'%');
       })->paginate(20);

       return view('enterprise.accompanying.list', compact('accompanyings'));

    }

    public function postUpdateAccompanying($id, Request $request)
    {
        $this->validate($request, ['name' => 'required'], ['name.required' => 'O campo nome é obrigatório!']);

        $this->accompanyingService->update($id, $request->only('name'));

        return redirect()->route('enterprise.accompanying.list.get')->with(['status' => 'Acompanhamento alterado com sucesso!']);
    }

    public function getUpdateAccompanying($id)
    {
        $accompanying = $this->accompanyingService->get();

        $accompanying = $accompanying->find($id);

        return view('enterprise.accompanying.update', compact('accompanying'));
    }

    public function getUpdateFeedstock($id)
    {
        $feedstocks = $this->feedstockService->get();

        $feedstocks = $feedstocks->with('unitOfMeasurement')->get();

        $accompanying_feedstocks = $this->accompanyingFeedstockService->get();

        $accompanying_feedstocks = $accompanying_feedstocks->where('accompanying_id', $id)->paginate(20);

        return view('enterprise.accompanying.updateFeedstock', compact('accompanying_feedstocks', 'feedstocks', 'id'));
    }

    public function postDeleteFeedstock($id)
    {
        $this->accompanyingFeedstockService->delete($id);

        return redirect()->back()->with(['status' => 'Insumo removido com sucesso!']);
    }

    public function postAddFeedstock($id, Request $request)
    {
        $accompanyingFeedstock = $this->accompanyingFeedstockService->get();

        $accompanyingFeedstock = $accompanyingFeedstock->where('accompanying_id', $id)->where('feedstock_id', $request->feedstock_id)->get();

        if(count($accompanyingFeedstock)>0){

            return redirect()->back()->withErrors('Insumo já existe neste acompanhamento!');
        }

        $this->accompanyingFeedstockService->create($request, $id);

        return redirect()->back()->with(['status' => 'Insumo adicionado com sucesso!']);
    }

}


