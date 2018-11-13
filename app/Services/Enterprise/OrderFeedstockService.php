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
    private $menuProteinService;

    public function __construct(MenuAccompanyingService $menuAccompanyingService, MenuProteinService $menuProteinService)
    {
     $this->menuAccompanyingService = $menuAccompanyingService;
     $this->menuProteinService = $menuProteinService;
    }

    public function create($idMenu, $idOrder)
    {

        $menus = $this->menuAccompanyingService->get();

        $menus = $menus->where('menu_id', $idMenu)->get();


       foreach ($menus as $menu){

           foreach ($menu->accompanying->feedstock as $accompanying)
           {
               OrderFeedstock::create([
                   'order_id' =>  $idOrder,
                   'feedstock_id' => $accompanying->feedstock_id,
                   'amount' => $accompanying->amount
               ]);
           }

       }

       $proteins = $this->menuProteinService->get();

     $proteinFeedstock =  $proteins->with('proteinFeedstock')->where('menu_id', $idMenu)->get();


        foreach ($proteinFeedstock as $proteinMenu){

            foreach ($proteinMenu->protein->feedstock as $protein)
            {
                OrderFeedstock::create([
                    'order_id' =>  $idOrder,
                    'feedstock_id' => $protein->feedstock_id,
                    'amount' => $protein->amount
                ]);
            }

        }
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