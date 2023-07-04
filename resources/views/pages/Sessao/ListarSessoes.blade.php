@extends('layouts.menu')
@section('content')
<div class="card col-md-12">
    <div class="card-body">
    <div class="card-title">
        <h3 style="color: #8F5FE8;"><i class="fas fa-chalkboard-teacher " style="color: #8F5FE8;"></i> <b>Sessões</b></h3>
        <ul class="mb-4 nav nav-underline " style="font-size: 1em;">
            <li class="nav-item" >
              <a class="nav-link active" style="font-size: 0.8em; color:  #8F5FE8"  href="{{url("/listarJuiz")}}">Listar Atividades</a>
            </li>
        </ul>
      </div>
    <div class="table-responsive">
   <div class="">
      <table class="table">
           <thead>
             <tr>
               <th style="color: #472f74;"><b>Nome</b></th>
               <th style="color: #472f74;"><b>Accão</b></th>
               <th style="color: #472f74;"><b>Data e Hora</b></th>
             </tr>
           </thead>
           <tbody id="tableValue">
            <div id="contentReu"></div>
       </tbody>
             
       </table>
   </div>                   
</div>   
    </div>

</div>

<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
<script>
  jQuery("Document").ready(()=>{

$.ajax({
    type: "GET",
    url: "api/buscarTodasAtividades",
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
       let table = "";
       response.forEach(element => {
        table += `<tr>
             <td>${element.nome}</td>
             <td>${element.accao}</td>
             <td>${element.dataHora}</td>
        </tr>`
       });

       $('#contentReu').html("");
       $('#tableValue').html(table);
    }
});

});
</script>
@endsection