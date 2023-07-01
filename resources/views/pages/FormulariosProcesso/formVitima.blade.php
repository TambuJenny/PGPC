@extends('layouts.menu')
@section('content')

@if(isset($valorRetornado->idPeticao))

@endif

<div  data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0" >

<div class="fixed-bottom">
    <div id="cadastradoAlert" class="mt-2"></div>
</div>

<div class="loading d-none" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background: #ffffffdb; z-index: 1; font-size: 1.7rem; color: #6F6F6F;  justify-content: center; align-items: center;">
        <div class="text-center" style=" margin-top: 20em;">
            <i class="fas fa-circle-notch fa-spin"></i>
            <h5><strong>Aguarde a configuração da revistoria.</strong></h5>
        </div>
    </div>

<form class="card  ps-4 col-md-12 mt-3" method="POST" action="{{route('processo.vitima')}}">
@csrf

<div class="d-flex justify-content-between align-items-center">
            <h3><i class="fa fa-address-card" ></i><b>Vítima</b> </h3>
            <div class="col-md-3">
                <label for="exampleFormControlInput1" class="col-form-label"><b><small>Número da petição</small></b></label>
                <input type="text" value="{{$idpeticao}}" disabled="" class="form-control" id="exampleFormControlInput1">
            </div>
        </div>
        
        <small>Informe aqui as Informações sobre a Vítima</small>

                
        <div class=" row d-flex align-items-justify mt-4 ">
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
               <input type="hidden" value={{$idpeticao}}  name="id_peticao">

          </div>
        </div>
       
       <div class="">
        <button class="col-md-2 mt-4  mb-4  btn bg-primary text-white" type="submit"><i class="fa-solid fa-sign-in"></i> Cadastrar vítima</button>
            <!--  <a class="col-md-2 mt-4  mb-4  btn bg-success text-white" href="{{url("/cadastrarReu?idpeticao=$idpeticao")}}" ><i class="fa-solid fa-sign-in"></i> Cadastrar Reu</a>-->
       </div>

</form>
<h4 class="text-dark mt-4 display-4"><i class="fa fa-list"></i> <b>Vítimas</b> </h4>
<small class="text-dark">Listas de vítimas cadastradas</small>
<div class="card mt-2 " id="vitimaLista">

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">BI</th>
      <th scope="col">Telefone</th>
      <th scope=""><center>Opção</center></th>
      <th scope="col">Dados Cadastrado</th>
    </tr>
  </thead>
  <tbody id='tableValue'>
    <div class="m-4">
    <div class="collapse" id="collapseExample">
        <div class="card card-body" id= "contentVitima">
         
        </div>
    </div>
    </div>
  </tbody>
</table>

</div>

<form class="card ps-4 col-md-12 mt-3" method="POST" action="{{route('processo.reu')}}">
@csrf
    <div class=" ">
        <h3 class="mt-3"><i class="fa fa-address-card"></i> <b>Cadastro do Reu</b> </h3>
        <hr />
        <small>Informe aqui as Informações sobre a Vítima</small>

                
        <div class=" row d-flex align-items-justify mt-4 ">
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
               <label class="form-label mt-2">Foto do Reu</label>
               <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                    <input type="file" class="form-control" name="fotoReu" id="inputGroupFile01">
                </div>
                <input type="hidden" value={{$idpeticao}}  name="id_peticao">
          </div>
        </div>
       
       <div class="">
        <button class="col-md-2 mt-4  mb-4  btn bg-primary text-white" type="submit"><i class="fa-solid fa-sign-in"></i> Cadastrar Reu</button>
       </div>
    </div>

</form>

<h4 class="text-dark mt-4 display-4"><i class="fa fa-list"></i> <b>Reus</b> </h4>
<small class="text-dark">Listas de reus cadastradas</small>

<div class="card mt-2 " id="vitimaLista">
<div id="cadastradoAlert" class="mt-2"></div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">BI</th>
      <th scope="col"><center>Opcão</center></th>
      <th scope="col">Dados Cadastrado</th>
    </tr>
  </thead>
  <tbody id='tableValueReu'>
  <div class="m-4">
    <div class="collapse" id="collapseExample">
        <div class="card card-body" id= "contentReu">
         
        </div>
    </div>
    </div>
  </tbody>
</table>

</div>

