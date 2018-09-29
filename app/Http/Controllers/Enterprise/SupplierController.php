<?php

namespace App\Http\Controllers\Enterprise;

use App\Http\Requests\Enterprise\SupplierRequest;
use App\Models\Enterprise\Supplier;
use App\Services\Enterprise\SupplierService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    private $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function getCreate()
    {

        return view('enterprise.supplier.create');

    }

    public function postCreate(SupplierRequest $request)
    {

        $this->supplierService->create($request);

        return redirect()->route('enterprise.supplier.list.get')->with(['status' => 'Fornecedor cadastrado com sucesso!']);

    }

    public function getUpdate(Supplier $supplier)
    {

        return view('enterprise.supplier.update', compact('supplier'));

    }


    public function postUpdate(Supplier $supplier, SupplierRequest $request)
    {

        $this->supplierService->update($supplier->id, $request);

        return redirect()->route('enterprise.supplier.list.get')->with(['status' => 'Fornededor editado com sucesso!']);

    }

    public function getList(Request $request)
    {

        $data = $this->supplierService->get();

        $suppliers = $data->when($request->name, function ($q) use($request){
            $q->where('name', 'like', '%'.$request->name.'%');
        })->paginate();

        return view('enterprise.supplier.list', compact('suppliers'));

    }
}
