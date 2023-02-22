
    <form action="{{route($routeAddress, $project)}}" method="POST">
        @csrf
        @method($method)

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                    
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                
                @endforeach
                
            </ul>
            
        </div>
        @endif
                
        <div class="mb-3">
          
          <input type="text" class="form-control" placeholder="Add project title" name="title" value="{{old('title', $project->title)}}" >
          
        </div>
        <div class="mb-3">
          
          <input type="text" class="form-control" placeholder="Add project reference" name="github_reference" value="{{old('github_reference', $project->github_reference)}}" >
        </div>
        <div class="mb-3">
          
            <input type="text" class="form-control" placeholder="Add project description" name="description" value="{{old('description', $project->description)}}" >
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>
