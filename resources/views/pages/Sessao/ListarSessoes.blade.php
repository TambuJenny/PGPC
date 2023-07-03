@extends('layouts.menu')
@section('content')
<div class="card col-md-12">
    <div class="card-body">
    <div class="card-title">
        <h3 style="color: #8F5FE8;"><i class="fas fa-chalkboard-teacher " style="color: #8F5FE8;"></i> <b>Sessões</b></h3>
        <ul class="mb-4 nav nav-underline " style="font-size: 1em;">
            <li class="nav-item" >
              <a class="nav-link active" style="font-size: 0.8em; color:  #8F5FE8"  href="{{url("/listarJuiz")}}">Listar Sessões</a>
            </li>
        </ul>
      </div>
    <div class="table-responsive">
   <div class="">
      <table class="table">
           <thead>
             <tr>
               <th style="color: #472f74;"><b>Nome</b></th>
               <th style="color: #472f74;"><b>Função</b></th>
               <th style="color: #472f74;"><b>Data</b></th>
               <th style="color: #472f74;"><b>Hora</b></th>
             </tr>
           </thead>
             
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