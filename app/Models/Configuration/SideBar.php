<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideBar extends Model
{
    use HasFactory;
    protected $fillable=
    [
       'nav_name','url','icon','status','priority'
    ];
    
}
