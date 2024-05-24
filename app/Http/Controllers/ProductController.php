<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list()
    {
        $data = Product::paginate(5);
        return response()->json($data, 200);
    }

    public function detail(Request $request)
    {
        $data = Product::find($request->id);
        return response()->json($data, 200);
    }

    public function search(Request $request)
    {
        $value = $request->keyWord ?? null;
        if ($value !== null) {
            $data = Product::where('name','like','%'.$value.'%')
                ->orWhere('description','like','%'.$value.'%')
                ->orWhere('price','like','%'.$value.'%')
                ->get();
            return response()->json($data, 200);
        }

        return response()->json("Key word is not empty", 400);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'store_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        
        Product::create($request->all());
        return response()->json("Create Product success", 201);
    }

    public function update(Request $request)
    {
        $productById = Product::find($request->id);
        $productById->store_id = $request->store_id ?? $productById->store_id;
        $productById->name = $request->name ?? $productById->name;
        $productById->description = $request->description ?? $productById->description;
        $productById->price = $request->price ?? $productById->price;
        $productById->updated_at = Carbon::now();

        $validator = Validator::make($productById->toArray(),[
            'store_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        
        $productById->save();
        return response()->json("Update Product success", 201);
    }

    public function delete(Request $request)
    {
        Product::find($request->id)->delete();
        return response()->json("Delete Product success", 200);
    }
}
