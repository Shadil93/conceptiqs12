<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PortfolioController extends Controller
{
    //
      public function index(){
        $data = Portfolio::paginate(5);
        return view('configuration.portfolio.blog',compact('data'));
    }

 public function cropImageUploadAjax(Request $request) 
{
    try {
        $image = $request->image;
        $image_parts = explode(";base64,", $image);
        
        if (count($image_parts) < 2) {
            return response()->json(['success' => false, 'message' => 'Invalid image data.'], 400);
        }
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        // Use uploads directory directly in public disk
        $path = 'uploads/' . $fileName;
        
        // Create directory if it doesn't exist
        if (!Storage::disk('public')->exists('uploads')) {
            Storage::disk('public')->makeDirectory('uploads');
        }
        
        // Store the file
        Storage::disk('public')->put($path, $image_base64);
        
        return response()->json([
            'success' => true,
            'file_name' => $fileName,
            'image_url' => asset("storage/uploads/$fileName")
        ]);
        
    } catch (\Exception $e) {
        \Log::error('Crop upload failed: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Upload failed: ' . $e->getMessage()], 500);
    }
}

public function store(Request $request)
{
  
    $request->validate([
        'description' => 'required|string|max:255',
        'subscription' => 'required|string|max:255',
        // 'image' => 'required|image|max:2048',
    ]);
    $imageName = session('uploaded_image');

    if (!$imageName) {
        return back()->withErrors(['image' => 'Please upload and crop an image first.']);
    }

    $data = new Portfolio();
    $data->description = $request->description;
    $data->subscription = $request->subscription;
    $data->image = $imageName;
    $data->save();

    session()->forget('uploaded_image');

    return redirect()->route('portfolio.index')->with('success', 'Image uploaded successfully!');
}

public function view(){
    $data = Portfolio::paginate(5);
    return view('configuration.view',compact('data'));
 }
  
    // public function edit($id)
    // {
    //     $data = Portfolio::findOrFail($id);
    //     return view('configuration.edit', compact('data'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $dd =Portfolio::find($id);
    //        $request->validate([
    //         'image'=>"mimes:jpeg,jpg,png,gif|max:2048",
    //        ]);
    //        $dd->description= $request->input('description');
    //        $dd->subscription= $request ->input('subscription');
    //        if($request->hasFile('image')){
    //         $path = 'asset/storage/images/'.$dd->photo;
    //         if(/File::exists($path)){
    //             /File::delete($path);
    //         }
    //         $fileName=time().$request->file('image')->getClientOriginalName();
    //         $path=$request->file('image')->storeAs('images',$fileName,'public');
    //         $dd['image']='/storage/'.$path;
    //         $dd->image=$fileName;
    //         $dd->update();
    //        }
    //        $dd->update();

    //     return redirect()->route('view')->with('success', 'Portfolio updated successfully');
    // }
//    

    public function update(Request $request,$id){
         $request->validate([
     'description' => 'required|string|max:255',
'subscription' => 'required|string|max:255',  
    ]); 
     $portfolio = Portfolio::findOrFail($id);
     $portfolio->description = $request->description;
     $portfolio->subscription = $request->subscription;

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
// / }route('blog.index')

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
