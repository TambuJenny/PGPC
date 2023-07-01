@extends('layouts.menu')
@section('content')
<div class="card col-md-12">
    <div class="card-body">
    <div class="card-title">
        <h3 style="color: #8F5FE8;"><i class="fas fa-chalkboard-teacher " style="color: #8F5FE8;"></i> <b>Vitima</b></h3>
    </div>
    <div class="table-responsive">
   <div class="">
      <table class="table">
           <thead>
             <tr>
              <th style="color: #472f74;" scope="row"><b>Id</b></th>
               <th style="color: #472f74;"><b>Vitima</b></th>
               <th style="color: #472f74;"><b>BI</b></th>
               <th style="color: #472f74;"><b>Endereço</b></th>
               <th style="color: #472f74;"><b>Data de nascimento</b></th>
               <th style="color: #472f74;"><b>Telefone</b></B></th>
               <th style="color: #472f74;" scope="row" ><b>Processo</b></th>
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
        url: "api/buscarTodasVitimas",
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
                 <th scope="row">${element.id_vitima}</th>
                 <td>${element.nome}</td>
                 <td>${element.bi}</td>
                 <td>${element.endereco}</td>
                 <td>${element.data_nascimento}</td>
                 <td>${element.telefone}</td>
                 <td scope="row"><b>${element.nomeProcesso}</b></td>
            </tr>`
           });

           $('#contentReu').html("");
           $('#tableValue').html(table);
        }
    });

  });
</script>
@endsection