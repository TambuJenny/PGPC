@extends('layouts.menu')
@section('content') 

<body class="backgroundDenied">
<div class="d-flex justify-content-center m-5">
    <div>
        <img src="{{asset('img/denied.png') }}">
        <div class="text-center">
            <h2 style="color: red;"><i class="fas fa-ban " style="color: red;"></i> <b>Voce não tem acesso nessa área.</b></h2>
            <p class="text-dark">O seu nivel de acesso não te permite acessar a essa área.</p>
        </div>
    </div>
</div>
</body>
@endsection