@extends('layouts.menu')
@section('content') 


<div class=" card mt-3">

<div class="mt-5 mb-5 d-flex align-itens-center justify-content-around"> 

<div class="card bg-primary text-white" style="width: 18rem;">
  <a class="card-body " href="{{url('/cadastrarPeticao') }}" style="text-decoration: none">
    <h5 class="card-title">Cadastrar Processo</h5>
    <hr>
    <h6 class="card-subtitle mb-2 text-body-secondary">Cadastro de processo.</h6>
    <p class="card-text">Cadastra o crime cometido, reu, depoimento, petiçao, vitimas, ...</p>
</a>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

</div>
</div>

<script src="{{asset('frontend/js/pages/processo.js')}}" crossorigin="anonymous"></script>
@endsection