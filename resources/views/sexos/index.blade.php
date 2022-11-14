@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-success">CRUD Sexos</h2>
		</div>
	</div>

	<div class="col-md-12">
		<div align="right">
			<a href="{{ route('sexos.create') }}" class="btn btn-primary">Agregar</a>
		</div>
	</div>

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Descripción</th>
				<th class="text-center" width="25%">Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sexos as $sexo)
			<tr>
				<td>{{ $sexo->cod_sexo }}</td>
				<td>{{ $sexo->descripcion }}</td>
				<td>
					<a href="{{ route('sexos.edit', $sexo) }}" class="btn btn-success">Editar</a>
					<form action="{{ route('sexos.destroy', $sexo) }}" method="POST" class="d-inline-block">
					@csrf
					@method('DELETE')
						<button type="submit" class="btn btn-danger"
						onclick="return confirm('¿Está seguro de Eliminar el Sexo?!!')" 
						>Eliminar</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection
