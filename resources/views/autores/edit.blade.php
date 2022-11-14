@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div align="right">
				<a class="btn btn-primary" href="{{ route('autores.index') }}">Regresar</a>
			</div>
		</div>

		<form action="{{ route('autores.update', $autor) }}" method="POST">
			@csrf
			@method('PUT')
			<div class="col-md-6">
				<label for="nombres" class="form-label">Nombres</label>
				<input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $autor->nombres) }}">
				@error('nombres')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="apellidos" class="form-label">Apellidos</label>
				<input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos', $autor->apellidos) }}">
				@error('apellidos')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6">
				<label for="cod_sexo" class="form-label">Sexo</label>
				<select class="form-control" id='cod_sexo' name='cod_sexo' value="{{ old('cod_sexo') }}">
					<option value="">Seleccionar ...</option>
					@foreach($sexos as $sexo)
					<option value="{{ $sexo->cod_sexo }}" 
						{{($autor->cod_sexo == $sexo->cod_sexo?'selected':'')}}
					>{{ $sexo->descripcion }}</option>
					@endforeach
				</select>
				@error('cod_sexo')
				<small class="text-danger">Seleccione un Sexo</small>
				@enderror
			</div>
			<div class="col-md-6 mt-3">
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
		</form>
	</div>
</div>

@endsection
