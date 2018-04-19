<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto;

class ProdutoController extends Controller{

	public function lista(){

        return view('produto.listagem')
        	->withProdutos(Produto::all());

	}

	public function mostra($id){

		$produto = Produto::find($id);

		if(empty($produto)){
			return 'produto não existe';
		}
		return view('produto.detalhes')->withProduto($produto);

	}

	public function novo(){

		return view('produto.formulario');

	}

	public function adiciona(){

  		Produto::create(Request::all());

	  	return redirect()
	  		->action('ProdutoController@lista')
	  		->withInput(Request::only('nome'));
	}

	public function listaJson(){

    	return Produto::all();

	}

	public function remove($id){

		Produto::find($id)->delete();

		return redirect()
        	->action('ProdutoController@lista');
	}

	public function altera($id){		

		return view('produto.altera')
			->withProduto(Produto::find($id));

	}

	public function atualiza(){

		$produto = Produto::find(Request::input('id'));

		$params = Request::all();

		$produto->update($params);

	  	return redirect()
	  		->action('ProdutoController@lista');
	}

}