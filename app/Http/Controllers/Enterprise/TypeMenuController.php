<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Requests\Enterprise\TypeMenuRequest;
use App\Models\Enterprise\TypeMenu;
use App\Services\Enterprise\TypeMenuService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeMenuController extends Controller
{

    private $typeMenuService;

    public function __construct(TypeMenuService $typeMenuService)
    {
        $this->typeMenuService = $typeMenuService;
    }

    public function getCreate()
    {

    return view('enterprise.typeMenu.create');

    }

    public function postCreate(TypeMenuRequest $request)
    {

      $this->typeMenuService->create($request);

      return redirect()->route('enterprise.typemenu.list.get')->with(['status' => 'Tipo cardápio cadastrado com sucesso!']);

    }

    public function getUpdate(TypeMenu $typeMenu)
    {

        return view('enterprise.typeMenu.update', compact('typeMenu'));

    }


    public function postUpdate(TypeMenu $typeMenu, Request $request)
    {

        $this->typeMenuService->update($typeMenu->id, $request);

        return redirect()->route('enterprise.typemenu.list.get')->with(['status' => 'Tipo cardápio editado com sucesso!']);

    }

    public function getList(Request $request)
    {

        $data = $this->typeMenuService->get();

        $typeMenus = $data->when($request->name, function ($q) use($request){
            $q->where('name', 'like', '%'.$request->name.'%');
        })->paginate();

        return view('enterprise.typeMenu.list', compact('typeMenus'));

    }

}
