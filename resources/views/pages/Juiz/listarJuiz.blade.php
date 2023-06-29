@extends('layouts.menu')
@section('content')
<div class="card col-md-12">
    <div class="card-body">
    <div class="card-title">
        <h3 style="color: black;"><i class="fas fa-chalkboard-teacher " style="color: black;"></i> <b>Juiz</b></h3>
        <ul class="mb-4 nav nav-underline " style="font-size: 1em;">
            <li class="nav-item" >
              <a class="nav-link active" style="font-size: 0.8em;"  href="{{url("/listarJuiz")}}">Listar Juiz</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" style="font-size: 0.8em;"  href="{{url("/novoJuiz")}}">Novo Juiz</a>
            </li>
        </ul>
      </div>
    <div class="table-responsive">
   <div class="">
      <table class="table">
           <thead>
             <tr>
               <th scope="row">Id</th>
               <th>Nome</th>
               <th>BI</th>
               <th>Email</th>
               <th>Telefone</th>
               <th>Sexo</th>
               <th>Nº de Ident. do Juiz</th>
             </tr>
           </thead>
            @if(isset($allJuiz))
              <tbody id="tableValue">
                @foreach($allJuiz as $usuarios)
                      <th scope="row">{{$usuarios -> id}}</th>
                      <td>{{$usuarios-> nome}}</td>
                      <td>{{$usuarios-> bi}}</td>
                      <td>{{$usuarios-> email}}</td>
                      <td>{{$usuarios-> telefone}}</td>
                      <td>{{$usuarios-> sexo}}</td>
                      <td>{{$usuarios-> nij}}</td>
                 @endforeach
          </tbody>
            @else 
              <h3>Nenhum Juiz cadastrado</h3>
            @endif
       </table>
   </div>                   
</div>   
    </div>

</div>

<script src="{{asset('frontend/js/jquery.js') }}" ></script>
<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
<script>
</script>
@endsection