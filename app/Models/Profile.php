<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profileImage()
    {
        $path = ($this->image) ? $this->image : 'profile/tlaUl29Y2Uk0CqUS9foz3wOHYStIMS33clPnEJtn.png';
        return '/storage/'. $path;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
