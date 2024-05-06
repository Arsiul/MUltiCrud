<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    public function index()
    {
        
        $customer = Customer::all();

        return view('customer.index', compact('customer'));
    }


    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'companyname' => 'required',
            'address' => 'required',
            'city' => 'required',  
            'country' => 'required', 
            'phone' => 'required'  
        ]);

        $customer = new Customer;
        $customer->CustomerID = $request->input('id');
        $customer->CompanyName = $request->input('companyname');
        $customer->Address = $request->input('address');
        $customer->City = $request->input('city');
        $customer->Country = $request->input('country');
        $customer->Phone = $request->input('phone');


        $customer->save();
        //Customer::create($request->all());

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $CustomerID)
    {
        //
        $customer = Customer::findOrFail($CustomerID);
        return view('customer.edit' ,compact('customer'));

 
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id' => 'required',
            'companyname' => 'required',
            'address' => 'required',
            'city' => 'required',  
            'country' => 'required', 
            'phone' => 'required'  
        ]);

        $customer = Customer::findOrFail($id);

        //$customer->update($request->all());
        
        $customer->CustomerID = $request->input('id');
        $customer->CompanyName = $request->input('companyname');
        $customer->Address = $request->input('address');
        $customer->City = $request->input('city');
        $customer->Country = $request->input('country');
        $customer->Phone = $request->input('phone');

        $customer->save();
        
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer) {
            foreach ($customer->orders as $order) {
                $order->details()->delete();
                $order->delete();
            }
            $customer->delete();
            //return response()->json(['message' => 'Customer, their orders and order details deleted successfully.']);
            //echo "<script>alert('funciona creo')</script>";
        } else {
            //return response()->json(['message' => 'Customer not found.'], 404);
            //echo "<script>alert('no funciona')</script>";
        }


        //$customer->delete();
        return redirect()->route('customer.index');
            }
}
