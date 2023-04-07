<!-- Aqui ele faz a exportação do app que esta na pasta Layout. App-->
@extends('layouts.app')
@section('content') 
<!--Tudo que vamos por aqui vai aparecer junto com o layout. App-->
<div class="card col-md-12 h-12 mt-5 border shadow-lg p-3 mb-5 bg-body-tertiary rounded">
   <div class="d-flex">
   <div class="col-md-6">
        <img src="{{asset('frontend/img/imgindex.jpg')}}" class="img-fluid" />
    </div>
    <div class="col-md-6 ms-5">
          <div class="mr-3 mt-3 mb-3 col-md-8">
            <h2><b>PGPC</b><i>/Login</i></h2>
            <small>Programa de Gestão de Processos Criminais</small>
            <hr>
          </div>
          <form class="col-md-8 ">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="d-flex justify-content-between">
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
         </form>
    </div>
   </div>
</div>
@endsection