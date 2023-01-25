@extends('inventory.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Tindahan</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/inventory/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Item
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th>Item</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($inventories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['description'] }}</td>
                                        <td>{{ $item['item'] }}</td>
                                        <td>{{ $item['total'] }}</td>
                                        <td>{{ $item['status'] }}</td>
 
                                        <td>
                                            <a href="{{ url('/inventory/' . $item['id']) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View Item</button></a>
                                            <a href="{{ url('/inventory/' . $item['id'] . '/add') }}" title="Edit Item"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add Item</button></a>
                                            <a href="{{ url('/inventory/' . $item['id'] . '/edit') }}" title="Edit Student"><button class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Item</button></a>
                                            <form method="POST" action="{{ url('/inventory' . '/' . $item['id']) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection