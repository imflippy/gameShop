<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\OrderIdRequest;
use App\Http\Services\BackWithError;
use App\Http\Services\GetGamePhotos;
use App\Http\Services\LogCatchs;
use App\Http\Services\SendMailer;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $modelOrders;
    public function __construct()
    {
        $this->modelOrders = new Orders();
    }

    public function index() {

        $orders = $this->modelOrders->getAllWithPagination();
        return view('admin.pages.orders', ['orders' => $orders]);
    }

    public function show($id) {

        $orderDetails = $this->modelOrders->getOrder($id);
        GetGamePhotos::getGamePhotos($orderDetails);
        $active = $this->modelOrders->getOrderActive($id);

//        dd($orderDetails);

        return view('admin.pages.single_order', ['id_order' => $id, 'orderDetails' => $orderDetails, 'active' => $active]);
    }

    public function confirm(OrderIdRequest $request) {
        try {
            $userMail = $this->modelOrders->getUserMail($request);
            $contentForMail = 'You order with id: '. $request->input('id_order') .' has been confirmed.';
            $orderDetails = $this->modelOrders->orderDetailsForMail($request->input('id_order'));

//            dd($orderDetails);
            foreach ($orderDetails as $od) {
                for ($i = 0; $i < $od->quantity; $i++) {
                    $contentForMail .= 'Code for ' . $od->game_name . ': '
                        . substr(sha1(rand()) . time(), 0, 4) . '-'
                        . substr(sha1(rand()) . time(), 0, 4) . '-'
                        . substr(sha1(rand()) . time(), 0, 4) . '-'
                        . substr(sha1(rand()) . time(), 0, 4) . ' ';
                }
            }

            $this->modelOrders->confirmOrder($request);
            SendMailer::sendMail('E&E Games Order', 'Sorry..', $contentForMail, $userMail->email);
            return redirect()->route('orders.index')->with('success', 'Order Confirmed');

        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'Admin\OrdersController@confirm');
            return BackWithError::backWtihError();
        }
    }

    public function decline(OrderIdRequest $request) {
        try {
            $userMail = $this->modelOrders->getUserMail($request);
            $contentForMail = 'You order with id: '. $request->input('id_order') .' has been declined.';
            $this->modelOrders->declineOrder($request);
            SendMailer::sendMail('E&E Games Order', 'Sorry..', $contentForMail, $userMail->email);
            return redirect()->route('orders.index')->with('success', 'Order Declined');

        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'Admin\OrdersController@decline');
            return BackWithError::backWtihError();         }
    }


}
