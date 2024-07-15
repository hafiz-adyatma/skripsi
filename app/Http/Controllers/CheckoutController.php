<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Province;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $productFromDetail = $request->input('product');

        if ($productFromDetail) {
            $product = json_decode($productFromDetail, true);
            $cart = [$product];
        } else {
            $cart = session()->get('cart', []);
        }

        $shippingCost = 20000;

        $subtotal = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $total = $subtotal + $shippingCost;

        return view('checkout', compact('cart', 'shippingCost', 'subtotal', 'total'));
    }

    public function process(Request $request)
    {
        $cart = session()->get('cart', []);
        $shippingCost = 20000;

        $subtotal = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $total = $subtotal + $shippingCost;

        $order = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'province' => $request->province,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'notes' => $request->notes,
            'cart' => $cart,
            'shippingCost' => $shippingCost,
            'subtotal' => $subtotal,
            'total' => $total,
            'transaction_date' => date('Y-m-d'),
            'status' => 'Dikirim'
        ];

        return view('order-detail', compact('order'));
    }

    public function finish(Request $req)
    {
        $orderDetails = $req->only(['name', 'phone', 'address', 'province', 'city', 'postal_code', 'notes']);
        $cartItems = $req->input('cart', []);

        session()->forget('cart');

        $cartDetails = "";
        foreach ($cartItems as $item) {
            $cartDetails .= "Nama Produk: {$item['name']}\nHarga: Rp. " . number_format($item['price'], 0, ',', '.') . "\nJumlah: {$item['quantity']}\nWarna: {$item['color']}\n\n";
        }

        $whatsappNumber = '6289676361694';
        $message = urlencode("Halo min, aku mau order dengan detail sebagai berikut: \n\nNama: {$orderDetails['name']}\nTelepon: {$orderDetails['phone']}\nAlamat: {$orderDetails['address']}\nProvinsi: {$orderDetails['province']}\nKota: {$orderDetails['city']}\nKode Pos: {$orderDetails['postal_code']}\nCatatan: {$orderDetails['notes']}\n\n*DETAIL PESANAN:*\n\n{$cartDetails}");
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$message}";

        return redirect()->away($whatsappUrl);
    }

    public function getProvinces()
    {
        return response()->json(Province::all());
    }

    public function getCities($province_id)
    {
        return response()->json(Cities::where('id_province', $province_id)->get());
    }
}
