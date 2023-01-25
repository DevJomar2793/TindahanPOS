@extends('inventory.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('inventory/' .$inventories->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$inventories->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="description" id="description" value="{{$inventories->description}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="item" id="item" value="{{$inventories->item}}" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success">
        <a href="{{ url('/inventory') }}" class="btn btn-success" title="Add New Student">
          <i class="fa fa-plus" aria-hidden="true"></i>Go Back</a></br>

        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

    </form>
   
  </div>
</div>
 
@stop