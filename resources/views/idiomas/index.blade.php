@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-success">CRUD Idiomas</h2>
		</div>
	</div>

	<div class="col-md-12">
		<div align="right">
			<a href="{{ route('idiomas.create') }}" class="btn btn-primary">Agregar</a>
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
			@foreach($idiomas as $idioma)
			<tr>
				<td>{{ $idioma->cod_idioma }}</td>
				<td>{{ $idioma->descripcion }}</td>
				<td>
					<a href="{{ route('idiomas.edit', $idioma) }}" class="btn btn-success">Editar</a>
					<form action="{{ route('idiomas.destroy', $idioma) }}" method="POST" class="d-inline-block">
					@csrf
					@method('DELETE')
						<button type="submit" class="btn btn-danger"
						onclick="return confirm('¿Está seguro de Eliminar el Idioma?!!')" 
						>Eliminar</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection
