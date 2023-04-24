@extends('layouts.menu')
@section('content') 
<form class="mt-3" style="" method="POST" action="{{route('Processo.Create')}}">
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
<div class=" card p-4 col-md-12">
    <h3><i class="fa fa-address-card"></i> <b>Usuário</b> </h3>
    <hr/>
    <div class="card-body">
           
               
                
          <form action="{{route('User.CriarConta')}}" method="POST">
          @csrf
          <div class="d-flex align-items-justify ms-5">
          <div class="col-md-5">
               
               <label class="form-label">Nome</label> 
               <input type="text" name="nome" required class="form-control">
               <label class="form-label">B.I</label> 
               <input type="text" name="bi" required class="form-control">
               <label class="form-label">Endereço</label> 
               <input type="text" name="endereco" class="form-control">
               <label class="form-label mt-2">Sexo</label>
               <select class="form-control" name="sexo"> 
                   <option value="Masculino">Masculino</option>
                   <option value="Feminino">Feminino</option>
               </select>
               
               <button class="btn mt-3 bg-primary text-white" type="submit"><i class="fa-solid fa-sign-in"></i> Criar conta</button>
          
           </div>
           <div class="col-md-5 ms-3">
               <label class="form-label" >Senha</label> 
               <input type="password" name="senha" required class="form-control">
               <label class="form-label">E-mail</label> 
               <input type="email" name="email" class="form-control">
               <label class="form-label">Telefone</label> 
               <input type="tel" name="telefone" class="form-control">
               <label class="form-label mt-2">Data de Nascimento</label> 
               <input type="date" name="data_nascimento" class="form-control">
          
          </div>
           </div>
           </form>
          </div>
          <div class="card-footer ">

          </div>
  </div>
</form>
@endsection