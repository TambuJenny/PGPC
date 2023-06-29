@extends('layouts.menu')
@section('content')

<div class="card col-md-12">
<div class="card-title">
    <div id="contentReu"></div>
</div>
<div class="card-body">
<form class="mt-1" style="" method="POST" action="{{route('Processo.Create')}}">

    <div class=" p-2 col-md-12">
    <h3 style="color: black;"><i class="fas fa-chalkboard-teacher " style="color: black;"></i> <b>Cadastrar Juiz</b></h3>
        <ul class="mb-4 nav nav-underline " style="font-size: 1em;">
            <li class="nav-item" >
              <a class="nav-link " style="font-size: 0.8em;"  href="{{url("/listarJuiz")}}">Listar Juiz</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link active" style="font-size: 0.8em;"  href="{{url("/novoJuiz")}}">Novo Juiz</a>
            </li>
        </ul>
        <hr />
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Nome</label> 
                            <input type="text" name="nome" required id="nomeAdvogado" class="form-control">
                            <label class="form-label">B.I</label> 
                            <input type="text" name="bi" required id="biAdvogado" class="form-control">
                
                           <label class="form-label mt-2">Sexo</label>
                            <select class="form-control border" id="sexoAdvogado" required name="sexo"> 
                                <option value="Masculino">Seleciona um sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>

                            <label class="form-label" >E-mail</label> 
                            <input type="email" name="email" id="emailAdvogado" class="form-control">
                            <label class="form-label">Telefone</label> 
                            <input type="tel" name="telefone" id="telefoneAdvogado" class="form-control">
                            <label class="form-label mt-2">Num. de Indent. do Juiz</label>
                            <input type="text" required name="nia" id="niaAdvogado" class="form-control" required>
                        
                        </div>
                        <div class="col-md-6">
                          </div>
                    </div>
                </div>
                <div id="cadastradoAlert"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="cadastrarJuiz()">+ Cadastrar</button>
                </div>

    </div>

    </div>
</form>
</div>
</div>

<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script>
    function cadastrarJuiz ()
{
        var objAdvogado = {
            nome : $("#nomeAdvogado").val(),
            bi :$("#biAdvogado").val(),
            telefone :$("#telefoneAdvogado").val(),
            nij:$("#niaAdvogado").val(),
            email:$("#emailAdvogado").val(),
            sexo:$("#sexoAdvogado").val(),
        }

        $.ajax({
        type: "POST",
        url: "api/cadastrarjuiz",
        contentType: "application/json; charset=utf-8",
        data : JSON.stringify(objAdvogado),
        dataType:'json',
        beforeSend : function ()
        {
            var dataDescricao =`
                <div class="d-flex justify-content-center">
                         <div class="spinner-border" role="status">
                           <span class="visually-hidden">Loading...</span>
                         </div>
                         <p>Cadastramento do juiz, por favor aguarde. </p>
                </div>
                `;

                $('#contentReu').html(dataDescricao);
        },
        success: function (response) {

          var alertCard = `

          <div class="alert alert-warning alert-dismissible fade show  ms-5 me-5" role="alert">
                <strong>Mensagem</strong> ${response}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;
            
                $('#cadastradoAlert').html(alertCard);
                $('#contentReu').html("<div></div>");
                
        }
    });  
}
</script>
@endsection