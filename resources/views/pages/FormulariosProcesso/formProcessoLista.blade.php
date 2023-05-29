@extends('layouts.menu')
@section('content')


<div class="card col-md-12">
    <div class="card-body">
    <div class="card-title">
        <h3 style="color: black;"><i class="fas fa-tools " style="color: black;"></i> <b>Processo</b></h3>
        <ul class="mb-4 nav nav-underline " style="font-size: 1em;">
            <li class="nav-item" >
              <a class="nav-link active" style="font-size: 0.8em;"  href="{{url("/listarProcesso")}}">Listar Processos</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" style="font-size: 0.8em;"  href="{{url("/cadastrarPeticao")}}">Novo Processo</a>
            </li>
        </ul>
    </div>
    <div class="table-responsive">
   <div class="">
      <table class="table">
           <thead>
             <tr>
               <th>Nome Processo</th>
               <th>Peticionário</th>
               <th>Tipo de Crime</th>
               <th><center>Opcão</center></th>
             </tr>
           </thead>
           <tbody id="tableValueProcesso">
           </tbody>
       </table>
   </div>                   
</div>   
    </div>

</div>


<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script>

jQuery('document').ready(()=>{

$.ajax({
type: "GET",
url: "api/buscarProcessos",
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
    
    console.log(response);
    setDataReus(response);
}
});
});

function setDataReus(response)
{

    let table = "";
    response.forEach(element => {
        table += `<tr>
                 <td>${element.nomeProcesso}</td>
                 <td>${element.peticionario}</td>
                 <td>${element.tipoCrime}</td>
                 <td>
                        <center>
                        <button type="button" onclick= "PegarIdReu(${element.id})" class="btn badge badge-danger" > <i class="fa fa-pen-to-square"></i></button>
                        <button type="button" onclick= "PegarIdReu(${element.id})" class="btn badge badge-success"><i class="fa fa-eye"></i></button>

                        </center>
                 </td>
            </tr>`
    });

$('#tableValueProcesso').html(table);
}

</script>
@endsection