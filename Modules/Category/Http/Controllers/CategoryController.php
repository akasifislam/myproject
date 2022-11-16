<?php

namespace Modules\Category\Http\Controllers;

use App\Actions\Category\CreateCategory;
use App\Actions\Category\DeleteCategory;
use App\Actions\Category\SortingCategory;
use App\Actions\Category\UpdateCategory;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Modules\Category\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::oldest('order')->get();

        return view('category::category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryFormRequest $request
     * @return Renderable
     */
    public function store(CategoryFormRequest $request)
    {
        try {
            $category = CreateCategory::create($request);

            if ($category) {
                flashSuccess('Category Added Successfully');
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Category $category)
    {
        return view('category::category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryFormRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        try {
            $category = UpdateCategory::update($request, $category);

            if ($category) {
                flashSuccess('Category Updated Successfully');
                return redirect(route('module.category.index'));
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Category $category)
    {
        try {
            $category = DeleteCategory::delete($category);

            if ($category) {
                flashSuccess('Category Deleted Successfully');
                return back();
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function updateOrder(Request $request)
    {
        try {
            $category = SortingCategory::sort($request);

            if ($category) {
                return response()->json(['message' => 'Category Sorted Successfully!']);
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
