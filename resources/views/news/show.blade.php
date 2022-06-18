@extends('layout')

@section('content')
<h1>show news: <span class="badge bg-secondary">{{ $news->id }}</span></h1>
<a href="{{ route('news.index') }}" class="btn btn-primary" title="Back">Back</a>

<p><span class="badge rounded-pill bg-secondary">{{ $category->title }}<span class="badge rounded-pill bg-secondary"></p>
<p>{{ $news->title }}</p>
<p>{{ $news->description }}</p>
<p>@if($news->active) Active @else Inactive @endif</p>
<p>viewed <span class="badge bg-secondary">{{$news->viewed_count}}</span> times (from cash)</p>
@endsection