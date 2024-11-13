<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Intros;
use App\Models\Intros_list;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class IntrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $target = request()->target;
        $categories = Intros::where('target', $target)
                            ->whereNull('parent_id')
                            ->get();
        return view("content.intros.index", compact("categories"));
    }



    public function intro_manage(){

        $categories = Intros_list::get();
        return view("content.intros.list", compact("categories"));
        
    }

    public function intro_manage_upload(Request $request){




        $request->validate([
            'cat_name' => ['required'],
            //'file' => 'required|mimes:mp4'
			]);
            
            $uniqueFileName = "";

            $file = $request->file('file');

            

           // if ($request->file('file') && $request->file('file')->isValid()) {
            if ($request->file('file') ) {
                
                // Get the original filename
                $originalFileName = $request->file('file')->getClientOriginalName();
    
                // Generate a unique file name using the current timestamp and a random string
                $uniqueFileName = Str::random(10) . '-' . time() . '.mp4';
    
                // Define the file path to save it in the 'images' folder at the root
                $filePath = public_path('images/videos/' . $uniqueFileName);
    
                // Move the uploaded file to the 'images' directory
                $request->file('file')->move(public_path('images/videos'), $uniqueFileName);
    
                
            }else{

                
                return redirect('/intros-manage')->with('error','There is an error. Please try again later');
            }
		
		
		
		
		
		$category = new Intros_list();
		
		$category->category = $request->cat_name;
		
        $category->file = $uniqueFileName;
	

		$category->save();
		return redirect('/intros-manage')->with('success','Intros successfully created.');

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
        return view("content.intros.create");
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
		
		$facebook = 0;
		$yahala = 0;
		$tiktok = 0;
		$insta = 0;
		$twitter = 0;
		$yekbun = 0;
		
		if ($request->has('yekbun')) {
			$yekbun = 1;	
		}
		if ($request->has('yahala')) {
			$yahala = 1;	
		}
		if ($request->has('tiktok')) {
			$tiktok = 1;	
		}
		if ($request->has('facebook')) {
			$facebook = 1;	
		}
		if ($request->has('twitter')) {
			$twitter = 1;	
		}
		if ($request->has('insta')) {
			$insta = 1;	
		}
		
		
		$excat = Intros::orderby('cnt', 'desc')->first();

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
		
		
		
		
		$category = new Intros();
		
		$category->name = $request->cat_name;
		$category->is_yekbun = $yekbun;
		$category->is_yahala = $yahala;
		$category->is_facebook = $facebook;
		$category->is_tiktok = $tiktok;
		$category->is_insta = $insta;
		$category->is_twitter = $twitter;
		$category->cnt = $cnt;
        $category->status = 1;
		
		$category->save();
		return redirect('/intros')->with('success','Intros successfully created.');

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
        $intro = Intros::where('_id', $id)->first();
        if(!$intro){
            return back();
        }
        return view("content.intros.edit", compact("intro"));
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
		
		$facebook = 0;
		$yahala = 0;
		$tiktok = 0;
		$insta = 0;
		$twitter = 0;
		$yekbun = 0;
		
		if ($request->has('yekbun')) {
			$yekbun = 1;	
		}
		if ($request->has('yahala')) {
			$yahala = 1;	
		}
		if ($request->has('tiktok')) {
			$tiktok = 1;	
		}
		if ($request->has('facebook')) {
			$facebook = 1;	
		}
		if ($request->has('twitter')) {
			$twitter = 1;	
		}
		if ($request->has('insta')) {
			$insta = 1;	
		}
		
		
		
		
		$category = Intros::where('_id', $id)->first();
		
		$category->name = $request->cat_name;
		$category->is_yekbun = $yekbun;
		$category->is_yahala = $yahala;
		$category->is_facebook = $facebook;
		$category->is_tiktok = $tiktok;
		$category->is_insta = $insta;
		$category->is_twitter = $twitter;
       
        $category->save();
        return redirect('/intros')->with('success','Intros successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function delcat($id){
		$category = Intros::find($id);
		if ($category->image)
            Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Intros successfully deleted.");
	}
    public function destroy($id)
    {
        $category = Intros::find($id);

        // Delete Image
        if ($category->image)
            Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Intro successfully deleted.");
    }
}