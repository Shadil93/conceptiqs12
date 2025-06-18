<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;





class DatabaseController extends Controller
{
    //

    public function register(){
        return view('configuration.register');
    }



    public function cropImageUploadAjax(Request $request)
{
    $data = $request->image;
    $imageName = time() . '.png';

    $path = public_path('uploads/' . $imageName);
    $image = str_replace('data:image/png;base64,', '', $data);
    $image = str_replace(' ', '+', $image);
    file_put_contents($path, base64_decode($image));

    session(['uploaded_image' => $imageName]);

    return response()->json(['success' => true, 'filename' => $imageName]);
}

public function cropImage(Request $request)
{
   
    if ($request->has('image')) {
        $data = $request->get('image');

        // Extract the base64 image data
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        // Generate a unique filename
        $imageName = time() . '.png';

        // Save the image to storage (public folder or anywhere you need)
        file_put_contents(public_path('uploads/' . $imageName), $data);

        return response()->json(['success' => 'Image uploaded', 'image' => $imageName]);
    } else {
        return response()->json(['error' => 'No image data found'], 400);
    }
}


public function store(Request $request)
{
    $request->validate([
        'description' => 'required|string|max:255',
        'subscription' => 'required|string|max:255',
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

    return redirect()->route('blog')->with('success', 'Image uploaded successfully!');
}

public function do_register(Request $request)
{
    $request->validate([
        'description' => 'required|string|max:255',
        'subscription' => 'required|string|max:255',
        'image' => 'required|image|max:2048',
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

    return redirect()->route('blog')->with('success', 'Image uploaded successfully!');
}

public function view(){
    $data = Portfolio::paginate(5);
    return view('configuration.view',compact('data'));
 }
  
    public function edit($id)
    {
        $data = Portfolio::findOrFail($id);
        return view('configuration.edit', compact('data'));
    }
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
    //         if(File::exists($path)){
    //             File::delete($path);
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
        // $dd =Portfolio::find($id);
        // $request->validate([
        //     'image'=>"mimes:jpeg,jpg,png,gif|max:2048",
        //    ]);
       
        // $dd->description= $request->input('description');
        // $dd->subscription= $request ->input('subscription');
        // $dd->image= $request ->input('image');
        // if($request->hasFile('image')){
        //  $path = 'asset/storage/images/'.$dd->photo;
        //  if(File::exists($path)){
        //      File::delete($path);
        //  }
        //  $fileName=time().$request->file('image')->getClientOriginalName();
        //  $path=$request->file('image')->storeAs('images',$fileName,'public');
        //  $dd['image']='/storage/'.$path;
        //  $dd->image=$fileName;
        //  $dd->update();
        // }
        // $dd->update();
        // return redirect()->route('blog')->with('success',"updated success");
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
        if (\File::exists($oldImagePath)) {
            \File::delete($oldImagePath);
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
        // Find and delete the specified job listing from the database
        $job = Portfolio::findOrFail($id);
        $job->delete();

        // Redirect to the job listings index page
        return redirect()->back()->with('success', 'listing deleted successfully');
    }













// public function delete($id)
// {
//     $data = Portfolio::findOrFail($id);

//     if ($data->image) {
//         $imagePath = public_path('uploads/' . $data->image);
//         if (file_exists($imagePath)) {
//             unlink($imagePath);
//         }
//     }

//     $data->delete();

//     return redirect()->back()->with('success', 'Image deleted successfully!');
// }


//     public function delete($id)
// {
//     $data = Portfolio::findOrFail($id);
//     // Delete the image file if it exists
//     if ($data->image) {
//         $imagePath = public_path($data->image);
//         if (file_exists($imagePath)) {
//             unlink($imagePath);
//         }
//     }   
//      // Delete the portfolio item
//      $data->delete();

//     return redirect()->back()->with('success','Image Delete successfully');
//  }
}
