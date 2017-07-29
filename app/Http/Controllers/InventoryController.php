<?php

namespace App\Http\Controllers;

use App\Inventory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    public function addInventory(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'quantity' => 'required | numeric',
        ])->validate();

        $values = $request->all();

        Inventory::create($values);

        return 'Inventory Added Successfully!';

    }

    public function deleteInventory(Request $request)
    {
        Validator::make($request->all(), [
            'id' => 'required  | exists:inventories,id',
        ])->validate();

        if (Inventory::destroy($request->id)) {
            return 'Inventory Deleted';
        }
        return 'Operation failed';


    }

    public function updateInventory(Request $request)
    {

        Validator::make($request->all(), [
            'id' => 'required  | exists:inventories,id',
            'quantity' => 'numeric',

        ])->validate();




        Inventory::findOrFail($request->id)
            ->update($request->except('id'));

        return 'Inventory Updated Successfully';


    }

    public function getInventory(Request $request)
    {
        return Inventory::get();
    }
}
