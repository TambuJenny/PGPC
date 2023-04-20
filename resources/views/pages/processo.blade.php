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
    <h3><i class="fa fa-address-card"></i> <b>Processos</b> </h3>
    <hr/>
    <div class="row mt-2">
        <h5><i>Dados do Reú</i></h5>
        <small>Informações pessoais do suspeito</small>
        <div class=" col-md-4 mt-3">
            <label class="form-label">Nome</label> 
            <input type="text" name="nome" required class="form-control">
            <label class="form-label">B.I</label> 
            <input type="text" name="bi" required class="form-control">
            <label class="form-label">Endereço</label> 
            <input type="text" name="endereco" class="form-control">
        </div>
        <div class="col-md-4 mt-3">
            <label class="form-label">E-mail</label> 
               <input type="email" name="email" class="form-control">
               <label class="form-label">Telefone</label> 
               <input type="tel" name="telefone" class="form-control">
               <label class="form-label ">Data de Nascimento</label> 
               <input type="date" name="data_nascimento" class="form-control">
        </div>
        <div class="col-md-4 mt-3">
            <label class="form-label">Foto de Perfil</label> 
            <input type="file" class="form-control">
           
        </div>
    </div>
    <div class="mt-5" style="border: 1px dashed rgb(34, 33, 33); width: auto;"></div>
    <div class="row mt-5">
        <h5><i>Dados do Crime</i></h5>
        <div class="col-md-4 mt-3">
            
            <label class="form-label">Tipo de Crime</label> 
            <select class="form-control" name="tipoCrime"> 
              @foreach($pegarTodosTiposCrime as $valor)
                <option value={{$valor->id}}>{{$valor->nome}}</option>
              @endforeach
            </select>

            <label class="form-label">Local do crime</label> 
            <input type="text" name="bi" required class="form-control">
            <label class="form-label">Data e Hora do crime</label> 
            <input type="datetime-local" name="bi" required class="form-control">
            <label class="form-label">Local de incidente</label> 
            <input type="text" name="bi" required class="form-control">
            <label class="form-label">Local de incidente</label> 
            <input type="text" name="bi" required class="form-control">
        </div>
        <div class="col-md-4 mt-3">
            <label class="form-label">Vítimas</label>
            <button class=" btn form-control btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Cadastrar Vítimas</button>

            <div class="mt-2" style="overflow-x: auto">
                <label  class="form-label"><b>Evidências coletadas durante a investigação</b></label>
                <input type="text" required class="form-control">
                <div id="maisEvidencia"></div>
                <button class="btn btn-link text-dark">+ Adicionar evidencia</button>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <label class="form-label">Relatório</label>
            <textarea class="form-control" placeholder="Relatá aqui." style="height: 20.3em"></textarea>
        </div>
        
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Vítima</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="">
              <label for="recipient-name" class="col-form-label">Pesquisar</label>
              <input type="text" class="form-control" id="pesquisarVitima" >
            </div>
            <button class="mb-3 btn btn-link text-dark" id="btnAddVitima">+ Adicionar vítima</button>
            <div id="cadastrarVitima">
              <div class="row">
                <div class="col-md-6">
                  <label for="recipient-name" class="col-form-label">Nome Completo</label>
                  <input type="text" class="form-control" name="nomeVitima" id="nomeVitima" >
                  <label for="recipient-name" class="col-form-label">BI</label>
                  <input type="text" class="form-control" name="bi" id="bi">
                </div>
                <div class="col-md-6">
                  <label for="recipient-name" class="col-form-label">Telefone</label>
                  <input type="tel" class="form-control" name="nomeVitima" id="telefone">
                  <label for="recipient-name" class="col-form-label">Sexo</label>
                  <select class="form-control" id="sexo"> 
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection