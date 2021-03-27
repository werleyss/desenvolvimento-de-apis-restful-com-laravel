<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $item;

    public function __construct(User $item)
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
        return $this->item->findOrFail($id);
    }

    public function update(Request $request, $id)
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
