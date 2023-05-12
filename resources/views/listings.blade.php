@extends('layout')

@section('content')
<h1>
    {{ $heading }}
</h1>
@if (count($listings) == 0)
<p>No listings found</p>
@endif
@foreach ($listings as $listing)
<h2>
    <a href="/listings/{{$listing['id']}}">{{ $listing['title'] }}</a>
</h2>
<p>
    {{ $listing['tags'] }}
</p>
<p>
    {{ $listing['company'] }}
</p>
<p>
    {{ $listing['location'] }}
</p>
<p>
    {{ $listing['email'] }}
</p>
<p>
    {{ $listing['website'] }}
</p>
<p>
    {{ $listing['description'] }}
</p>
@endforeach
@endsection