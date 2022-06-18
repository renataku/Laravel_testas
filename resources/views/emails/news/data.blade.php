<h2>News data:</h2>

Title: {{$news->title}}<br>
Description: {{$news->description}}<br>
Status: @if($news->active) Active @else Inactive @endif