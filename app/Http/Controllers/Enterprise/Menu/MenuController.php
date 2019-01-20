<?php

namespace App\Http\Controllers\Enterprise\Menu;

use App\Http\Requests\Enterprise\EditMenuRequest;
use App\Http\Requests\Enterprise\MenuRequest;
use App\Models\Enterprise\Menu;
use App\Services\Enterprise\MenuAccompanyingService;
use App\Services\Enterprise\MenuProteinService;
use App\Services\Enterprise\MenuService;
use App\Services\Enterprise\StatusMenuService;
use App\Services\Enterprise\TypeMenuService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class MenuController extends Controller
{
    private $typeMenuService;

    private $menuService;

    private $statusMenuService;

    private $menuProteinService;

    private $menuAccompanyingService;


    public function __construct(MenuProteinService $menuProteinService, MenuAccompanyingService $menuAccompanyingService, TypeMenuService $typeMenuService,
                                MenuService $menuService, StatusMenuService $statusMenuService)
    {
        $this->typeMenuService = $typeMenuService;
        $this->menuService = $menuService;
        $this->statusMenuService = $statusMenuService;
        $this->menuProteinService = $menuProteinService;
        $this->menuAccompanyingService = $menuAccompanyingService;
    }

    public function getCreate()
    {

        $statusMenu = $this->statusMenuService->get()->pluck('name', 'id');

        $typeMenus = $this->typeMenuService->get()->pluck('name', 'id');

        return view('enterprise.menu.create', compact('typeMenus', 'statusMenu'));

    }

    public function postCreate(MenuRequest $request)
    {

        DB::transaction(function () use($request) {

            $id_menu =  $this->menuService->create($request);

            $request->merge(['menu_id' => $id_menu->id]);

            foreach ($request->accompanyings as $accompanying){

                $request->merge(['accompanying_id' => $accompanying['accompanying_id']]);

                $this->menuAccompanyingService->create($request);

            }

            foreach ($request->proteins as $protein){

                $request->merge(['protein_id' => $protein['protein_id']]);

                $this->menuProteinService->create($request);

            }

        });


        return 1;
    }

    public function getUpdate(Menu $menu)
    {

        $typeMenus = $this->typeMenuService->get()->pluck('name', 'id');

        $statusMenu = $this->statusMenuService->get()->pluck('name', 'id');


        return view('enterprise.menu.update', compact('menu', 'typeMenus', 'statusMenu', 'menu'));

    }


    public function postUpdate(Menu $menu, EditMenuRequest $request)
    {

        $this->menuService->update($menu->id, $request);

        return redirect()->route('enterprise.menu.list.get')->with(['status' => 'Cardápio editado com sucesso!']);

    }

    public function getList(Request $request)
    {

        $typeMenus = $this->typeMenuService->get()->pluck('name', 'id');

        $data = $this->menuService->get();

        $menus = $data->when($request->name, function ($q) use($request){
            $q->where('name', 'like', '%'.$request->name.'%');
        })->when($request->id_type_menu, function ($q) use ($request){
            $q->where('id_type_menu', $request->id_type_menu);
        })->paginate();

        return view('enterprise.menu.list', compact('typeMenus', 'menus'));

    }

}
