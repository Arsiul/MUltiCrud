<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class OrderDtController extends Controller
{
    //
    public function index()
    {
        $orderdt = Orderdetail::where('OrderID', '10248')->get();
        //$orderdt = Orderdetail::findOrFail('10248');
        foreach($orderdt as $orderdt){
        echo "<h1>($orderdt->OrderID)</h1>";
        echo "<h1>($orderdt->ProductID)</h1>";
        echo "<h1>($orderdt->UnitPrice)</h1>";
        echo "<h1>($orderdt->Quantity)</h1>";
        echo "<h1>($orderdt->Discount)</h1>";
        }        
        //return view('orderdt.index' ,compact('orderdt'));

        //return view('orderdt.index', compact('orderdt'));
    }


    public function create()
    {
        // DERIVADA
    }
    public function crear($ID)
    {
        
        return view('orderdt.create', compact('ID'));
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'orderid' => 'required',
            'productid' => 'required',
            'unitprice' => 'required',
            'quantity' => 'required',  
            'discount' => 'required', 
        ]);

        $orderdt = new Orderdetail();
        $orderdt->OrderID = $request->input('orderid');
        $orderdt->ProductID = $request->input('productid');
        $orderdt->UnitPrice = $request->input('unitprice');
        $orderdt->Quantity = $request->input('quantity');
        $orderdt->Discount = $request->input('discount');


        $orderdt->save();

        $ID =  $request->input('orderid');
        //$ID = $orderdt->OrderID;
        //Customer::create($request->all());
        //echo "<script>alert($ID)</script>";
        return redirect()->route('orderdetail.show', $ID);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $OrderID)
    {
        //
        $ID = $OrderID;
        $orderdt = Orderdetail::where('OrderID', $OrderID)->get();
        return view('orderdt.index' , compact('orderdt','ID'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $OrderID)
    {



 
        
    }
    public function edits(string $OrderID, string $ProductID)
    {
        //
        $orderdt = Orderdetail::where('OrderID', $OrderID)
        ->where('ProductID', $ProductID)
        ->first();
    


        //echo "<script>alert($orderdt->OrderID)</script>";
        //echo "<script>alert($orderdt->ProductID)</script>";

        return view('orderdt.edit' ,compact('orderdt'));

 
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'orderid' => 'required',
            'productid' => 'required',
            'unitprice' => 'required',
            'quantity' => 'required',  
            'discount' => 'required', 
        ]);

        $orderdt = Orderdetail::findOrFail($id);

        //$customer->update($request->all());
        
        $orderdt->OrderID = $request->input('orderid');
        $orderdt->ProductID = $request->input('productid');
        $orderdt->UnitPrice = $request->input('unitprice');
        $orderdt->Quantity = $request->input('quantity');
        $orderdt->Discount = $request->input('discount');

        $orderdt->save();
        
        return redirect()->route('order.index');
    }



    public function updates(Request $request, string $OrderID, String $ProductID)
    {

        //$customer->update($request->all());



        Orderdetail::where('OrderID', $OrderID)
        ->where('ProductID', $ProductID)
        ->update([
        'UnitPrice' => $request->input('unitprice'),
        'Quantity' => $request->input('quantity'),
        'Discount' => $request->input('discount')
    ]);
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $OrderID, string $ProductID)
    {

        //echo "<script>alert($OrderID)</script>";
        //echo "<script>alert($ProductID)</script>";
        
        /*$orderdt = Orderdetail::where('OrderID', $OrderID)->delete()
        ->where('ProductID', $ProductID)
        ->first();
        
            /*echo $orderdt->OrderID;    
            echo $orderdt->ProductID;    
            echo $orderdt->UnitPrice;    
            echo $orderdt->Quantity;    
            echo $orderdt->Discount;
            echo "-----------------";    
        
        echo "FIN";

        $orderdt->delete();
        return redirect()->route('order.index');

*/

        Orderdetail::where('OrderID', $OrderID)
        ->where('ProductID', $ProductID)
        ->delete();

        return redirect()->route('order.index');
    }
}
