@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div align="right">
				<a class="btn btn-primary" href="{{ route('sexos.index')}}">Regresar</a>
			</div>
		</div>
		<div class="col-md-12">
			<form action="{{ route('sexos.update', $sexo) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="col-md-4">
					<label for="descripcion" class="form-label">Descripción del Sexo</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $sexo->descripcion }}">
				</div>
				@error('descripcion')
					<small class="text-danger">{{ $message }}</small>
				@enderror
				<div class="col-md-12 mt-3">
					<button type="submit" class="btn btn-success">Actualizar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection