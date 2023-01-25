@extends('inventory.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Please Add your Total Item</div>
  <div class="card-body">
      
      <form action="{{ url('inventory') }}" method="post">
        {!! csrf_field() !!}
        <label>ADD TOTAL ITEM:</label></br>
        <input type="text" name="total" id="total" class="form-control">
        
    </form>
   
  </div>
</div>
 
@stop