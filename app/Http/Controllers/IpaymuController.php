<?php

namespace App\Http\Controllers;

use App\Models\Migrasi\restaurantMigrasi;
use Illuminate\Http\Request;

class IpaymuController extends Controller
{
    private function generateSignature($body = [], $method = 'POST')
    {
        $va = env('IPAYMU_VA');
        $secret = env('IPAYMU_KEY');
        $method = strtoupper($method);

        $jsonBody = json_encode($body, JSON_UNESCAPED_SLASHES);
        $requestBody = strtolower(hash('sha256', $jsonBody));
        $stringToSign = "$method:$va:$requestBody:$secret";
        return hash_hmac('sha256', $stringToSign, $secret);
    }
    public function serveTable(Request $request)
    {
        // BOOK TABLE
        $user = activeUser();
        $id = $request->restaurant_id;
        $restaurant = restaurantMigrasi::find($id);
        // dd($restaurant->full_name);
        $table_number = $request->table_number;
        $reservation_date = $request->reservation_date;
        $reservation_time = $request->reservation_time;
        //Request Body//
        $body['product']    = array($restaurant->full_name);
        $body['qty']        = array('1');
        $body['price']      = array($restaurant->price);
        $body['returnUrl']  = 'http://localhost:8000/customer/explore';
        $body['cancelUrl']  = 'http://localhost:8000/customer/explore';
        $body['notifyUrl']  = 'https://your-website.com/callback-url';
        $body['buyerName'] = $user->full_name;
        $body['buyerPhone'] = $user->phone;
        $body['buyerEmail'] = $user->email;
        $body['referenceId'] = '1234'; //your reference id
        $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.ipaymu.com/api/v2/payment',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonBody,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'signature:' . $this->generateSignature($body),
                'va:' . env('IPAYMU_VA'),
                'timestamp:' . Date('YmdHis')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        // $response = $response->Data;
        $response = json_decode($response);
        // dd($response);
        return redirect($response->Data->Url);
    }
}
