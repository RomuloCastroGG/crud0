<?php
 
namespace App\Http\Controllers;
 
use App\Models\Livro;
use Illuminate\Http\Request;
 
class LivroController extends Controller{
  // mostra a view listando os livros cadastrados
  public function index(){
    // obtém todos os livros cadastrados
    $livros = Livro::all();
     
    // direciona para a view e fornece um vetor
    // contendo os livros
    return view('livros.index', compact('livros'));
  }  
 
  // mostra a view para cadastrar um novo livro
  public function create(){
    return view('livros.create');
  }
 
  // recebe as informações do formulário e as grava
  // no banco de dados
  public function store(Request $request){
    // valida o formulário
    $request->validate([
      'titulo' => 'required',
      'autor' => 'required',
      'paginas' => 'required']);
     
    // obtém os valores do form
    Livro::create($request->all());
      
    // direciona para página cadastro novamente,
    // com uma mensagem de sucesso
    return redirect()->route('livros.create')
      ->with('mensagem', 'Livro salvo com sucesso.');
  }
 
  // mostrar os detalhes do livro informado
  // como argumento
  public function show(Livro $livro){
    return view('livros.show', compact('livro'));
  }  
 
  // método que permite excluir um livro
  public function destroy(Livro $livro){
    //  chamar o método delete() do Eloquent
    $livro->delete();
     
    // chamar a view com uma mensagem de
    // de sucesso.
    return redirect()->route('livros.index')
      ->with('mensagem','Livro excluído com sucesso.');
  }
 
  // editar o livro recebido como argumento
  public function edit(Livro $livro){
    // chama a view e passa o livro para ela
    return view('livros.edit', compact('livro'));
  }
 
  // atualizar os dados de um livro
  public function update(Request $request, Livro $livro){
    // vamos validar os dados vindo do formulário
    $request->validate([
      'titulo' => 'required',
      'autor' => 'required',
      'paginas' => 'required']);
     
    // atualizar o livro na tabela do banco de dados
    $livro->update($request->all());
     
    // voltar para a listagem de livros
    return redirect()->route('livros.index')
      ->with('mensagem', 'Livro atualizado com sucesso.');
  }
}
 
?>
