@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div align="right">
				<a class="btn btn-primary" href="{{ route('libros.index')}}">Regresar</a>
			</div>
		</div>
		<div class="col-md-12">
			<form action="{{ route('libros.store') }}" method="POST">
				@csrf
				<div class="col-md-4">
					<label for="descripcion" class="form-label">Titulo del Libro</label>
					<input type="text" class="form-control" id="descripcion" name="titulo" value="">
				</div>
				<div class="col-md-4">
					<label for="descripcion" class="form-label">Descripción del libro</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion" value="">
					@error('descripcion')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>
				<div class="col-md-4">
					<label for="descripcion" class="form-label">Idioma</label>
					<select class="form-control" id='cod_idioma' name='cod_idioma' value="{{ old('cod_idioma') }}">
					<option value="">Seleccionar ...</option>
						@foreach($idioma as $idioma)
							<option value="{{ $idioma->cod_idioma }}">{{ $idioma->descripcion }}</option>
						@endforeach
					</select>
					@error('cod_idioma')
					<small class="text-danger">Seleccione un Idioma</small>
					@enderror
				</div>
				<div class="col-md-4">
					<label for="descripcion" class="form-label">Autor</label>
						@foreach($autores as $key => $value)
						<input type="checkbox" value="{{ $key }}" name="autores[]"
						{{ (is_array(old('autores')) && in_array($key, old('autores')))? 'checked' : ''}}>
							{{ $value }}
						@endforeach
					@error('autores')
					<small class="text-danger">Seleccione un Autor</small>
					@enderror
				</div>
				<div class="col-md-12 mt-3">
					<button type="submit" class="btn btn-success">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection