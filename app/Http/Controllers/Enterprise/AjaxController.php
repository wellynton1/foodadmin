<?php

namespace App\Http\Controllers\Enterprise;

use App\Services\Enterprise\AccompanyingService;
use App\Services\Enterprise\FeedstockService;
use App\Services\Enterprise\MenuService;
use App\Services\Enterprise\ProteinService;
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
    public function __construct(FeedstockService $feedstockService, UserService $userService,
                                MenuService $menuService, AccompanyingService $accompanyingService,
                                ProteinService $proteinService)
    {
        $this->menuService = $menuService;
        $this->feedstockService = $feedstockService;
        $this->userService = $userService;
        $this->accompanyingService = $accompanyingService;
        $this->proteinService = $proteinService;
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
