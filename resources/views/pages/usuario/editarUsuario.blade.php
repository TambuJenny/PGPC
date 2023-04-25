@extends('layouts.menu')
@section('content') 
    <div class="mb-2  ">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand"><i class="fa fa-bars" aria-hidden="true"></i></a>
              <div class="d-flex" role="search">
               
                <button class="btn btn-link " style="text-decoration: none" type="submit"> <i class="fa fa-file-pdf" aria-hidden="true"></i> GerarPdf</button>
                <button class="btn btn-link " style="text-decoration: none" type="submit"><i class="fa fa-list" aria-hidden="true"></i> Listar</button>
                <button class="btn btn-link " style="text-decoration: none"  type="submit"><i class="fa fa-upload" aria-hidden="true"></i> Cadastrar</button>
               
              </div>
            </div>
          </nav>
    </div>
<div class=" card p-4 col-md-12 mb-5">
    <h3><i class="fas fa-tools"></i> <b>Usuário/</b><i>Editar</i></h3>
    <hr/>
    <div class="card-body">
           
               
                
          <form action="{{route('User.Edit')}}" method="POST">
          @csrf
          <div class="d-flex align-items-justify ms-5">
          <div class="col-md-5">
               
               <label class="form-label">Nome</label> 
               <input type="text" name="nome" value ="{{$response ->nome }}"required class="form-control">
               <input type="hidden" name="id" value ="{{session('IdUsuario')}}">
               <label class="form-label" >B.I</label> 
               <input type="text" name="bi" value ="{{$response ->bi }}" required class="form-control">
               <label class="form-label">Endereço</label> 
               <input type="text" name="endereco" value ="{{$response ->endereco }}" class="form-control">
               <label class="form-label mt-2">Sexo</label>
               <select class="form-control"  name="sexo"> 
                @if( $response -> sexo == 'masculino')
                   <option value="Masculino" selected>Masculino</option>
                   <option value="Feminino" >Feminino</option>
              @else
                   <option value="Masculino" >Masculino</option>
                   <option value="Feminino" selected>Feminino</option>
               @endif
               </select>

               <label class="form-label">Senha</label> 
               <input type="password" name="senha" value ="{{$response ->endereco }}" required class="form-control">
               <label class="form-label">E-mail</label> 
               <input type="email" name="email" value ="{{$response ->email}}" class="form-control">
               <label class="form-label">Telefone</label> 
               <input type="tel" name="telefone" value ="{{$response ->telefone }}" class="form-control">
               <label class="form-label mt-2">Data de Nascimento</label> 
               <input type="datetime" name="data_nascimento" value ="{{$response ->data_nascimento }}" class="form-control">

               <button class="btn mt-3 bg-primary text-white" type="submit"><i class="fa-solid fa-sign-in"></i> Editar perfil conta</button>
          
           </div>
           </div>
           </form>
          </div>
  </div>

  @if(isset($responseStatus))
  <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
     {{$responseStatus ->message }}
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>

@endif

@endsection