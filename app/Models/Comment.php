<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
	use HasFactory;

	protected $fillable = [  // что можно заполнять
		'author',
		'comment',
	];

	public function post()
	{
		return $this->belongsTo(Post::class);
	}

}