<div class="card ps-4 col-md-12 mt-3">
        <h3 class="mt-3"><i class="fa fa-address-card"></i> <b>Processo</b> </h3>
        <hr />
        <small>Informe aqui as Informações sobre o processo</small>
    <div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Nome</label> 
            <input type="text" name="text" class="form-control" id="nomeProcesso" >
        </div>
        <div class="col-md-6">
        <label class="form-label">Tipo de Crime</label> 
        <select class="form-control border" name="sexo" id="tipoCrime"> 
                  
                </select>
        </div>
    </div>
    </div>
</div>

<button class="col-md-2 mt-4  mb-4  btn bg-success text-white" id="finalizarProcesso" type="submit"><i class="fa-solid fa-sign-in"></i>Finalizar</button>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Vítima</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Depoimento:</label>
                            <textarea required placeholder="Escreva o depoimento da vítima." class="form-control" id="msg-depoimento"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                    <button type="button" class="btn btn-primary" onclick="CadastrarDepoimento()">+ Cadastrar</button>
                </div>
            </div>
        </div>

</div>

<div class="modal fade" id="AdvogadoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Advogado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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

</div>

<script src="{{asset('frontend/js/pages/processo.js')}}"></script>
<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script>

const params = new URLSearchParams(window.location.search);
    function mostarDivCadastro() {

var divCadastro = document.getElementById('cadastrarVitima');
//alert(divCadastro.classList.contains("visibilidade"));

if (divCadastro.classList.contains("visibilidade")) {
    divCadastro.classList.add("visibilidade2");
    divCadastro.classList.remove("visibilidade");
}
else {
    divCadastro.classList.add("visibilidade");
    divCadastro.classList.remove("visibilidade2");
}

}

var idPeticao  = 0;

jQuery('document').ready(()=>{

    idPeticao = params.get('idpeticao');
    $.ajax({
        type: "GET",
        url: "api/buscarvitima/{{$idpeticao}}",
        contentType: "application/json; charset=utf-8",
        beforeSend : function ()
        {

        },
        success: function (response) {
            setData(response);
        }
    });

    $.ajax({
        type: "GET",
        url: "api/listarReus/{{$idpeticao}}",
        contentType: "application/json; charset=utf-8",
        beforeSend : function ()
        {
            var dataDescricao =`
                <div class="d-flex justify-content-center">
                         <div class="spinner-border" role="status">
                           <span class="visually-hidden">Loading...</span>
                         </div>
                         <p>Carregando dados....</p>
                </div>
                `;

                $('#contentReu').html(dataDescricao);
        },
        success: function (response) {
            setDataReus(response);
        }
    });

    $.ajax({
        type: "GET",
        url: "api/buscarTipoCrimes",
        contentType: "application/json; charset=utf-8",
        beforeSend : function ()
        {
        },
        success: function (response) {

            let opcao = "";
        response.forEach(element => { 
                opcao += `
                 <option value="${element.id}">${element.Nome}</option>
                 `
        });

        $('#tipoCrime').html(opcao);

        }
    });
});

var reuExiste = false;

$("#finalizarProcesso").click(()=>{
    
    var object = {
        id_peticao : idPeticao,
        nome :  $("#nomeProcesso").val() == null ? alert("campo nome do processo vazio"): $("#nomeProcesso").val(),
        id_tipoCrime : $("#tipoCrime").val() == null ? alert("Tipo de Crime não selecionado"): $("#tipoCrime").val()
    }

    if (reuExiste) {
        $.ajax({
        type: "POST",
        url: "api/cadastrarprocesso",
        contentType: "application/json; charset=utf-8",
        data : JSON.stringify(object),
        beforeSend : function ()
        {
                var getLoadingDiv =  $(".loading");
               
                if (!getLoadingDiv.hasClass('d-none')) 
                    getLoadingDiv.remove('d-none');

        },
        success: function (response) {
           location.href = '/listarProcesso';
        }
    });
    }else
    {
            alert("Reu não cadastrado");
    }

});

function setDataReus(response)
{

    let table = "";
    response.forEach(element => {
        table += `<tr>
                 <td>${element.nome}</td>
                 <td>${element.bi}</td>
                 <td>
                        <center>
                        <button type="button" onclick= "PegarIdReu(${element.id})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-idpessoa = "${element.id}">+ Depoimento</button>
                        <button type="button" onclick= "PegarIdReu(${element.id})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#AdvogadoModal" data-bs-whatever="@mdo">+ Advogado</button>

                        </center>
                    </td>
                     <td> 
                       <center> <button class="btn btn-primary" type="button" onclick="buscarDepoimentoVitima(${element.id},${idPeticao})" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-eye"></i></button></center>
                     </td>
            </tr>`
        reuExiste = true;
    });

    console.log(response);

$('#tableValueReu').html(table);
}


