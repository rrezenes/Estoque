@extends('layout.principal')

@section('conteudo')

	<h1>Alterar produto: {{$produto->nome}}</h1>

	<form action="/produtos/altera" method="post">
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<input type="hidden" name="id" value="{{$produto->id}}" />
		<div class="form-group">
			<label>Nome</label>
			<input name="nome" value="{{$produto->nome}}" class="form-control"/>    
		</div>
		<div class="form-group">
			<label>Descrição</label>
			<input name="descricao" value="{{$produto->descricao}}" class="form-control"/>
		</div>
		<div class="form-group">
			<label>Valor</label>
			<input name="valor" value="{{$produto->valor}}" class="form-control"/>
		</div>
		<div class="form-group">
			<label>Quantidade</label>
			<input name="quantidade" value="{{$produto->quantidade}}" type="number" class="form-control"/>
		</div>
		<div class="form-group">
		    <label>Tamanho</label>
		    <input name="tamanho" value="{{$produto->tamanho}}" class="form-control" />    
		</div>
		<button type="submit" class="btn btn-primary">Cadastrar</button>
	</form>

@stop