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
                    <button class="btn btn-link " style="text-decoration: none" type="submit"><i class="fa fa-upload" aria-hidden="true"></i> Cadastrar</button>

                </div>
            </div>
        </nav>
    </div>
    <div class=" card p-4 col-md-12">
        <h3><i class="fa fa-address-card"></i> <b>Cadastro do Juíz</b> </h3>
        <hr />
        <small>Cadastra o Juiz aqui. </small>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nome</label> 
                            <input type="text" name="nome" required id="nomeAdvogado" class="form-control">
                            <label class="form-label">B.I</label> 
                            <input type="text" name="bi" required id="biAdvogado" class="form-control">
                
                           <label class="form-label mt-2">Sexo</label>
                            <select class="form-control border" id="sexoAdvogado" name="sexo"> 
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" >E-mail</label> 
                            <input type="email" name="email" id="emailAdvogado" class="form-control">
                            <label class="form-label">Telefone</label> 
                            <input type="tel" name="telefone" id="telefoneAdvogado" class="form-control">
                            <label class="form-label mt-2">Num. de Indent. do Advogado</label>
                            <input type="text" name="nia" id="niaAdvogado" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                    <button type="button" class="btn btn-primary" onclick="cadastrarAdvogado(0)">+ Cadastrar</button>
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
                            <input type="text" class="form-control" id="pesquisarVitima">
                        </div>
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
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
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