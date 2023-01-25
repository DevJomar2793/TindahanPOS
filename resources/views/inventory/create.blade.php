@extends('inventory.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Add Item</div>
  <div class="card-body">
      
      <form action="{{ url('inventory') }}" method="post">
        {!! csrf_field() !!}
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>Item</label></br>
        <input type="text" name="item" id="item" class="form-control"></br>
        <label>Total</label></br>
        <input type="text" name="total" id="total" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success">
          <a href="{{ url('/inventory') }}" class="btn btn-success" title="Add New Student">
          <i class="fa fa-plus" aria-hidden="true"></i>Go Back</a>

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