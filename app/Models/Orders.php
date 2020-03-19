<?php
/*
* @created 13/03/2020 - 9:35 PM
* @author flippy
*/

namespace App\Models;


use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\OrderIdRequest;
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

    public function getAllWithPagination() {
        return \DB::table($this->table)->orderBy('created_at', 'DESC')->paginate();
    }
    public function getAllWithPaginationForSingleUser() {
        return \DB::table($this->table)->where('id_user', '=', session('user')->id_user)
            ->orderBy('created_at', 'DESC')->paginate();
    }

    public function getOrder($id) {
        return \DB::table($this->table)
            ->join($this->tableDetails, $this->table.'.id_order', '=', $this->tableDetails. '.id_order')
            ->select('id_game', 'quantity', 'price_with_discount')
            ->where($this->table.'.id_order', '=', $id)
            ->get();
    }
    public function getOrderActive($id) {
        return \DB::table($this->table)->where([
            'id_order' => $id
        ])
            ->select('active')->first();
    }

    public function getUserMail(OrderIdRequest $request) {
        return \DB::table($this->table)
            ->join('users', $this->table . '.id_user', '=', 'users.id_user')
            ->where('id_order', '=', $request->input('id_order'))
            ->select('email')
            ->first();
    }
    public function orderDetailsForMail($id) {
        return \DB::table($this->table)
            ->join($this->tableDetails, $this->table.'.id_order', '=', $this->tableDetails. '.id_order')
            ->join('games', $this->tableDetails.'.id_game', '=', 'games.id_game')
            ->select('games.id_game', 'quantity', 'price_with_discount', 'game_name')
            ->where($this->table.'.id_order', '=', $id)
            ->get();
    }

    public function declineOrder(OrderIdRequest $request) {
        \DB::table($this->table)
            ->where('id_order', '=', $request->input('id_order'))
            ->update(['active' => 2]);
    }

    public function confirmOrder(OrderIdRequest $request) {
        \DB::table($this->table)
            ->where('id_order', '=', $request->input('id_order'))
            ->update(['active' => 1]);
    }

}
