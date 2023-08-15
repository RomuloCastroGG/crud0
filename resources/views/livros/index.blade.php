<html>
<head>
  <meta charset="utf-8">
  <title>Biblioteca</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
 
<h1>Livros Cadastrados</h1>
 
@if($status = Session::get('mensagem'))
  <h2>{{ $status }}</h2>
@endif
 
<h4><a style="text-decoration: none" href="{{ route('livros.create') }}">Cadastrar 
  Novo Livro</a></h4>
 
<table class="table" width="709" borde ="1" cellspacing="0" cellpadding="3">
  <tr>
    <td width="85" ><strong>Id</strong></td>
    <td width="161"><strong>Título</strong></td>
    <td width="156"><strong>Autor</strong></td>
    <td width="98"><strong>Páginas</strong></td>
    <td width="167"><strong>Opções</strong></td>
    <td></td>
  </tr>
   
  @foreach($livros as $livro)
    <tr>
      <td >{{ $livro->id }}</td>
      <td>{{ $livro->titulo }}</td>
      <td>{{ $livro->autor }}</td>
      <td >{{ $livro->paginas }}</td>
      <td >
       
      <form action="{{ route('livros.destroy', $livro->id) }}" 
         method="post">
      
           <a class="btn btn-primary" href="{{ route('livros.edit', 
           $livro->id) }}">Editar</a>
       
         @csrf
         @method('DELETE')
       
         <button class="btn btn-primary" type="submit">Excluir</button>
         <div><a href="{{ route('livros.show', 
          $livro->id) }}">Detalhes</a></div>
      </form>
       
    </tr>
  @endforeach
   
</table>
 
</body>
</html>