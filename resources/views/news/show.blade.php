@extends('layout')

@section('content')
<h1>show news</h1>
<p>{{ $news->id }}</p>

<p>{{ $news->title }}</p>
<p>{{ $news->description }}</p>
<p>{{ $news->active }}</p>
@endsection