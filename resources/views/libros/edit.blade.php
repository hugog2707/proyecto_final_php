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
			<form action="{{ route('libros.update', $libro) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="col-md-4">
					<label for="descripcion" class="form-label">Titulo del Libro</label>
					<input type="text" class="form-control" id="descripcion" name="titulo" value="{{ $libro->titulo }}">
					<label for="descripcion" class="form-label">Descripción del Libro</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $libro->descripcion }}">
					<label for="descripcion" class="form-label">Idioma del Libro</label>
					<input type="text" class="form-control" id="descripcion" name="cod_idioma" value="{{ $libro->cod_idioma }}">
				</div>
				<div class="col-md-6">
					<label for="autores">Autor:</label><br>
                @if(sizeof($autores) > 0)
               @foreach($autores as $key => $value)
               <input type="checkbox" value="{{ $key }}" name="autores[]"
               {{ $libro->autor->pluck('cod_autor')->contains($key) ? 'checked' : ''}}>
               {{$value}}
               <br>
               @endforeach
               @error('autores')
               <small>{{$message}}</small>
               @enderror
               @else
               <h3>no se encontraron autores</h3>
               @error('autores')
               <small>{{$message}}</small>
               @enderror
               @endif
               <br><br>
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