<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use function React\Promise\all;

class CategoryController extends Controller
{
    public function allCat()
    {
        $categories = category::latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * @param Request $request
     */
    public function addCat(Request $request)
    {
        dump($request->all());
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],

            [
                'category_name.required' => 'Please Stop',
            ]);

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', 'category inserted successfull');
    }

    public function Edit($id){
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request, $id ){
        $update = Category::find($id)->update([
           'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('all.category')->with('success', 'category updated successfull');
    }


}
