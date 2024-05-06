<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function index()
    {
        
        $order = Order::all();

        return view('order.index', compact('order'));
    }


    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            //'orderid' => 'required',
            'customerid' => 'required',
            'orderdate' => 'required',
            'freight' => 'required',  
            'shipname' => 'required', 
            'shipcountry' => 'required'  
        ]);

        $order = new Order;
        //$order->OrderID = $request->input('orderid');
        $order->CustomerID = $request->input('customerid');
        $order->OrderDate = $request->input('orderdate');
        $order->Freight = $request->input('freight');
        $order->ShipName = $request->input('shipname');
        $order->ShipCountry = $request->input('shipcountry');


        $order->save();
        //Customer::create($request->all());

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $CustomerID)
    {
        //
        $order = Order::where('CustomerID', $CustomerID)->get();

        //$order = Order::findOrFail($CustomerID);

        return view('order.show' , compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $OrderID)
    {
        //
        $order = Order::findOrFail($OrderID);

        return view('order.edit' , compact('order'));

 
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'orderid' => 'required',
            'customerid' => 'required',
            'orderdate' => 'required',
            'freight' => 'required',  
            'shipname' => 'required', 
            'shipcountry' => 'required'  
        ]);

        $order = Order::findOrFail($id);

        //$customer->update($request->all());
        
        $order->OrderID = $request->input('orderid');
        $order->CustomerID = $request->input('customerid');
        $order->OrderDate = $request->input('orderdate');
        $order->Freight = $request->input('freight');
        $order->ShipName = $request->input('shipname');
        $order->ShipCountry = $request->input('shipcountry');


        $order->save();
        
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        $order->details()->delete();
        $order->delete();
        return redirect()->route('order.index');
    }
}
