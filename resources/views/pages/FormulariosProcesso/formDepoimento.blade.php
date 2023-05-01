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
        <h3><i class="fa fa-address-card"></i> <b>Depoimento</b> </h3>
        <hr />
        <small>Informe aqui as Informações sobre a depoimento</small>
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1" class="col-form-label">Local do depoimento</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1" class="col-form-label">Finalidade do depoimento</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
            </div>
           
            <!--
                <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option> 
                </select>
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect2">Example multiple select</label>
                <select multiple class="form-control" id="exampleFormControlSelect2">
                    <option>1</option>
                </select>
            </div>
            -->
           
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="col-form-label">Descrição do depoimento</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
                <button type="submit"class="col-form-label">Próximo</button>
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