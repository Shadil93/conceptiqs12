<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    //
         public function index(){
        $blogs = Portfolio::paginate(5);
        return view('configuration.portfolio.blog',compact('blogs'));
    }

//  public function cropImageUploadAjax(Request $request) 
// {
//     try {
//         $image = $request->image;
//          \Log::info('Received image: ' . substr($image, 0, 100));
//         $image_parts = explode(";base64,", $image);
        
//         if (count($image_parts) < 2) {
//             return response()->json(['success' => false, 'message' => 'Invalid image data.'], 400);
//         }
        
//         $image_base64 = base64_decode($image_parts[1]);
//         $fileName = uniqid() . '.png';
        
//         // Use uploads directory directly in public disk
//         $path = 'uploads/' . $fileName;
        
//         // Create directory if it doesn't exist
//         if (!Storage::disk('public')->exists('uploads')) {
//             Storage::disk('public')->makeDirectory('uploads');
//         }
        
//         // Store the file
//         Storage::disk('public')->put($path, $image_base64);
        
//         return response()->json([
//             'success' => true,
//             'file_name' => $fileName,
//             'image_url' => asset("storage/uploads/$fileName")
//         ]);
        
//     } catch (\Exception $e) {
//         \Log::error('Crop upload failed: ' . $e->getMessage());
//         return response()->json(['success' => false, 'message' => 'Upload failed: ' . $e->getMessage()], 500);
//     }

public function cropImageUploadAjax(Request $request)
{
    try {
        $image = $request->image;

        \Log::info('Image upload started'); // Logging is fine

        $image_parts = explode(";base64,", $image);
        if (count($image_parts) < 2) {
            return response()->json(['success' => false, 'message' => 'Invalid image data.'], 400);
        }

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        $path = 'uploads/' . $fileName;

        Storage::disk('public')->put($path, $image_base64);

        return response()->json([
            'success' => true,
            'file_name' => $fileName,
            'image_url' => asset("storage/uploads/$fileName")
        ]);
    } catch (\Exception $e) {
        \Log::error('Crop upload failed: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Upload failed: ' . $e->getMessage()
        ], 500);
    }
}
public function store(Request $request)
{
  
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        // 'image' => 'required|image|max:2048',
    ]);
    $imageName = session('uploaded_image');

    if (!$imageName) {
        return back()->withErrors(['image' => 'Please upload and crop an image first.']);
    }

    $data = new Portfolio();
    $data->title = $request->title;
    $data->description = $request->description;
    $data->image = $imageName;
    $data->save();

    session()->forget('uploaded_image');

    return redirect()->route('portfolio.blog')->with('success', 'Image uploaded successfully!');
}

public function view(){
    $data = Portfolio::paginate(5);
    return view('configuration.view',compact('data'));
 }

    public function update(Request $request,$id){
         $request->validate([
     'title' => 'required|string|max:255',
'description' => 'required|string|max:255',  
    ]); 
     $portfolio = Portfolio::findOrFail($id);
     $portfolio->title = $request->title;
     $portfolio->description = $request->description;

     $newImage = session('uploaded_image'); // Check for cropped image

     if ($newImage) {
         // Delete old image if it exists
         $oldImagePath = public_path('uploads/' . $portfolio->image);
         if (File::exists($oldImagePath)) {
             File::delete($oldImagePath);
         }
         // Set the new cropped image
         $portfolio->image = $newImage;
         // Set the new cropped image
         $portfolio->image = $newImage;

         // Clear from session after using
         session()->forget('uploaded_image');
     }

     $portfolio->save();
     return redirect()->back()->with('success', 'Image updated successfully');


 }



public function destroy($id)
{
    $portfolio = Portfolio::findOrFail($id);  // Or Blog::findOrFail($id)

    // Delete image file
    $imagePath = public_path('uploads/' . $portfolio->image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete the record
    $portfolio->delete();

    return redirect()->back()->with('success', 'Image record deleted successfully.');
}

}

