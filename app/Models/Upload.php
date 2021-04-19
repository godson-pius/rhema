<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'minister',
        'url',
        'image',
        'tag',
        'title',
        'user_id'
    ];

    public function uploadedBy($id)
    {
        return User::find($id);
    }

    public function totalUpload($id)
    {
        return Upload::where('user_id', $id);
    }
}
