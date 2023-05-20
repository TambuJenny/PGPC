@extends('layouts.menu')
@section('content') 

<div class="row">

              <a href="{{url('/cadastrarPeticao') }}" class="col-xl-4 col-sm-6 grid-margin stretch-card" style="text-decoration: none;">
                <div class="card bg-primary text-white">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h4 class="mb-0">Cadastrar Processo</h4>
                          <hr>
                        </div>
                      </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Cadastra o crime cometido, reu, depoimento, petiçao, vitimas, ...</h6>
                  </div>
                </div>
              </a>
              <a href="{{url('/listarProcesso') }}" class="col-xl-4 col-sm-6 grid-margin stretch-card" style="text-decoration: none;">
                <div class="card bg-primary text-white">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h4 class="mb-0">Listar Processos</h4>
                          <hr>
                        </div>
                      </div>
                    </div>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Visualiza, Elimina, Modifica um processo criminal </h6>
                  </div>
                </div>
              </a>
</div>



<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
@endsection