<?php

namespace App\Http\Controllers\Enterprise\Reports\Sale;

use App\Services\Customer\OrderService;
use App\Services\Enterprise\OrderFeedstockService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use PDF;
class SaleController extends Controller
{
    private $orderService;
    private $orderFeedstockService;
    public function __construct(OrderService $orderService, OrderFeedstockService $orderFeedstockService)
    {
        $this->orderService = $orderService;
        $this->orderFeedstockService = $orderFeedstockService;
    }

    public function getSaleTodo()
    {
        $feedstocks = [];
        $date_delivery =  0;
        return view('enterprise.reports.sale.to_do', compact('feedstocks', 'date_delivery'));
    }

    public function getFindSaleTodo(Request $request)
    {
        $this->validate($request, ['date_delivery' => 'required'], ['date_delivery.required' => 'O campo data de entrega é obrigatório!']);

        $date_delivery = Carbon::createFromFormat('d/m/Y', $request->date_delivery)->format('Y-m-d');

        $feedstocks = $this->getReportsSaleTodo($date_delivery);

        return view('enterprise.reports.sale.to_do', compact('feedstocks', 'date_delivery'));

    }

    public function getSaleTodoPdf($date_delivery)
    {
        $feedstocks = $this->getReportsSaleTodo($date_delivery);

        $pdf = PDF::loadView('enterprise.reports.sale.pdf.to_do_pdf', ['feedstocks' => $feedstocks]);

        return $pdf->download('relatorio.pdf');

    }

    public function getReportsSaleTodo($date_delivery)
    {

        $orders = $this->orderService->get();

        $orders = $orders->whereDate('date_delivery', $date_delivery)->pluck('id');

        $feedstocks = $this->orderFeedstockService->get();

       return $feedstocks = $feedstocks->whereIn('order_id', $orders)
            ->with('feedstock', 'feedstock.unitOfMeasurement')
            ->select(DB::raw('sum(amount) as feedstock_amount, feedstock_id'))
            ->groupBy('feedstock_id')
            ->get();

    }




}
