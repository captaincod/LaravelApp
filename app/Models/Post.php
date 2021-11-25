<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
	use HasFactory;

	protected $casts = [
		'date'  => 'date',
	];

	//protected $guarded  -  какие не надо запомнять

	protected $fillable = [  // что можно заполнять
		'name',
		'content',
		'slug',
		'date'
	];

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function getUrlAttribute()
	{
		return route('post',$this->slug);
	}

}