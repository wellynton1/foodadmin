<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Requests\Enterprise\BrandRequest;
use App\Models\Enterprise\Brand;
use App\Services\Enterprise\BrandService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    private $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function getCreate()
    {

        return view('enterprise.brand.create');

    }

    public function postCreate(BrandRequest $request)
    {

        $this->brandService->create($request);

        return redirect()->route('enterprise.brand.list.get')->with(['status' => 'Marca cadastrado com sucesso!']);

    }

    public function getUpdate(Brand $brand)
    {

        return view('enterprise.brand.update', compact('brand'));

    }


    public function postUpdate(Brand $brand, BrandRequest $request)
    {

        $this->brandService->update($brand->id, $request);

        return redirect()->route('enterprise.brand.list.get')->with(['status' => 'Marca editada com sucesso!']);

    }

    public function getList(Request $request)
    {

        $data = $this->brandService->get();

        $brands = $data->when($request->name, function ($q) use($request){
            $q->where('name', 'like', '%'.$request->name.'%');
        })->paginate();

        return view('enterprise.brand.list', compact('brands'));

    }
}
