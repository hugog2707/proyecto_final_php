@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div align="right">
				<a href="{{ route('autores.create') }}" class="btn btn-primary">Agregar</a>
			</div>	
		</div>
		
		<div class="col-md-12">
			<h2 class="text-success">CRUD Autores</h2>
		</div>

		@if(sizeof($autores) > 0)
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Sexo</th>
					<th class="text-center" width="20%">Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($autores as $autor)
				<tr>
					<td>{{ $autor->cod_autor }}</td>
					<td>{{ $autor->nombres }}</td>
					<td>{{ $autor->apellidos }}</td>
					<td>{{ $autor->sexo->descripcion }}</td>
					<td class="text-center">
						<a href="{{ route('autores.edit', $autor) }}" class="btn btn-success">Editar</a>
						<form action="{{ route('autores.destroy', $autor) }}" method="POST" class="d-inline-block">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger"
							onclick="return confirm('¿Está seguro de Eliminar el Autor?!!')">Eliminar</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="d-flex justify-content-center">
			{{ $autores->links() }}
		</div>
		@else
		<div class="alert alert-secondary"><h3>No se encontraron Registros</h3></div>
		@endif
	</div>
</div>

@endsection