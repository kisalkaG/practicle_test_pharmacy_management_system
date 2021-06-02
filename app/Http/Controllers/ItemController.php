<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function getAllItems() {
        $items = Item::all();
        return response($items,200);
    }

    public function addItem(Request $request) {
        // dd($request);
        $record = [
            "product_name" => $request->get('product_name'),
            "brand" => $request->get('brand'),
            "code" => $request->get('code'),
            "price" => $request->get('price'),
            "description" => $request->get('description'),
        ];

        $item = Item::create($record);
        return response($item,200);
    }

    public function editItem(Request $request) {
        $record = [
            "product_name" => $request->get('product_name'),
            "brand" => $request->get('brand'),
            "code" => $request->get('code'),
            "price" => $request->get('price'),
            "description" => $request->get('description'),
        ];

        $id = request()->route()->parameter('id');
        $item = Item::where('id', '=', $id)->update($record);
        return response($item,200);

    }

    public function removeItem() {
        $id = request()->route()->parameter('id');
        $item = Item::find($id)->delete();
        return response($item,200);

    }

    public function getItem() {
        $id = request()->route()->parameter('id');
        $item = Item::find($id, ['product_name', 'brand', 'code', 'price', 'description']);
        return response($item,200);
    }
}
