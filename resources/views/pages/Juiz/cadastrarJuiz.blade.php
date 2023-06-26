@extends('layouts.menu')
@section('content')

<nav aria-label="...">
  
</nav>

<form class="card p-4 col-12" method="POST" action="{{route('processo.peticao')}}">
        @csrf

        <div class="d-flex justify-content-between align-items-center">
            <h3><i class="fa fa-address-card"></i> <b>Cadastro de Juiz</b> </h3>
            <div class="col-md-3">
                <label for="exampleFormControlInput1" class="col-form-label"><b><small>Número do processo</small></b></label>
                <input type="text" value="" disabled class="form-control" id="exampleFormControlInput1">
            </div>
        </div>
       
        
        <small>Informe aqui as Informações sobre o Juiz</small>
        
        <div class="d-flex align-items-justify mt-4 ">
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
               <label class="form-label">Nº de Ident. do Juiz</label> 
               <input type="email" name="email" class="form-control">
               <label class="form-label">Telefone</label> 
               <input type="tel" name="telefone" class="form-control">
               <label class="form-label mt-2">Data de Nascimento</label> 
               <input type="date" name="data_nascimento" class="form-control">
          </div>
        </div>
            <button class="col-md-2 mt-4 btn bg-primary text-white" type="submit"><i class="fa-solid fa-sign-in"></i> Cadastrar Juíz</button>
            <div class="form-group">
               
            </div>   

</form>
<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
@endsection