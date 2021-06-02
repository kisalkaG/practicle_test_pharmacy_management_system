<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function getAllCustomers() {
        $customers = Customer::all();
        return response($customers,200);   
    }

    public function addCustomer(Request $request) {        
        // dd($request->all());
        $record = [
            "name" => $request->get('name'),
            "address" => $request->get('address'),
            "phone_number" => $request->get('phone_number'),            
        ];
     
        $customer = Customer::create($record);
        return response($customer,200);          

    }

    public function updateCustomer(Request $request) {
        $record = [
            "name" => $request->get('name'),
            "address" => $request->get('address'),
            "phone_number" => $request->get('phone_number'),            
        ];

        $id = request()->route()->parameter('id');
        $customer = Customer::where('id', '=', $id)->update($record);
        return response($customer,200);
    }

    public function deleteCustomer() {
        $id = request()->route()->parameter('id');
        $customer = Customer::find($id)->delete();
        return response($customer,200);
    }

    public function getCustomer() {
        $id = request()->route()->parameter('id');
        $customer = Customer::find($id, ['name', 'address', 'phone_number']);
        return response($customer,200);

    }
}
