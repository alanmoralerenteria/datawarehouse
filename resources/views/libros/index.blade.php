@extends('plantilla')


@section('body')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href=""> Create New Book</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
        </tr>
	    @foreach ($libros as $libro)
	    <tr><td></td>
	        <td>{{ $libro->nombre }}</td>
	        <td>{{ $libro->ruta }}</td>

	    </tr>
	    @endforeach
    </table>


@endsection