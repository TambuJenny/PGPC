@extends('layouts.menu')
@section('content')

<nav aria-label="...">
  
</nav>

<form class="card p-4 col-12" method="POST" action="{{route('processo.peticao')}}">
        @csrf

        <div class="d-flex justify-content-between align-items-center">
            <h3><i class="fa fa-address-card" style="color: #8F5FE8;"></i> <b style="color: #8F5FE8;">Marcar Data do Julgamento</b> </h3>
            <div class="col-md-3">
                <label for="exampleFormControlInput1" class="col-form-label"><b><small>Número do processo</small></b></label>
                <input type="text" value= disabled class="form-control" id="exampleFormControlInput1">
            </div>
        </div>
       
        
        <small>Escolha a data e indique o processo a ser julgado</small>
        
        <div class="d-flex align-items-justify mt-4 ">
            
          <div class="col-md-5">  
               <label class="form-label mt-2">Data de ínicio</label> 
               <input type="date" name="data_nascimento" class="form-control">
               <label class="form-label mt-2">Juiz</label>
               <select class="form-control" name="sexo"> 
                   <option value="Masculino">António João</option>
                   <option value="Feminino">Miguel Paulo</option>
                </select>
          
           </div>

           <div class="col-md-5 ms-3">
           <label class="form-label mt-2">Processo</label>
               <select class="form-control" name="sexo"> 
                   <option value="Masculino">Processo 0001</option>
                   <option value="Feminino">Processo 0002</option>
                </select>
                <label class="form-label mt-2">Tribunal</label>
               <select class="form-control" name="sexo"> 
                   <option value="Masculino">Tribunal de Viana</option>
                   <option value="Feminino">Tribunal do São Paulo</option>
                </select>
          </div>
           
        </div>
           
            <button class="col-md-2 mt-4 btn bg-primary text-white" type="submit"><i class="fa-solid fa-sign-in"></i> Marcar Julgamento</button>
            <div class="form-group">
               
            </div>   

</form>
<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
@endsection