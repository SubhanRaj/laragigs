@extends('layout')

@section('content')
<!-- single list itme -->
<h1>
    {{$listing['title']}}
</h1>
<p>
    {{$listing['tags']}}
</p>
<p>
    {{$listing['company']}}
</p>
<p>
    {{$listing['location']}}
</p>
<p>
    {{$listing['email']}}
</p>
<p>
    {{$listing['website']}}
</p>
<p>
    {{$listing['description']}}
</p>
<!-- back to all listings -->
<a href="/">Back to all listings</a>
@endsection