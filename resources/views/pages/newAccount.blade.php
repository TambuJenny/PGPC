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
          <div class="d-flex align-items-justify ms-5">
                <div class="col-md-8">
                    <label class="form-label">Nome</label> 
                    <input type="text" class="form-control">
                    <label class="form-label mt-2">Senha</label> 
                    <input type="password" class="form-control">

                    <label class="form-label">B.I</label> 
                    <input type="text" class="form-control">
                    <label class="form-label mt-2">Cargo</label>
                    <select class="form-control"> 
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                    </select>
                    <button class="btn mt-3 bg-primary text-white" type="submit"><i class="fa-solid fa-sign-in"></i> Criar conta</button>
               
                </div>
                <div class="col-md-5 ms-3">
                </div>
           </div>
          </div>
          <div class="card-footer ">

          </div>
    </div>
</div>

@endsection