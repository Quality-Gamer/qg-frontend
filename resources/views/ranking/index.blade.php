@extends('layout.app')

@section('content')

<div class="col-lg-8 col-md-12 col-sm-12 col-12">
    <div id="messages">
        
    </div>
    <div align="center"><h1 class="title-page">Ranking</h1></div>
    <div class="jumbotron p-4 card-default col-lg-12 col-md-12 col-sm-12 bg-lg-green scrolling">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 alert">
            <div class="row ranking-wrap">
                <div class="col-lg-3 col-md-3 col-sm-3 text-blue ranking-text"><strong>1.</strong></div>
                <div class="col-lg-3 col-md-3 col-sm-3 text-blue ranking-text"><img class="navbar-img" src="../assets/img/avatar/pumpkin.png"> </div>
                <div class="col-lg-3 col-md-3 col-sm-3 text-blue ranking-text"><strong>Iago</strong></div>
                <div class="col-lg-3 col-md-3 col-sm-3 text-blue ranking-text"><strong>100pts</strong></div>
            </div>
            <div class="col-3"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 alert">
            <div class="row ranking-wrap">
                <div class="col-lg-3 col-md-3 col-sm-3 text-blue ranking-text"><strong>2.</strong></div>
                <div class="col-lg-3 col-md-3 col-sm-3 text-blue ranking-text"><img class="navbar-img" src="../assets/img/avatar/pumpkin.png"> </div>
                <div class="col-lg-3 col-md-3 col-sm-3 text-blue ranking-text"><strong>Iago</strong></div>
                <div class="col-lg-3 col-md-3 col-sm-3 text-blue ranking-text"><strong>100pts</strong></div>
            </div>
            <div class="col-3"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    
</script>
@endsection