<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function list()
    {
        $data = Store::paginate(5);
        return response()->json($data, 200);
    }

    public function detail(Request $request)
    {
        $data = Store::find($request->id);
        return response()->json($data, 200);
    }

    public function search(Request $request)
    {
        $value = $request->keyWord ?? null;
        if ($value !== null) {
            $data = Store::where('name','like','%'.$value.'%')
                ->orWhere('location','like','%'.$value.'%')
                ->get();
            return response()->json($data, 200);
        }

        return response()->json("Key word is not empty", 400);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|integer',
            'name' => 'required|string',
            'location' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        
        Store::create($request->all());
        return response()->json("Create store success", 201);
    }

    public function update(Request $request)
    {
        $storeById = Store::find($request->id);
        $storeById->user_id = $request->user_id ?? $storeById->user_id;
        $storeById->name = $request->name ?? $storeById->name;
        $storeById->location = $request->location ?? $storeById->location;
        $storeById->updated_at = Carbon::now();

        $validator = Validator::make($storeById->toArray(),[
            'user_id' => 'required|integer',
            'name' => 'required|string',
            'location' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 404);
        }
        
        $storeById->save();
        return response()->json("Update store success", 201);
    }

    public function delete(Request $request)
    {
        Store::find($request->id)->delete();
        return response()->json("Delete store success", 200);
    }
}
