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
              <th scope="row">Estado </th>
              <th scope="row">Id</th>
               <th>Nome</th>
               <th>BI</th>
               <th>Endereço</th>
               <th>Sexo</th>
               <th>Email</th>
               <th>Telefone</th>
               <th>Data de Nascimento</th>
               <th>Nivel de Acesso</th>
               <th>Opções</th>
             </tr>
           </thead>
           <tbody id="tableValue">
              @foreach($allUsuarios as $usuarios)
              @if($usuarios -> estado == "Ativo" )
                 <th scope="row"> <span class="badge bg-success">{{$usuarios -> estado }}</span></th>
              @else
                 <th scope="row"> <span class="badge bg-danger">{{$usuarios -> estado }}</span></th>
              @endif
                 <th scope="row">{{$usuarios -> id}}</th>
                 <td>{{$usuarios-> nome}}</td>
                 <td>{{$usuarios-> bi}}</td>
                 <td>{{$usuarios-> endereco}}</td>
                 <td>{{$usuarios-> sexo}}</td>
                 <td>{{$usuarios-> email}}</td>
                 <td>{{$usuarios-> telefone}}</td>
                 <td>{{$usuarios-> data_nascimento}}</td>
                 <td>{{$usuarios-> nivelAcesso}}</td>
                 <td>
                  <button type="button" onclick="getIdUsusario({{$usuarios ->id}},'{{$usuarios-> nivelAcesso}}')" class="btn badge badge-success" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Opção</button>
                </td>
              @endforeach
           </tbody>
       </table>
   </div>                   
</div>   
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nivel de Acesso</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="contentReu"></div>
        <div class="form-floating">
          <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected value="0">Seleciona o nivel de Acesso</option>
            @foreach($allNivelAcesso as $nivelAcesso )
             <option value="{{$nivelAcesso -> id}}">{{$nivelAcesso -> nivel}}</option>
            @endforeach
          </select>
          <label for="floatingSelect"> Nivel acesso disponivel</label>
        </div>
        <div class="row mt-3">
          <div class="col">
            <button class="btn btn-success">Mudar Niv.Acesso</button>
            <button class="btn btn-danger " onclick="UpdateEstado()">Atualizar Estado do Usuario</button>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
<script>

  var getIdUsuario = 0;
  var getEstado = 0;

  function getIdUsusario (idUsuario,estado)
  {
    getIdUsuario = idUsuario;
    getEstado = estado;
  }

  function UpdateEstado ()
  { 
    var getEstadoNovo = "";
   if ( getEstado === "Ativo")
         getEstadoNovo = "Desativo"; 
      else
      getEstadoNovo = "Ativo"; 

    var objUsuario = {
            estado : getEstadoNovo,
            idUsuario :getIdUsuario,
        }

        $.ajax({
        type: "POST",
        url: "api/udpadeusuarioestado",
        contentType: "application/json; charset=utf-8",
        data : JSON.stringify(objUsuario),
        dataType:'json',
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
        success: function (response) 
        {
          $('#contentReu').html('');
          window.location.reload();
        }
    });

  };
</script>
@endsection