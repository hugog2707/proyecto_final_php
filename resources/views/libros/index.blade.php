@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-success">CRUD Libros</h2>
		</div>
	</div>

	<div class="col-md-12">
		<div align="right">
			<a href="{{ route('libros.create') }}" class="btn btn-primary">Agregar</a>
		</div>
	</div>

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Titulo</th>
				<th>Descripción</th>
				<th>Fecha de Publicación</th>
				<th>Idioma</th>
				<th class="text-center" width="25%">Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($libros as $libros)
			<tr>
				<td>{{ $libros->cod_libro }}</td>
				<td>{{ $libros->titulo }}</td>
				<td>{{ $libros->descripcion }}</td>
				<td>{{ $libros->fecha_publicacion }}</td>
				<td>{{ $libros->idioma->descripcion }}</td>
				<td>
					<a href="{{ route('libros.edit', $libros) }}" class="btn btn-success">Editar</a>
					<form action="{{ route('libros.destroy', $libros) }}" method="POST" class="d-inline-block">
					@csrf
					@method('DELETE')
						<button type="submit" class="btn btn-danger"
						onclick="return confirm('¿Está seguro de Eliminar el Libro?!!')" 
						>Eliminar</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection
