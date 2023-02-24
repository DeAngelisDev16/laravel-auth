@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card p-3">
        <h2>{{$project->title}}</h2>
        <img src="{{asset('storage/'. $project->image)}}" alt="placeholder">
        <pre>{{$project->github_reference}}</pre>
        <p>{{$project->description}}</p>


    </div>


    
    
</div>
@endsection