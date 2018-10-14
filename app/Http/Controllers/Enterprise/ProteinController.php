<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Requests\Enterprise\ProteinRequest;
use App\Services\Enterprise\FeedstockService;
use App\Services\Enterprise\ProteinFeedstockService;
use App\Services\Enterprise\ProteinService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ProteinController extends Controller
{
    private $proteinService;
    private $proteinFeedstockService;
    private $feedstockService;
    public function __construct(ProteinService $proteinService,
                                ProteinFeedstockService $proteinFeedstockService,
                                FeedstockService $feedstockService)
    {
        $this->proteinService = $proteinService;
        $this->proteinFeedstockService = $proteinFeedstockService;
        $this->feedstockService = $feedstockService;
    }

    public function getCreate()
    {

        return view('enterprise.protein.create');
    }

    public function validateFeedstock(Request $request)
    {
        $this->validate($request, ['feedstockSelected' => 'required', 'amount' => 'required|numeric'],
            ['amount.numeric' => 'quantidade deve ser um número.','feedstockSelected.required' => 'Selecione um insumo', 'amount.required' => 'O campo quantidade é obrigatório']);
    }

    public function postCreate(ProteinRequest $request)
    {
        DB::transaction(function () use ($request) {

            $id_protein = $this->proteinService->create($request->only('name', 'calorific_value'));

            $request->merge(['protein_id' => $id_protein->id]);

            $feedstocks = $request['feedstocks'];

            foreach ($feedstocks as $feedstock) {

                $request->merge(['feedstock_id' => $feedstock['feedstock_id'], 'amount' => $feedstock['amount']]);

                $this->proteinFeedstockService->create($request->only('feedstock_id', 'amount'), $id_protein->id);
            }
        });
    }

    public function getList(Request $request)
    {
        $proteins = $this->proteinService->get();

        $proteins = $proteins->when($request->name, function ($q) use($request){

            $q->where('name', 'like', '%'.$request->name.'%');
        })->paginate(20);

        return view('enterprise.protein.list', compact('proteins'));

    }

    public function postUpdateProtein($id, Request $request)
    {
        $this->validate($request, ['name' => 'required'], ['name.required' => 'O campo nome é obrigatório!']);

        $this->proteinService->update($id, $request->only('name'));

        return redirect()->route('enterprise.protein.list.get')->with(['status' => 'Proteína alterada com sucesso!']);
    }

    public function getUpdateProtein($id)
    {
        $protein = $this->proteinService->get();

        $protein = $protein->find($id);

        return view('enterprise.protein.update', compact('protein'));
    }

    public function getUpdateFeedstock($id)
    {
        $feedstocks = $this->feedstockService->get();

        $feedstocks = $feedstocks->with('unitOfMeasurement')->get();

        $protein_feedstocks = $this->proteinFeedstockService->get();

        $protein_feedstocks = $protein_feedstocks->where('protein_id', $id)->paginate(20);

        return view('enterprise.protein.updateFeedstock', compact('protein_feedstocks', 'feedstocks', 'id'));
    }

    public function postDeleteFeedstock($id)
    {
        $this->proteinFeedstockService->delete($id);

        return redirect()->back()->with(['status' => 'Proteína removida com sucesso!']);
    }

    public function postAddFeedstock($id, Request $request)
    {
        $proteinFeedstock = $this->proteinFeedstockService->get();

        $proteinFeedstock = $proteinFeedstock->where('protein_id', $id)->where('feedstock_id', $request->feedstock_id)->get();

        if(count($proteinFeedstock)>0){

            return redirect()->back()->withErrors('Insumo já existe nesta proteína!');
        }

        $this->proteinFeedstockService->create($request, $id);

        return redirect()->back()->with(['status' => 'Proteína adicionada com sucesso!']);
    }
}
