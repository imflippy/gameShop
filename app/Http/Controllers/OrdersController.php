<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Http\Services\PriceWithDiscount;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $modelOrders;
    public function __construct()
    {
        $this->modelOrders = new Orders();
    }

    public function store(CheckoutRequest $request) {
        \DB::beginTransaction();
        try {
            $id = $this->modelOrders->addNewOrder();

            $this->modelOrders->addToOrderDetails($request, $id);


            \DB::commit();

            return response(null, 201);
        } catch (\PDOException $ex) {
            return response($ex->getMessage(), 500);
            \DB::rollBack();
        }
    }
}
