<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{
    public function index() {
        $cat = Categories::all();
        return view('admin.addCategories', [
            'categories' => $cat
        ]);
    }

    public function create() {

        return view('admin.createCategory');
    }

    public function store(CategoriesRequest $request, Categories $category) {
        $request->validated();
        $category->fill($request->all())->save();
        return redirect()->route('admin.categories.show')->with('success', 'Категория добавлена');
    }

    public function update(CategoriesRequest $request, $id) {
        $request->validated();

        Categories::where('id', $id)->
            update(['title' => $request->title, 'slug' => $request->slug]);

        return redirect()->route('admin.categories.show')->with('success', 'Категория изменена');
    }

    public function destroy($category) {
        Categories::destroy($category);
        return redirect()->route('admin.categories.show')->with('success', 'Категория удалена');
    }
}
