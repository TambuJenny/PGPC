@extends('layouts.menu')
@section('content')

@if(isset($valorRetornado->idPeticao))

@endif

<div class="d-flex col-md-12">
    <div class="col-md-6">
        <div class="card">
            <div class="card-title ms-3 mt-3">
                <h3 class="text-dark">Reu</h3>
                <hr>
            </div>
            <div class="" >
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">BI</th>
      <th scope="col">Depoimento</th>
    </tr>
  </thead>
  <tbody id='tableValueReu'>
  </tbody>
</table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-title  ms-3 mt-3">
                <h3 class="text-dark">Vitima</h3>
                <hr>
            </div>
            <div class="">
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">BI</th>
      <th scope="col">Telefone</th>
      <th scope="col">Depoimento</th>
    </tr>
  </thead>
  <tbody id='tableValue'>
    <div class="">
    </div>
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-title  ms-3 mt-3">
                <h3 class="text-dark">Depoimento</h3>
                <hr>
            </div>
            <div class="card-body">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body" id= "contentReu">
                </div>
            </div>
            </div>
        </div>
    </div>

<script src="{{asset('frontend/js/pages/processo.js')}}"></script>
<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script>

const params = new URLSearchParams(window.location.search);
var idPeticao  = 0;

jQuery('document').ready(()=>{

    idPeticao = params.get('idpeticao');
    $.ajax({
        type: "GET",
        url: `api/buscarvitima/${idPeticao}`,
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
        url: `api/listarReus/${idPeticao}`,
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

function setDataReus(response)
{

    let table = "";
    response.forEach(element => {
        table += `<tr>
                 <td>${element.nome}</td>
                 <td>${element.bi}</td>
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
                   <center> <button class="btn btn-primary" type="button" onclick="buscarDepoimentoVitima(${element.id},${idPeticao})" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-eye"></i></button></center>
                 </td>
            </tr>`
    });

    $('#tableValue').html(table);
}

</script>
@endsection
