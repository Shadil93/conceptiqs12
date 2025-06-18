<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servie;
use Illuminate\Support\Facades\Storage;


class ServiesController extends Controller
{
    //
      public function index()
    {
        $data = Servie::paginate(4);
        return view('configuration.servies.index',compact('data')); // make sure this view exists
    }
    
     public function store(Request $request)
    {

        $request->validate([

            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml|max:2048',
       
        ]);
               
     
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
    
        // Store in storage/app/public/images
        $file->storeAs('public/images', $filename);
    
        // Save only relative path
        $imagePath = 'images/' . $filename;
        $image = new Servie();
        $image->title = $request->title;
        $image->description= $request->description;
        $image->image = $imagePath;
                     
        $image->save();
    
        return redirect()->route('servies.index')->with('success', 'Image has been uploaded successfully.');
    }

   public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'image' => 'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg+xml|max:2048',
    ]);

    $servie = Servie::findOrFail($id);
    $servie->title = $request->title;
    $servie->description = $request->description;

    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($servie->image && \Storage::exists('public/' . $servie->image)) {
            \Storage::delete('public/' . $servie->image);
        }

        // Upload new image
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/images', $filename);

        // Save new relative path
        $servie->image = 'images/' . $filename;
    }

    $servie->save();

    return redirect()->route('servies.index')->with('success', 'Image has been updated successfully.');
}
public function delete($id)
{
    $image = Servie::findOrFail($id);

    // Delete image file from storage
    if ($image->image && file_exists(public_path($image->image))) {
        unlink(public_path($image->image));
    }

    $image->delete();

    return redirect()->back()->with('success', 'Image record deleted successfully.');
}



}
