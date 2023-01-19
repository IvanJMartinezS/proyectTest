<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    //Tag Name
    protected $fillable = [
        'name'
    ];

    //Tag Name -> lowercase and Slug
    public function getSlugAttribute(){
        return Str::slug($this->name, '-');
    }
}
