<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return CustomerResource::collection($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required'
        ]);

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->number = $request->input('number');
        $customer->email = $request->input('email');

        $customer->save();

        return response()->json(['success' => 'Customer Added Successfully'], 202);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required'
          ]);

        $customer = Customer::find($id);
        $customer->name = $request->input('name');
        $customer->number = $request->input('number');
        $customer->email = $request->input('email');

        $customer->save();

        return response()->json(['success' => 'Customer Updated Successfully'], 202);
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json(['success' => 'Customer Deleted Successfully'], 202);

    }
}
