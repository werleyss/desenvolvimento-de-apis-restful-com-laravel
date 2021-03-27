<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductsRequest as Request;

class ProductsController extends Controller
{
    private $item;

    public function __construct(Product $item)
    {
        $this->item = $item;
    }

    public function index()
    {
        return $this->item::all();
    }

    public function store(Request $request)
    {
        return $this->item::create($request->all());
    }

    public function show($id)
    {
        return $this->item::findOrFail($id);
    }

    public function update(Request $request)
    {
            $this->item->update($request->all());
            return $this->item;
    }

    public function destroy($id)
    {
        $this->item->delete();
        return $this->item;
    }


}
