@extends('layouts.menu')
@section('content')
<div class="card col-md-12">
    <div class="card-body">
    <div class="card-title">
        <h3 style="color: black;"><i class="fas fa-chalkboard-teacher " style="color: black;"></i> <b>Usuário</b></h3>
    </div>
    <div class="table-responsive">
   <div class="">
      <table class="table">
           <thead>
             <tr>
              <th scope="row">Id</th>
               <th>Nome</th>
               <th>BI</th>
               <th>Endereço</th>
               <th>Sexo</th>
               <th>Email</th>
               <th>Telefone</th>
               <th>Data_nascimento</th>
             </tr>
           </thead>
           <tbody id="tableValue">
              @foreach($allUsuarios as $usuarios)
                 <th scope="row">{{$usuarios -> id}}</th>
                 <td>{{$usuarios-> nome}}</td>
                 <td>{{$usuarios-> bi}}</td>
                 <td>{{$usuarios-> endereco}}</td>
                 <td>{{$usuarios-> sexo}}</td>
                 <td>{{$usuarios-> email}}</td>
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