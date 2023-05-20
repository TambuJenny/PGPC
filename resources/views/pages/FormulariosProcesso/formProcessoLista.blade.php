@extends('layouts.menu')
@section('content')


<div class="card col-md-12">
    <div class="card-body">
    <div class="card-title">
        <h3 style="color: black;"><i class="fas fa-tools " style="color: black;"></i> <b>Usuário/</b><i>Editar</i></h3>
        <ul class="mb-4 nav nav-underline " style="font-size: 1em;">
            <li class="nav-item" style="font-size: 1em;">
              <a class="nav-link " style="font-size: 0.8em;" href="{{url("/cadastrarPeticao")}}"> Processos</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link active" style="font-size: 0.8em;"  href="{{url("/listarProcesso")}}">Listar Processos</a>
            </li>
        </ul>
    </div>
    <div class="table-responsive">
   <div class="">
    
   <table class="table">
                        <thead>
                          <tr>
                            <th>Advogado</th>
                            <th>Peticao</th>
                            <th>Tipo de Crime</th>
                            <th>Opcão</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Jacob</td>
                            <td>53275531</td>
                            <td>12 May 2017</td>
                            <td>
                                <a class="btn badge badge-danger">
                                    <i class="fa fa-pen-to-square"></i>
                                </a> 
                                <a class="btn badge badge-success">
                                    <i class="fa fa-eye"></i>
                                </a>  
                            </td> 
                          </tr>
                         
                        </tbody>
    </table>
   </div>                   
</div>   
    </div>

</div>


<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
@endsection