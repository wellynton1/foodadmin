<?php

namespace App\Http\Controllers\Enterprise\Menu;

use App\Services\Enterprise\AccompanyingService;
use App\Services\Enterprise\MenuAccompanyingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuAccompanyingController extends Controller
{
    private $menuAccompanyingService;
    private $accompanyingService;
    public function __construct(MenuAccompanyingService $menuAccompanyingService, AccompanyingService $accompanyingService)
    {
        $this->menuAccompanyingService = $menuAccompanyingService;
        $this->accompanyingService = $accompanyingService;
    }

    public function getList($id)
    {
        $accompanyings = $this->accompanyingService->get();

        $accompanyings = $accompanyings->pluck('name', 'id');

        $menuAccompanying = $this->menuAccompanyingService->get();

        $menuAccompanying = $menuAccompanying->where('menu_id', $id)->paginate(20);

        return view('enterprise.menu.accompanying.list', compact('accompanyings', 'id', 'menuAccompanying'));
    }

    public function postCreate($id_menu, Request $request)
    {
        $this->validate($request, ['accompanying_id' => 'required'], ['accompanying_id.required' => 'Selecione um acompanhamento!']);

        $menuAccompaying = $this->menuAccompanyingService->get();

        $menuAccompaying = $menuAccompaying->where('accompanying_id', $request->accompanying_id)->where('menu_id', $id_menu)->get();

        if(count($menuAccompaying)>0){

            return redirect()->back()->withErrors('Acompanhamento já existe neste cardápio!');
        }

        $request->merge(['menu_id' => $id_menu]);

        $this->menuAccompanyingService->create($request);

        return redirect()->back()->with(['status' => 'Acompanhamento adicionado com sucesso!']);
    }

    public function postDelete($id)
    {
        $this->menuAccompanyingService->delete($id);

        return redirect()->back()->with(['status' => 'Acompanhamento removido com sucesso!']);
    }

}
