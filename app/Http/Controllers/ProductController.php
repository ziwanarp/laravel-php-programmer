<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function allProducts(Request $request){
        if($request->query('button') == "clicked"){
            $client = new Client();
            $response = $client->get('https://dummyjson.com/products?limit=10&skip=10');
            $data = json_decode($response->getBody(), true);
            $data_object = (object)$data;
            
            return view('home', [
                'products' => $data_object->products,
            ]);
        } else {
            return view('home');
        }
    }
   
    public function store(Request $request)
    { 

        $validatedData = $request->validate([
            'no_pesanan' => 'required',
            'tanggal' => 'required',
            'nm_supplier' => 'required',
            'nm_produk' => 'required',
            'total' => 'required',
        ]);

        Orders::create($validatedData);

        return redirect('/')->with('success', 'Data berhasil ditambahkan !');
    }

    public function show($id)
    {
        $client = new Client();
            $response = $client->get('https://dummyjson.com/products/'.$id);
            $data = json_decode($response->getBody(), true);
            $data_object = (object)$data;
            
            return response(json_encode(['data' => $data_object]));
    }
}
