<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
    }

    public function update(Request $request)
    {
            $this->item->update($request->all());
            return $this->item;
    }

    public function destroy($id)
    {

    }


}
