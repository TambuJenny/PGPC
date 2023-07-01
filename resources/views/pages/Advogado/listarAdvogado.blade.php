@extends('layouts.menu')
@section('content')
<div class="card col-md-12">
    <div class="card-body">
    <div class="card-title">
        <h3 style="color: #8F5FE8;"><i class="fas fa-chalkboard-teacher " style="color: #8F5FE8;"></i> <b>Advogado</b></h3>
        <ul class="mb-4 nav nav-underline " style="font-size: 1em;">
            <li class="nav-item" >
              <a class="nav-link active" style="font-size: 0.8em; color: #8F5FE8"  href="{{url("/listarAdvogado")}}">Listar Advogados</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" style="font-size: 0.8em; color: #6c757d"  href="{{url("/cadastrarPeticao")}}">Novo Advogado</a>
            </li>
        </ul>
      </div>
    <div class="table-responsive">
   <div class="">
      <table class="table">
           <thead>
             <tr>
              <th style="color: #472f74;" scope="row"><b>Id</b></th>
               <th style="color: #472f74;"><b>Nome</b></th>
               <th style="color: #472f74;"><b>BI</b></th>
               <th style="color: #472f74;"><b>Email</b></th>
               <th style="color: #472f74;"><b>Telefone</b></th>
               <th style="color: #472f74;"><b>Sexo</b></th>
               <th style="color: #472f74;"><b>Nº de Ident. do Advogado</b></th>
               <th style="color: #472f74;" scope="row" ><b>Advogado<</b>/th>
             </tr>
           </thead>
           <tbody id="tableValue">
           @foreach($allAdvogado as $usuarios)
                 <th scope="row">{{$usuarios -> id}}</th>
                 <td>{{$usuarios-> nome}}</td>
                 <td>{{$usuarios-> bi}}</td>
                 <td>{{$usuarios-> email}}</td>
                 <td>{{$usuarios-> sexo}}</td>
                 <td>{{$usuarios-> telefone}}</td>
                 <td>{{$usuarios-> data_nascimento}}</td>
              @endforeach
           </tbody>
       </table>
   </div>                   
</div>   
    </div>

</div>

<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
<script>
  
   /*jQuery("Document").ready(()=>{

    $.ajax({
        type: "GET",
        url: "api/buscarTodosReus",
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
                 <th scope="row">${element.idReu}</th>
                 <td>${element.nome}</td>
                 <td>${element.bi}</td>
                 <td>${element.endereco}</td>
                 <td>${element.data_nascimento}</td>
                 <td>${element.telefone}</td>
                 <td>${element.url_imageFoto}</td>
                 <td scope="row"><b>${element.nomeProcesso}</b></td>
            </tr>`
           });

           $('#contentReu').html("");
           $('#tableValue').html(table);
        }
    });

  });*/
</script>
@endsection