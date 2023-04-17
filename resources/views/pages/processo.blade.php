@extends('layouts.menu')
@section('content') 
<div class="mt-3" style="">
    <div class="mb-2  ">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand"><i class="fa fa-bars" aria-hidden="true"></i></a>
              <div class="d-flex" role="search">
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
            <select class="form-control" name="cargo"> 
                <option>A</option>
                <option>B</option>
                <option>C</option>
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
            <button class=" btn form-control btn-primary">Cadastrar Vítimas</button>

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
</div>
@endsection