function setData(response)
{
    let table = "";

    response.forEach(element => {
        table += `<tr>
                 <th scope="row">1</th>
                 <td>${element.nome}</td>
                 <td>${element.bi}</td>
                 <td>${element.telefone}</td>
                 <td>
                    <center>
                    <button type="button" onclick= "pegarIDPessoa(${element.id})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-idpessoa = "${element.id}">+ Depoimento</button>
                    <button type="button" onclick= "PegarIdVitima(${element.id_vitima})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#AdvogadoModal" data-bs-whatever="@mdo">+ Advogado</button>
                 
                    </center>
                </td>
                 <td> 
                   <center> <button class="btn btn-primary" type="button" onclick="buscarDepoimentoVitima(${element.id},${idPeticao})" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-eye"></i></button></center>
                 </td>
            </tr>`
    });

    $('#tableValue').html(table);


}

    var getIdPessoa = 0;
    var getIdReu = 0;
    var getIdVitima = 0;

function pegarIDPessoa (id)
{
    getIdPessoa = id;
    getIdVitima = 0;
    getIdReu = 0;
}

function PegarIdVitima (id_vitima)
{
    getIdVitima = id_vitima;
    getIdReu = 0;
    getIdPessoa = 0;
} 

function PegarIdReu (id_reu)
{
    getIdReu = id_reu;
    getIdVitima = 0;
    getIdPessoa = 0;
} 

function buscarDepoimentoVitima (idPessoa,idPeticao)
{
        $.ajax({
        type: "GET",
        url: "api/buscarDepoimentoVitima",
        headers :{
            idpessoa : idPessoa,
            idpeticao : idPeticao
        },
        beforeSend : function ()
        {
            var dataDescricao =`
            <div class="d-flex justify-content-center">
                     <div class="spinner-border" role="status">
                       <span class="visually-hidden">Loading...</span>
                     </div>
                     <p>Carregando dados....</p>
            </div>
            `;

            $('#contentVitima').html(dataDescricao);
        },
        success: function (response) {

            response.forEach(element =>{
                var dataDescricao =`
                <h4><b>Depoimento</b></h4> <hr>
                <p>${element.descricao}</p>
            `;
                    console.log(response);
            $('#contentVitima').html(dataDescricao);
            })
        }
    });  
}

function cadastrarAdvogado (idPeticao)
{
        var objAdvogado = {
            nome : $("#nomeAdvogado").val(),
            bi :$("#biAdvogado").val(),
            telefone :$("#telefoneAdvogado").val(),
            nia:$("#niaAdvogado").val(),
            email:$("#emailAdvogado").val(),
            sexo:$("#sexoAdvogado").val(),
            id_reu :getIdReu,
            id_peticao:idPeticao,
            id_vitima:getIdVitima,
        }

        $.ajax({
        type: "POST",
        url: "api/cadastraradvogado",
        contentType: "application/json; charset=utf-8",
        data : JSON.stringify(objAdvogado),
        dataType:'json',
        beforeSend : function ()
        {
            
        },
        success: function (response) {

          var alertCard = `

          <div class="alert alert-warning alert-dismissible fade show  ms-5 me-5" role="alert">
                <strong>Mensagem</strong> ${response}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;
            
                $('#cadastradoAlert').html(alertCard);
        
                getIdPessoa = 0;
                getIdReu = 0;
                getIdVitima = 0;

        }
    });  
}

function CadastrarDepoimento()
{
        var objetoDepoimento = {
            depoimento:$('#msg-depoimento').val(),
            id_pessoa:getIdPessoa,
            id_peticao: idPeticao,
            id_reu:getIdReu
        }

    $.ajax({
        type: "POST",
        url: "api/cadastrardepoimento",
        contentType: "application/json; charset=utf-8",
        data : JSON.stringify(objetoDepoimento),
        dataType:'json',
        beforeSend : function ()
        {
            
        },
        success: function (response) {

          var alertCard = `
          <div class="alert alert-warning alert-dismissible fade show  ms-5 me-5" role="alert">
                <strong>Mensagem</strong> ${response.mensagem}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;

                    getIdPessoa = 0;
                    getIdReu = 0;
                    getIdVitima = 0;

                $('#cadastradoAlert').html(alertCard);
        }
    });
}

</script>
@endsection
