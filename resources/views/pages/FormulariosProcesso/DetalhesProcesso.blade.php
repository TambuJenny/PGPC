@extends('layouts.menu')
@section('content')

@if(isset($valorRetornado->idPeticao))

@endif
<div class="col-md-12 ">
<div class="card-title">
        <h3 style="color: #8F5FE8;"><i class="fa-solid fa-circle-info" style="color: #8F5FE8;"></i> <b>Detalhes do Processo</b></h3><br>
    </div>
    <div class="card-group">
    <div class="col-md-6">
        <div class="card border-1 ">
            <div class="card-title text-dark m-2">
                <h5 style="color: black;"><i class="fas fa-chalkboard-teacher " style="color: black;"></i> <b>Vítima</b></h5>
            </div>
            <div class="" style="overflow: auto;">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nome</th>
                      <th scope="col">BI</th>
                      <th scope="col">Telefone</th>
                      <th scope=""><center>Opção</center></th>
                      <th scope="col">Depoimento</th>
                    </tr>
                  </thead>
                  <tbody id='card-vitima'>
                    </tbody>    
                </table>     
            </div>
        </div>

        <div class="card border-0 mt-3">
            <div class="card-title text-dark mt-2 ms-2">
            <h5 style="color: black;"><i class="fas fa-chalkboard-teacher " style="color: black;"></i> <b>Depoimento</b></h5>
   
            </div>
            <div id="contentVitima"></div>
        </div>
    </div>
    <div class="col-md-3">
    <div class="card border-1 mb-3 ">
            <div class="card-title text-dark m-2">
            <h5 style="color: black;"><i class="fas fa-chalkboard-teacher " style="color: black;"></i> <b>Testemunho</b></h5>
   
            </div>
            <div class="card-body">
                <div id="card-testemunho"></div>
            </div>
    </div>
    <div class="card border-1 ">
            <div class="card-title text-dark m-2">
            <h5 style="color: black;"><i class="fas fa-chalkboard-teacher " style="color: black;"></i> <b>Tipo de Crime</b></h5>
   
            </div>
            <div class="card-body">
                <div id="card-tipoCrime"></div>
            </div>
    </div>
    </div>
    <div class="col-md-3">
    <div class="card border-1 mb-3">
            <div class="card-title text-dark m-2">
            <h5 style="color: black;"><i class="fas fa-chalkboard-teacher " style="color: black;"></i> <b>Advogado</b></h5>
            </div>
            <div class="card-body">
                <div id="card-advogado"></div>
            </div>
    </div>
    <div class="card border-1 ">
            <div class="card-title text-dark m-2">
            <h5 style="color: black;"><i class="fas fa-chalkboard-teacher " style="color: black;"></i> <b>Juíz</b></h5>
            </div>
            <div class="card-body">
                <div id="card-juiz" "></div>
            </div>
            
    </div>
    </div>
    </div>
</div>

<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
<script>
  

  var idPeticao  = {{$idPeticao}};
  jQuery("Document").ready(()=>{

    //idPeticao = 2;
    $.ajax({
        type: "GET",
        url: `api/buscarvitima/${idPeticao}`,
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

                $('#card-vitima').html(dataDescricao);
        },
        success: function (response) {
            let table = "";
            console.log(response);

            if(response.length > 0 )
            {
              response.forEach(element => {
               table += `<tr>
                        <th scope="row">${element.id}</th>
                        <td>${element.nome}</td>
                        <td>${element.bi}</td>
                        <td>${element.telefone}</td>
                        <td>
                           <center>
                           <button type="button" onclick= "PegarIdVitima(${element.id_vitima})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#AdvogadoModal" data-bs-whatever="@mdo">+ Advogado</button>

                           </center>
                       </td>
                        <td> 
                          <center> <button class="btn btn-primary" type="button" onclick="buscarDepoimentoVitima(${element.id},${idPeticao})" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-eye"></i></button></center>
                        </td>
                   </tr>`
        });

            }else
            {
              table = `<p>Nenhum depoimento encontrado</p>`;
            }


           $('#card-vitima').html("");
           $('#card-vitima').html(table);
        }
    });

  });



  function buscarDepoimentoVitima (idPessoa,idPeticao)
{
        $.ajax({
        type: "GET",
        url: "api/buscarDepoimentoVitima",
        headers :{
            idpessoa : idPessoa,
            idpeticao : idPeticao
        },
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

            $('#contentVitima').html(dataDescricao);
        },
        success: function (response) {

           if(response.length >0)
           {
            response.forEach(element =>{
                var dataDescricao =`
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="row"><b>Nome</b></th>
                        <th scope="row"><b>Depoimento</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col">${element.nome}</td>
                        <td colspan="2"> ${element.descricao}</td>
                      </tr>
                    </tbody>
                  </table>
            `;
                   
            $('#contentVitima').html(dataDescricao);
            })
           }else 
           {

            var dataDescricao =`<p>A vítima não tem depoimento</p>`;
            $('#contentVitima').html(dataDescricao);
           }
        }
    });  
}
</script>

@endsection