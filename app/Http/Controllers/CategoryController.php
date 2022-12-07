<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryIndexResource;
use App\Http\Resources\Category\CategoryShowResource;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);

        // return CategoryIndexResource::collection($categories);

        if ($categories) {
            return new CategoryCollection($categories);
        }

        return response()->json(['message' => 'categories data not found', 'status' => false], 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = auth()
            ->user()
            ->categories()
            ->create($this->categoryStore($request));

        if ($category) {
            return response()->json([
                'success' => true,
                'data' => $category->toArray()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not added'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryShowResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = auth()->user()->categories()->find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 400);
        }

        $updated = $category->update($this->categoryStore($request));

        if ($updated) {
            return response()->json([
                'success' => true,
                'data' => $category->toArray()
            ], 400);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post can not be updated'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = auth()->user()->categories()->find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 400);
        }

        if ($category->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Category successfully deleted'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category can not be deleted'
            ], 500);
        }
    }

    public function categoryStore(CategoryRequest $request)
    {
        return [
            'name' => $request->name,
        ];
    }

    public function with($request)
    {
        return ['status' => 'success'];
    }
}
