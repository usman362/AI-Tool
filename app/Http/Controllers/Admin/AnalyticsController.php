<?php

namespace App\Http\Controllers\Admin;

use Symfony\Component\Mime\MimeTypes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sounds;
use App\Models\Music;
use App\Models\Country;

use Symfony\Component\HttpFoundation\Response;

class AnalyticsController extends Controller
{
  public function index(Request $request)
  {

  //  dd(\Helper::translate("welcome to world" , 1));
   // $male_account = User::where('gender', '=', 'male')->count();
   // $female_account = User::where('gender', '=', 'female')->count();
//     $music=0;
// $country=0;
  //  $music = Music::count(); 
  //  $country  = Country::count();
  
  return view('content.dashboard.index');
   // return view('content.dashboard.dashboards-analytics' , compact('male_account', 'female_account', 'music' , 'country'));
  }

  public function genratvideo(){
    $categories = Sounds::get();
    return view('content.dashboard.genratvideo', compact('categories'));
  }


  public function download(){
   
    $filename = "popvide.mp4";
    $filePath = base_path('images/' . $filename);

    ob_clean();
    // Check if the file exists
    if (file_exists($filePath)) {
        // Guess the MIME type dynamically
        $mimeType = MimeTypes::getDefault()->guessMimeType($filePath);

        // If MIME type detection fails, set a default
        if (!$mimeType) {
            $mimeType = 'application/octet-stream';  // Fallback MIME type
        }

        // Set the headers for the download response
        $headers = [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        // Return the file as a download response
        return response()->file($filePath,  $headers);
    } else {
        // Return a 404 if the file doesn't exist
        abort(404, 'File not found');
    }
  }


  public function download_photo()
{

  $filename = "post.png";
    $filePath = base_path('images/' . $filename);

    
    ob_clean();
    // Check if the file exists
    if (file_exists($filePath)) {
        // Guess the MIME type dynamically
        $mimeType = MimeTypes::getDefault()->guessMimeType($filePath);

        // If MIME type detection fails, set a default
        if (!$mimeType) {
            $mimeType = 'application/octet-stream';  // Fallback MIME type
        }

        // Set the headers for the download response
        $headers = [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        // Return the file as a download response
        return response()->file($filePath,  $headers);
    } else {
        // Return a 404 if the file doesn't exist
        abort(404, 'File not found');
    }
}




  
}
