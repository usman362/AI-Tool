<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Models\Sounds;
use App\Models\Sounds_list;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class SoundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        if($_GET["test"]){
            Sounds_list::truncate();
        }

        $target = request()->target;
        $categories = Sounds::where('target', $target)
                            ->whereNull('parent_id')
                            ->get();
        return view("content.sounds.index", compact("categories"));
    }

    public function sounds_manage(){

        $sounds = Sounds_list::get();

        
        $categories = Sounds::get();
        return view("content.sounds.list", compact("sounds", "categories"));
        
    }

    public function getsounds($id){
       // $sounds = Sounds_list::where('category', $id)->get();
        $sounds = Sounds_list::where('category', $id)->with('sound')->get();

        //print_r($sounds[0]->sound->name);
        //die("");
        return response()->json([
            'success' => true,
            'data' => $sounds
        ]);
    }

    public function sounds_manage_upload(Request $request){




        $request->validate([
            'cat_name' => ['required'],
           // 'file' => 'required|mimes:mp3'
			]);
            
            $uniqueFileName = "";

            $file = $request->file('file');

            

           // if ($request->file('file') && $request->file('file')->isValid()) {
            if ($request->file('file') ) {
                
                // Get the original filename
                $originalFileName = $request->file('file')->getClientOriginalName();
    
                // Generate a unique file name using the current timestamp and a random string
                $uniqueFileName = Str::random(10) . '-' . time() . '.mp3';
    
                // Define the file path to save it in the 'images' folder at the root
                $filePath = public_path('images/sounds/' . $uniqueFileName);
    
                // Move the uploaded file to the 'images' directory
                $request->file('file')->move(public_path('images/sounds'), $uniqueFileName);
    
                
            }else{

                
                return redirect('/sounds-manage')->with('error','There is an error. Please try again later');
            }

            $excat = Sounds_list::orderby('cnt', 'desc')->first();

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
		
		$category = new Sounds_list();
		
		$category->category = $request->cat_name;
        $category->cnt = $cnt;
		
        $category->file = $uniqueFileName;
	

		$category->save();
		return redirect('/sounds-manage')->with('success','Sounds successfully created.');

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
        return view("content.sounds.create");
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
		
		
		
		$excat = Sounds::orderby('cnt', 'desc')->first();

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
		
		
		$category = new Sounds();
		
		$category->name = $request->cat_name;
		
		$category->description = $request->cat_descr;
		$category->cnt = $cnt;
        $category->status = 1;
		
		$category->save();
		return redirect('/sounds')->with('success','Sound successfully created.');

       
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
        $intro = Sounds::where('_id', $id)->first();
        if(!$intro){
            return back();
        }
        return view("content.sounds.edit", compact("intro"));
        //
    }

    public function intro_manage(){

        $categories = Sounds_list::get();
        return view("content.intros.list", compact("categories"));
        
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
		
		$category = Sounds::where('_id', $id)->first();
		
		$category->name = $request->cat_name;
		$category->description = $request->cat_descr;
		
        $category->save();
        return redirect('/sounds')->with('success','Sounds successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function delcat($id){
		$category = Sounds::find($id);
		//if ($category->image)
          //  Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Sound successfully deleted.");
	}


    public function sounds_del($id){
        $category = Sounds_list::find($id);

        // Delete Image
        //if ($category->image)
           // Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Sound successfully deleted.");
    }
    public function destroy($id)
    {
        $category = Sounds::find($id);

        // Delete Image
        //if ($category->image)
           // Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Sound Category successfully deleted.");
    }
}