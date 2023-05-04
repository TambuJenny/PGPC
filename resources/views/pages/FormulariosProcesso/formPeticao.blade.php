@extends('layouts.menu')
@section('content')



<form class="mb-5" method="POST" action="{{route('processo.peticao')}}">
        @csrf
    <div class="mb-2  ">
        <nav class="navbar  bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand"><i class="fa fa-bars" aria-hidden="true"></i></a>
                <div class="d-flex" role="search">

                    <button class="btn btn-link " style="text-decoration: none" type="submit"> <i class="fa fa-file-pdf" aria-hidden="true"></i> GerarPdf</button>
                    <button class="btn btn-link " style="text-decoration: none" type="submit"><i class="fa fa-list" aria-hidden="true"></i> Listar</button>
                    <button class="btn btn-link " style="text-decoration: none" type="submit"><i class="fa fa-upload" aria-hidden="true"></i> Cadastrar</button>
                    <button class="btn btn-link " style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar Pessoa</button>
                </div>
            </div>
        </nav>
    </div>
    <div class=" card p-4 col-md-12">
    <div class="d-flex justify-content-between align-items-center">
        <h3><i class="fa fa-address-card"></i> <b>Petição</b> </h3>
        <div class="col-md-3">
            <label for="exampleFormControlInput1" class="col-form-label"><b><small>Número do processo</small></b></label>
            <input type="text" value="{{$idprocesso}}" disabled class="form-control" id="exampleFormControlInput1">
        </div>
    </div>
       
        <hr />
        <small>Informe aqui as Informações sobre a petição</small>

        <form class="ms-5">      
        
        <div class="d-flex align-items-justify mt-4 ">
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
          
           </div>
           <div class="col-md-5 ms-3">
               <label class="form-label">E-mail</label> 
               <input type="email" name="email" class="form-control">
               <label class="form-label">Telefone</label> 
               <input type="tel" name="telefone" class="form-control">
               <label class="form-label mt-2">Data de Nascimento</label> 
               <input type="date" name="data_nascimento" class="form-control">
          
          </div>
        </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="col-form-label" >Descrição do crime</label>
                <textarea class="form-control" name="descricaoCrime" rows="3"></textarea>
            </div>
            <button class="col-md-2 mt-4 btn bg-primary text-white" type="submit"><i class="fa-solid fa-sign-in"></i> Cadastrar Peticao</button>
            <div class="form-group">
               
            </div>
        </form>
        

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
                        <div class="">
                            <label for="recipient-name" class="col-form-label">Pesquisar</label>
                            <input type="text" class="form-control" id="pesquisarVitima">
                        </div>
                      
                       <!--
                          <button class="mb-3 btn btn-link text-dark" onclick="mostarDivCadastro()">+ Adicionar vítima</button>
                         <div id="cadastrarVitima" class="visibilidade">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="recipient-name" class="col-form-label">Nome Completo</label>
                                    <input type="text" class="form-control" name="nomeVitima" id="nomeVitima">
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
                       -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                    <button type="button" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
@endsection