<?php
/*
* @created 13/03/2020 - 9:35 PM
* @author flippy
*/

namespace App\Models;


use App\Http\Requests\CheckoutRequest;
use App\Http\Services\PriceWithDiscount;

class Orders
{
    private $table = 'orders';
    private $tableDetails = 'order_details';

    public function addNewOrder() {
        return \DB::table($this->table)
            ->insertGetId([
                'id_user' => session('user')->id_user,
                'created_at' => date("Y-m-d H-i-s", time()),
                'active' => 0
            ]);
    }

    public function addToOrderDetails(CheckoutRequest $request, $id) {
//        dd($request->input('products'));
        foreach ($request->input('products') as $prod) {
            $price_with_discount = PriceWithDiscount::price_with_discount($prod['id']);
            \DB::table($this->tableDetails)
                ->insert([
                    'id_order' => $id,
                    'id_game' => $prod['id'],
                    'quantity' => $prod['quantity'],
                    'price_with_discount' => $price_with_discount
                ]);
        }
    }

}
