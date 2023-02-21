@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>
        Fill the following form to add a new project:
    </h3>
    <form action="{{route('admin.projects.store')}}">
        <div class="mb-3">
          
          <input type="text" class="form-control" placeholder="Add project title" name="title" value="{{old('title')}}" >
          
        </div>
        <div class="mb-3">
          
          <input type="text" class="form-control" placeholder="Add project reference" name="github_reference" value="{{old('github_reference')}}" >
        </div>
        <div class="mb-3">
          
            <input type="text" class="form-control" placeholder="Add project description" name="description" value="{{old('description')}}" >
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>
@endsection
