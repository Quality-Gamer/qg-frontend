@extends('layout.app')

@section('content')
<div class="row bg"></div>
<div align="center">
    <div class="col-6 card mr-4 mr-lg-5">
        <form action="/login" method="POST">
            @csrf
        <div align="center" class="col mt-3">
            <h2><b><span class="text-green">Recuperar</span></b></h2>
        </div>
        <div class="row">
        <div class="col mt-3">
                <div align="center" class="form-group">
                    <label for="input-email">Email</label>
                    <input type="email" class="form-control" id="input-email" name="email">
                </div>
                
        </div>
        
        @if(isset($message))
            <div class="alert alert-danger" role="alert">{{$message}}</div>
        @endif
        <button type="submit" class="btn btn-login form-control mx-2"><b>Recuperar</b></button>
        <button type="button" onclick="back()" class="btn btn-back form-control mt-2 mx-2"><b>Voltar</b></button>
        </div>
    </div>
    </form>

</div>
@endsection

@section('scripts')

<script>
 back = () => {
    window.location = '/';
 }
</script>

@endsection