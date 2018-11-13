<?php

namespace App\Http\Controllers\Enterprise\Menu;

use App\Services\Enterprise\MenuProteinService;
use App\Services\Enterprise\ProteinService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuProteinController extends Controller
{
    private $menuProteinService;
    private $proteinService;
    public function __construct(MenuProteinService $menuProteinService, ProteinService $proteinService)
    {
        $this->menuProteinService = $menuProteinService;
        $this->proteinService = $proteinService;
    }

    public function getList($id)
    {
        $proteins = $this->proteinService->get();

        $proteins = $proteins->orderBy('name')->pluck('name', 'id');

        $menuProtein = $this->menuProteinService->get();

        $menuProtein = $menuProtein->where('menu_id', $id)->paginate(20);

        return view('enterprise.menu.protein.list', compact('proteins', 'id', 'menuProtein'));
    }

    public function postCreate($id_menu, Request $request)
    {
        $this->validate($request, ['protein_id' => 'required'], ['protein_id.required' => 'Selecione uma proteína!']);

        $menuProtein = $this->menuProteinService->get();

        $menuProtein = $menuProtein->where('protein_id', $request->protein_id)->where('menu_id', $id_menu)->get();

        if(count($menuProtein)>0){

            return redirect()->back()->withErrors('Esta proteína já existe neste cardápio!');
        }

        $request->merge(['menu_id' => $id_menu]);

        $this->menuProteinService->create($request);

        return redirect()->back()->with(['status' => 'Proteína adicionada com sucesso!']);
    }

    public function postDelete($id)
    {
        $this->menuProteinService->delete($id);

        return redirect()->back()->with(['status' => 'Proteína removida com sucesso!']);
    }
}
