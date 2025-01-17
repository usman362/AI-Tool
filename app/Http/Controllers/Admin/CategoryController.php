<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $target = request()->target;
        $categories = Category::where('target', $target)
                            ->whereNull('parent_id')
                            ->get();
        return view("content.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
        return view("content.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => ['required']
			]);
		
        $excat = Category::orderby('cnt', 'desc')->first();

        if($excat){

            if($excat->cnt > 100){
                $cnt = $excat->cnt;
                $cnt++;
            }else{
                $cnt = 101;
            }

        }else{
            $cnt = 101;
        }
		
		
		$category = new Category();
		
		$category->name = $request->cat_name;
		$category->description = $request->cat_descr;
		//$category->is_yekbun = $yekbun;
		//$category->is_yahala = $yahala;
		//$category->is_facebook = $facebook;
		//$category->is_tiktok = $tiktok;
		//$category->is_insta = $insta;
		//$category->is_twitter = $twitter;
        $category->status = 1;
		$category->cnt = $cnt;
		
		$category->save();
		return redirect('/series/categories')->with('success','Category successfully created.');

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store("/categories", "public");
            $validated["image"] = $imagePath;
        }

        $category = Category::create($validated);

        return back()->with("success", "Category successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     

    public function update(Request $request, $id)
    {

       
        $request->validate([
            'cat_name' => ['required']
			]);
		
		

        
       // $validated = $request->validated();
/*
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store("/categories", "public");
            $validated["image"] = $imagePath;
        }
*/

        $category = Category::find($id);

        $category->name = $request->cat_name;
		$category->description = $request->cat_descr;
		
      //  $category->fill($validated);
        $category->save();

        return back()->with("success", "Category successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function delcat($id){
		$category = Category::find($id);
		if ($category->image)
            Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Category successfully deleted.");
	}
    public function destroy($id)
    {
        $category = Category::find($id);

        // Delete Image
        if ($category->image)
            Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Category successfully deleted.");
    }
}