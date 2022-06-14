<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LetterCategory;
use Illuminate\Http\Request;

class LetterCategoryController extends Controller
{

    public function index()
    {
        $letterCategory = LetterCategory::all();
        return response()->json($letterCategory, 200);
    }

    public function create()
    {
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
