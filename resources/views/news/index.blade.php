@extends('layout')

@section('content')
<div class="row">
    <div class="col">
        <h1>News</h1>
        <a href="{{ route('news.create')}}" title="New News" class="btn btn-primary">Add News</a>
    </div>
</div>
@if ($message=Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="row">
    @foreach($news as $new)
    <div class="card" style="width: 26rem;">
        @if($new->file)
        <img src="{{ asset($new->file) }}" class="card-img-top">
        @endif
        <div class="card-body">
            <p class="card-text">{{ $new->id }}</p>
            <p class="card-text">{{ $new->category->title }}</p>
          <h5 class="card-title">{{ $new->title }}</h5>
          <p class="card-text">{{ $new->description }}</p>
          <p class="card-text">@if($new->active) Active @else Inactive @endif</p>
          <form action="{{ route('news.destroy', $new->id) }}" method="POST">
            <a href="{{ route('news.show', $new->id) }}" class="btn btn-primary">Show</a>
            @csrf
            @method('DELETE')
            <a href="{{ route('news.edit', $new->id) }}" class="btn btn-primary">Edit</a>
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>
        </div>
    </div>
    @endforeach
    
</div>


{{$news->withQueryString()->links()}}

@endsection