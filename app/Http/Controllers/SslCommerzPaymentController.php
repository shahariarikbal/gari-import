<?php

namespace App\Http\Controllers;

use App\ChassisUrl;
use App\OnlinePayment;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use Validator;

class SslCommerzPaymentController extends Controller
{

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
        $data = $request->all();
        $tran_id = time().uniqid();
        if ($request->has('amount')){
            $validator = Validator::make($data, [
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|string|max:255',
                'customer_mobile' => 'required|string|max:15',
                'description' => 'required|string|max:400',
                'amount' => 'required|numeric|between:1,99999999.99',
            ]);
            if ($validator->fails()) {
                Toastr::warning('Input something went wrong, Please try again!!', 'Error!!');
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $amount = $request->amount;
        }else{
            $validator = Validator::make($data, [
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|string|max:255',
                'customer_mobile' => 'required|string|max:15',
            ]);
            if ($validator->fails()) {
                Toastr::warning('Input something went wrong, Please try again!!', 'Error!!');
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $amount = 900;
            $paymentType = "chassis";
        }
        $post_data = array();
        $post_data['total_amount'] = $amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $tran_id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->customer_name;
        $post_data['cus_email'] = $request->customer_email;
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->customer_mobile;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = OnlinePayment::where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name'           => $post_data['cus_name'],
                'email'          => $post_data['cus_email'],
                'mobile'         => $post_data['cus_phone'],
                'amount'         => $post_data['total_amount'],
                'description'    => $request->description,
                'payment_type'   => isset($paymentType) ? $paymentType : "online",
                'status'         => 'Pending',
                'address'        => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency'       => $post_data['currency'],
            ]);

        if (!empty($update_product) && $request->has('chassis_url')){
            ChassisUrl::create([
                'transaction_id' => $tran_id,
                'url' => $request->chassis_url,
            ]);
        }

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }


    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = OnlinePayment::where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $validation = $sslc->orderValidate($tran_id, $amount, $currency, $request->all());

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = OnlinePayment::where('transaction_id', $tran_id)->update(['status' => 'success']);
                $lastPayment = OnlinePayment::where('transaction_id', $tran_id)->first();

                if ($lastPayment->payment_type == 'chassis'){
                    $getChassisUrl = ChassisUrl::where('transaction_id', $tran_id)->first();
                    session([
                        'payment_id' => $lastPayment->id,
                        'cus_name' => $lastPayment->name,
                        'cus_email' => $lastPayment->email,
                    ]);

                    chassisRedirectUrl($getChassisUrl->url);
                }else{
                    return redirect('payment-success');
                }

            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = OnlinePayment::where('transaction_id', $tran_id)->update(['status' => 'Failed']);
                return redirect('payment-error');
            }
        } else if ($order_detials->status == 'success' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            return redirect('payment-success');
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            return redirect('payment-error');
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = OnlinePayment::where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = OnlinePayment::where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            return redirect('payment-error');
        } else if ($order_detials->status == 'success' || $order_detials->status == 'Complete') {
            return redirect('payment-success');
        } else {
            return redirect('payment-error');
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = OnlinePayment::where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = OnlinePayment::where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            return redirect('payment-error');
        } else if ($order_detials->status == 'success' || $order_detials->status == 'Complete') {
            return redirect('payment-success');
        } else {
            return redirect('payment-error');
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = OnlinePayment::where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($tran_id, $order_details->amount, $order_details->currency, $request->all());
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = OnlinePayment::where('transaction_id', $tran_id)
                        ->update(['status' => 'success']);

                    return redirect('payment-success');
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = OnlinePayment::where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    return redirect('payment-error');
                }

            } else if ($order_details->status == 'success' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                return redirect('payment-success');
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                return redirect('payment-error');
            }
        } else {
            return redirect('payment-error');
        }
    }


}
