<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class NavBar extends Model
{
    // use Sluggable;
    use HasFactory;
    protected $fillable=
    [
       'side_bar_id','navbar_name','status','priority','slug','is_use','is_crud'
    ];


    public function SideBar()
    {
     return $this->belongsTo(SideBar::class, 'side_bar_id', 'id');
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'navbar_name'
    //         ]
    //     ];
    // }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->with('children');
    }

}
