<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 30/10/18
 * Time: 17:52
 */

namespace App\Services\Enterprise;


use App\Models\Enterprise\MenuAccompanying;
use App\Models\Enterprise\OrderFeedstock;

class OrderFeedstockService
{

    private $menuAccompanyingService;

    public function __construct(MenuAccompanyingService $menuAccompanyingService)
    {
     $this->menuAccompanyingService = $menuAccompanyingService;
    }

    public function create($idMenu, $idOrder)
    {

        $menus = $this->menuAccompanyingService->get();

        $menus = $menus->with('acompanyingFeedstock')->where('menu_id', $idMenu)->get();

       foreach ($menus as $menu){

           foreach ($menu->acompanyingFeedstock as $accompanying)
           {
               OrderFeedstock::create([
                   'order_id' =>  $idOrder,
                   'feedstock_id' => $accompanying->feedstock_id,
                   'amount' => $accompanying->amount
               ]);
           }

       }

        // OrderFeedstock::create($request->all());
    }

    public function update($id, $request)
    {
        return OrderFeedstock::find($id)->update($request->all());
    }

    public function get($request = null)
    {
        return OrderFeedstock::query();
    }


}