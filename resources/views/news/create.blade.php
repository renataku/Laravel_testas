@extends('layout')

@section('content')

<div class="row">
    <div class="col">
        <h1> Add new News</h1>
        <a href="{{ route('news.index') }}" class="btn btn-primary" title="Back">Back</a>

        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category:</strong>
                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="">--</option>
        
                            @foreach($categories as $category)

                                <option value="{{$category->id}}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea class="form-control" name="description" placeholder="Description">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-check">
                        <input type="checkbox" name="active" value="1" id="flexCheckChecked" class="form-check-input" @if (old('active')) checked @endif>
                        <label class="form-ccheck-label" for="flexCheckChecked">Active</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 ">

                    <div class="mb-3">
                        <label for="formFile" class="form-label"><strong>Upload</strong></label>
                        <input type="file" class="form-control" name="file" id="formFile" accept="image/png, image/jpeg">
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </div>
        </form>

    </div>
</div>

@endsection