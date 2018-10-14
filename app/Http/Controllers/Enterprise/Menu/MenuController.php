<?php

namespace App\Http\Controllers\Enterprise\Menu;

use App\Http\Requests\Enterprise\MenuRequest;
use App\Models\Enterprise\Menu;
use App\Services\Enterprise\MenuService;
use App\Services\Enterprise\StatusMenuService;
use App\Services\Enterprise\TypeMenuService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    private $typeMenuService;

    private $menuService;

    private $statusMenuService;

    public function __construct(TypeMenuService $typeMenuService, MenuService $menuService, StatusMenuService $statusMenuService)
    {
        $this->typeMenuService = $typeMenuService;

        $this->menuService = $menuService;

        $this->statusMenuService = $statusMenuService;
    }

    public function getCreate()
    {

        $statusMenu = $this->statusMenuService->get()->pluck('name', 'id');

        $typeMenus = $this->typeMenuService->get()->pluck('name', 'id');

        return view('enterprise.menu.create', compact('typeMenus', 'statusMenu'));

    }

    public function postCreate(MenuRequest $request)
    {

        $this->menuService->create($request);

        return redirect()->route('enterprise.menu.list.get')->with(['status' => 'Cardápio cadastrado com sucesso!']);

    }

    public function getUpdate(Menu $menu)
    {

        $typeMenus = $this->typeMenuService->get()->pluck('name', 'id');

        $statusMenu = $this->statusMenuService->get()->pluck('name', 'id');


        return view('enterprise.menu.update', compact('menu', 'typeMenus', 'statusMenu', 'menu'));

    }


    public function postUpdate(Menu $menu, MenuRequest $request)
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
