@extends('layouts.menu')
@section('content')

<nav aria-label="...">
  
</nav>

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
        <button class="col-md-2 mt-4  mb-4  btn bg-success text-white" type="submit"><i class="fa-solid fa-sign-in"></i>Finalizar</button>
       </div>
    </div>

</form>

<div class="card mt-5 " id="vitimaLista">
<div id="cadastradoAlert" class="mt-2"></div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">BI</th>
    </tr>
  </thead>
  <tbody id='tableValue'>
    
  </tbody>
</table>
</div>

<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script>

jQuery('document').ready(()=>{

$.ajax({
    type: "GET",
    url: "api/listarReus/{{$idpeticao}}",
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
             <td>${element.nome}</td>
             <td>${element.bi}</td>
        </tr>`
});

$('#tableValue').html(table);
}

</script>
@endsection