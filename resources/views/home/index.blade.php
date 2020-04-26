@extends('layout.app')

@section('content')
<div class="row">
<div align="left" class="col-12">
    <div class="col-lg-2 col-sm-8 card-user mx-lg-5 mt-5">
        <div align="center" class="text-rookie mt-2 bold">Rookie</div>
        <div align="center" class="mt-2 bold">Desenvolvedor Backend</div>
        <div align="center" class="mt-2 bold">Iago</div>
        <div class="flex-a">
            <div align="center" class="mt-3 char"><img src="../assets/img/chars/pikachu.png"></div>
        </div>
        <div class="mt-4">
            <div align="center" class="progress-container col-12">
                <span class="progress-badge text-rookie">37pts</span>
                <div class="progress mt-0 pb">
                    <div class="progress-bar progress-bar-striped bg-rookie" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100" style="width: 37%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-a mt-4">
            <div>
                <span align="center" ><img class="trophy-size" src="../assets/img/icons/trophy.png"><span class="bold fs-18"> 2º </span></span>
            </div>
        </div>
        <div class="flex-a mt-4">
            <div class="badges">
                <span align="center" ><img class="badge-size mx-1" src="../assets/img/badges/php.png"></span>
                <span align="center" ><img class="badge-size mx-1" src="../assets/img/badges/go.png"></span>
                <span align="center" ><img class="badge-size mx-1" src="../assets/img/badges/python.png"></span>
            </div>
        </div>
    </div>
</div>
</div>
@endsection