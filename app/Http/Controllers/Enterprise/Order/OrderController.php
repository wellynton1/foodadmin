<?php

namespace App\Http\Controllers\Enterprise\Order;

use App\Http\Requests\Enterprise\OrderRequest;
use App\Services\Customer\OrderService;
use App\Services\Enterprise\OrderMenuService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    private $orderService;
    private $orderMenuService;
    public function __construct(OrderService $orderService, OrderMenuService $orderMenuService)
    {
      $this->orderService = $orderService;
      $this->orderMenuService = $orderMenuService;
    }

    public function getCreate()
    {
        return view('enterprise.order.create');
    }

    public function postCreate(OrderRequest $request)
    {

        DB::transaction(function () use($request){

            $request->merge(['status_order_id' => 1]);

            $order = $this->orderService->create($request
                ->only('status_order_id','date_delivery', 'descount', 'customer_id', 'customer_address_id', 'delivery_schedule', 'value_total_sale', 'observation'));

            $request->merge(['order_id' => $order->id]);

            foreach ($request->menus as $menu) {

                $request->merge(['menu_id' => $menu['id']]);

             for($i = 0; $i<=$menu['amount']; $i++){

                 $this->orderMenuService->create($request->only('order_id', 'menu_id'));

             }

            }

        });


    }
}
