@extends('layout')
@section('navlink')
<nav> 
    <ul>
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('livro.index')}}"><i class="fa fa-book"></i> Livro</a></li>
        <li><a class="active" href="{{route('leitor.index')}}"><i class="fa fa-book-reader"></i> Leitor</a></li>
        <li><a href="{{route('emprestimo.index')}}"><i class="fa fa-hand-holding"></i> Emprestimo</a></li>
        <li><a href="{{route('perfil.index')}}"><i class="fa fa-user"></i> Perfil</a></li>
        <li><a href="{{route('perfil.index')}}"><i class="fa fa-close"></i> Sair</a></li>
    </ul>
</nav>
@endsection

@section('content')
<main class="clear">
    <div class="top">
        <button class="btn" onclick="showf()"><i class="fa fa-plus-circle"></i> Adicionar</button>
        <form  class="clear" action=" {{route('leitor.index')}}" method="GET    ">
            {{-- @csrf --}}
            <input class="search" type="search" placeholder="pesquisar leitor" name="search">
            <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <table id="tabela">
        <thead>
            <tr>
                <th>*</th>
                <th>Nome</th>
                <th>Nº do BI</th>
                <th>Endereço</th>
                <th>Contacto</th>
                <th>Nº do Cartão</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leitores as $leitor)                
            <tr>
                <td>{{$leitor->id}}</td>
                <td>{{$leitor->nome}}</td>
                <td>{{$leitor->bi}}</td>
                <td>{{$leitor->endereco}}</td>
                <td>{{$leitor->contacto}}</td>
                <td>{{$leitor->cartao}}</td>
                <td><a onclick="Actualizar('{{ $leitor->id }}', '{{ $leitor->nome }}', '{{ $leitor->bi }}', '{{ $leitor->endereco }}', '{{ $leitor->contacto }}', '{{ $leitor->cartao }}', '{{ $leitor->genero }}')"><i class="fa fa-pencil-alt"></i></a></td>
                <td><a onclick="confirmar({{$leitor->id}})"><i class="fa fa-trash"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
     <!-- Links de paginação -->
     {{ $leitores->links('pagination::default') }}  
</main>
    <div id="back"></div>
    <div id="modal" class="form-livro">
        <h2>Actualizar os Dados do Leitor 2 </h2>
        <form class="clear" action="{{route('leitor.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input id="id_leitor" type="hidden" name="id_leitor">
            <label for="nome">Nome:</label>
            <input id="nome" type="text" name="nome" >
            <label for="bi">BI:</label>
            <input id="bi" type="text" name="bi" required minlength="14" maxlength="14">
            <label for="bi">Endereço:</label>
            <input id="endereco" type="text" name="endereco" >
            <label for="contacto">Contacto:</label>
            <input id="contacto" type="text" name="contacto"  placeholder="9xx xxx xxx" required minlength="9" maxlength="9">
            <label for="genero">Gênero</label>
            <input id="masculino" type="radio" value="M" name="genero">Masculino
            <input id="feminino" type="radio" value="F" name="genero">Feminino
            <label for="bi">Nº do Cartão:</label>
            <input id="cartao" type="text" name="cartao" placeholder="123456789BA000">
            <div class="footer">
                <input type="submit" value="Actualizar">
                <input type="reset" value="Limpar">
                <button type="button" onclick="fechar()">Fechar</button>
            </div>
        </form>
    </div>
    <section id="modal-logo" class="form-livro">
        <form class="clear" action="{{route('leitor.store')}}" method="POST">
            @csrf
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Cristiano Ronaldo" required>
            <label for="bi">BI:</label>
            <input type="text" name="bi" placeholder="123456789BA000" required minlength="14" maxlength="14">
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" placeholder="11 de Novembro, Benguela">
            <label for="endereco">Contacto:</label>
            <input type="text" name="contacto" placeholder="9xx xxx xxx" required minlength="9" maxlength="9">
            <label for="genero">Gênero</label>
            <input type="radio" value="M" name="genero">Masculino
            <input type="radio" value="F" name="genero">Feminino
            <label for="bi">Nº do Cartão:</label>
            <input type="text" name="cartao" placeholder="123456789BA000" required>
            <div class="footer">
                <input type="submit" value="Registrar">
                <input type="reset" value="Limpar">
                <button type="button" onclick="ffechar()">Fechar</button>
            </div>
        </form> 
    </section>
    <section id="confirm" class="form-livro">
        <div class="modal-confirm">
            <h1>Deseja realmente eliminar?</h1>
            <div class="btn-confirm">
                <a id="sim">Sim</a>
                <a onclick="fechar_confirmar()">Cancelar</a>
            </div>
        </div>
    </section>
@endsection
<script>
    function confirmar(id) {
        document.getElementById('confirm').style.display = "block";
        const url = '{{ route("leitor.destroy", ":id") }}';
        document.getElementById('sim').setAttribute('href', url.replace(':id', id));
    }
    function fechar_confirmar() {
        document.getElementById('confirm').style.display = "none";
    }
    function Actualizar(id, nome, bi, endereco, contacto, cartao, genero){
        show();
    document.getElementById('id_leitor').value = id;
    document.getElementById('nome').value = nome;
    document.getElementById('bi').value = bi;
    document.getElementById('endereco').value = endereco;
    document.getElementById('contacto').value = contacto;
    document.getElementById('cartao').value = cartao;
    if (genero == 'M') {
        document.getElementById('masculino').checked = true;
    } else {
        document.getElementById('feminino').checked = true;
    }
    }
    </script>