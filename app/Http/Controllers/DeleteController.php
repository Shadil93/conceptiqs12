<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portfolio;
class DeleteController extends Controller
{
    //
    
public function delete($id)
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
