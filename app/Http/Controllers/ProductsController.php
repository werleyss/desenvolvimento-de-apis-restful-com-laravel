<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductsRequest as Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    private $item;

    public function __construct(Product $item)
    {
        $this->item = $item;
    }

    public function index()
    {
        $minutes = \Carbon\Carbon::now()->addMinutes(1);
        $products = \Cache::remember('api::product', $minutes, function () {
            return $this->item::all();
        });
        return $products;
    }

    public function store(Request $request)
    {
        \Cache::forget('api::product');
        $dataForm = $request->all();
        $dataForm['user_id'] = Auth::user()->id;
        return $this->item::create($dataForm);
    }

    public function show($id)
    {
        return $this->item::findOrFail($id);
    }

    public function update(Request $request)
    {
            \Cache::forget('api::product');
            $this->item->update($request->all());
            return $this->item;
    }

    public function destroy($id)
    {
        $this->authorize('delete', $this->item->find($id));
        \Cache::forget('api::product');
        $this->item->delete();
        return $this->item;
    }


}
