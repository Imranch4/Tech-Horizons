<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Article extends Model
{
    use HasFactory;

    protected $attributes = [
        'title'=> 'string',
        'content'=> 'text',
        'image'=> 'string',
        'slug'=> 'string',
        'state'=> 'string',
        'theme_id' => 'required|integer|exists:themes,id',
        'magazine_id' => 'required|integer|exists:magazine,id',
    ];
    protected $table = 'articles';
    protected $fillable = ['title','content','slug','image','theme_id','magazine_id','user_id','state','is_public'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
    public function averageRating()
    {
        return $this->notes()->avg('rating');
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

}
