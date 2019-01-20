<?php

namespace App\Http\Controllers\Enterprise;

use App\Services\Enterprise\AccompanyingService;
use App\Services\Enterprise\FeedstockService;
use App\Services\Enterprise\MenuService;
use App\Services\Enterprise\ProteinService;
use App\Services\Enterprise\StatusMenuService;
use App\Services\Enterprise\TypeMenuService;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AjaxController extends Controller
{
    private $feedstockService;
    private $userService;
    private $menuService;
    private $accompanyingService;
    private $proteinService;
    private $typeMenuService;
    private $statusMenuService;
    public function __construct(FeedstockService $feedstockService, UserService $userService,
                                MenuService $menuService, AccompanyingService $accompanyingService,
                                ProteinService $proteinService,
                                TypeMenuService $typeMenuService,
                                StatusMenuService $statusMenuService)
    {
        $this->menuService = $menuService;
        $this->feedstockService = $feedstockService;
        $this->userService = $userService;
        $this->accompanyingService = $accompanyingService;
        $this->proteinService = $proteinService;
        $this->typeMenuService = $typeMenuService;
        $this->statusMenuService = $statusMenuService;
    }

    public function getStatusMenuAjax()
    {
        $statusMenu = $this->statusMenuService->get();

        return response()->json($statusMenu->orderBy('name')->get());
    }

    public function getTypeMenuAjax()
    {
        $typeMeus = $this->typeMenuService->get();

        return response()->json($typeMeus->orderBy('name')->get());
    }

    public function getFeedstockListAjax()
    {
        $feedstocks = $this->feedstockService->get();

        return response()->json($feedstocks->with('unitOfMeasurement')->OrderBy('name')->get());
    }

    public function getCustomerListAjax(Request $request)
    {
        $customers = $this->userService->get();

        return response()->json($customers->has('customer')->with('customer.addressesCustomer.address')
            ->where('name', 'like', '%'.$request->q.'%')
            ->get());
    }

    public function getMenuListAjax(Request $request)
    {
        $menus = $this->menuService->get();

        return response()->json($menus->where('name', 'like', '%'.$request->q.'%')
            ->with('menuAccompanying.accompanying.feedstock', 'menuProtein.protein.feedstock')->get());
    }

    public function getAccompanyingListAjax(Request $request)
    {
        $accompanyingService = $this->accompanyingService->get();

        return response()->json($accompanyingService->where('name', 'like', '%'.$request->q.'%')->get());
    }

    public function getProteinListAjax(Request $request)
    {
        $proteinService = $this->proteinService->get();

        return response()->json($proteinService->where('name', 'like', '%'.$request->q.'%')->get());
    }
}
