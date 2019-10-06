<div class="container">
@if(count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>  
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>  
@endif
@if(isset($error))
<div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
   {{$error}}
  </div>
@endif
@if(isset($success))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{$success}}
    </div>  
@endif
</div>