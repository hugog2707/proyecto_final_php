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
			<form action="{{ route('sexos.store') }}" method="POST">
				@csrf
				<div class="col-md-4">
					<label for="descripcion" class="form-label">Descripción del Sexo</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion" value="">
				</div>
				@error('descripcion')
					<small class="text-danger">{{ $message }}</small>
				@enderror
				<div class="col-md-12 mt-3">
					<button type="submit" class="btn btn-success">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection