@extends('layouts.menu')
@section('content')

@if(isset($valorRetornado->idPeticao))

@endif


<form class="card text-white ps-4 col-md-12 mt-3" method="POST" action="{{route('processo.vitima')}}">
@csrf

        <h3 class="mt-3"><i class="fa fa-address-card"></i> <b>Cadastro da Vítima</b> </h3>
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
               <label class="form-label mt-2">N Petição</label>
               <input type="hidden" value={{$idpeticao}}  name="id_peticao">

          </div>
        </div>
       
       <div class="">
        <button class="col-md-2 mt-4  mb-4  btn bg-primary text-white" type="submit"><i class="fa-solid fa-sign-in"></i> Cadastrar vítima</button>
        <a class="col-md-2 mt-4  mb-4  btn bg-success text-white" href="{{url("/cadastrarReu?idpeticao=$idpeticao")}}" ><i class="fa-solid fa-sign-in"></i> Cadastrar Reu</a>
       </div>

</form>

<div class="card mt-5 " id="vitimaLista">
<div id="cadastradoAlert" class="mt-2"></div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">BI</th>
      <th scope="col">Telefone</th>
      <th scope="col">Opção</th>
    </tr>
  </thead>
  <tbody id='tableValue'>
    
  </tbody>
</table>

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
<script src="{{asset('frontend/js/pages/processo.js')}}"></script>
<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script>
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

jQuery('document').ready(()=>{

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
});

function setData(response)
{
    let table = "";

    response.forEach(element => {
        table += `<tr>
                 <th scope="row">1</th>
                 <td>${element.nome}</td>
                 <td>${element.bi}</td>
                 <td>${element.telefone}</td>
                 <td><button type="button" onclick= "pegarIDPessoa(${element.id})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-idpessoa = "${element.id}">Depoimento</button></td>
            </tr>`
    });

    $('#tableValue').html(table);
}

    var getIdPessoa = 0;

function pegarIDPessoa (id)
{
    getIdPessoa = id;
}

function CadastrarDepoimento()
{

    const params = new URLSearchParams(window.location.search);

        var objetoDepoimento = {
            depoimento:$('#msg-depoimento').val(),
            id_pessoa:getIdPessoa,
            id_peticao: params.get('idpeticao')
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
                <strong>Depoimento</strong> ${response.mensagem}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;
            
                $('#cadastradoAlert').html(alertCard);
        }
    });
}

</script>
@endsection