@extends('layouts.app')
@section('content') 


<div class="mt-5">
    <div class=" mt-2 mb-5 card col-md-6">
        <div class=" mt-5 ms-5  card-title">
            <h2><i class="fa-solid fa-user"></i><b> PGPC</b><i>/Nova Conta</i></h2>
            <small>Programa de Gestão de Processos Criminais</small>
            <hr>
        </div>
          <div class="card-body">
           
                @if ( $response -> messageStatus == false )
                    <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                     <strong>{{$response -> status }}</strong> {{$response -> message }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
          <form action="{{route('User.CriarConta')}}" method="POST">
          @csrf
          <div class="d-flex align-items-justify ms-5">
          <div class="col-md-5">
               
               <label class="form-label">Nome</label> 
               <input type="text" name="nome" required class="form-control">
               <label class="form-label">B.I</label> 
               <input type="text" name="bi" required class="form-control">
               <label class="form-label">Endereço</label> 
               <input type="text" name="endereco" class="form-control">
               <label class="form-label mt-2">Cargo</label>
               <select class="form-control" name="cargo"> 
                   <option>A</option>
                   <option>B</option>
                   <option>C</option>
               </select>
               
               <button class="btn mt-3 bg-primary text-white" type="submit"><i class="fa-solid fa-sign-in"></i> Criar conta</button>
          
           </div>
           <div class="col-md-5 ms-3">
               <label class="form-label" >Senha</label> 
               <input type="password" name="senha" required class="form-control">
               <label class="form-label">E-mail</label> 
               <input type="email" name="email" class="form-control">
               <label class="form-label">Telefone</label> 
               <input type="tel" name="telefone" class="form-control">
               <label class="form-label mt-2">Data de Nascimento</label> 
               <input type="date" name="data_nascimento" class="form-control">
          
          </div>
           </div>
           </form>
          </div>
          <div class="card-footer ">

          </div>
    </div>
</div>

@endsection