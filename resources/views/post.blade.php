
@extends('layouts.app')

@section('content')

	<h1>{{$post->name}}</h1>

	<p>{{$post->date->format('d.m.Y') }}</p>

	<div>
		{{$post->content}}
	</div>

	<div>
		<hr>
		Comments: {{$post->comments->count() }}

		<hr>

		<form method="POST">
			@csrf
			<input type="hidden" name="post_id" value="{{ $post->id }}">
			<label>Author:</label>
			<br>
			@error('author')
				<div style="color: red">{{$message}}</div>
			@enderror
			<input type="text" name="author" value="{{old('author')}}">
			<br>
			<label>Comment:</label>
			<br>
			@error('comment')
				<div style="color: red">{{$message}}</div>
			@enderror
			<textarea name="comment">{{old('author')}}</textarea>
			<br>
			<button type="submit">send</button>
		</form>

		<hr>
		@foreach($post->comments()->where('...')->get() as $comment)
		Author: <b>{{$comment->author}}</b>
		<br>
		{{$comment->comment}}
		<br>
		@endforeach
	</div>

@endsection
