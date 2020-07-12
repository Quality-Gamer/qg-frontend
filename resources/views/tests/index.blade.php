@extends('layout.app')

@section('content')
<div class="col-lg-8 col-md-12 col-sm-12 col-12">
    <div id="messages">
        
    </div>
    <div align="center"><h1 class="title-page">Conquistas</h1></div>
    <div class="jumbotron p-4 card-default col-lg-12 col-md-12 col-sm-12 bg-lg-green">
        <div align="center" class="row">
            <div class="col-2">
                <img class='badge-size' src='../assets/img/badges/php.png'/>
            </div>
            <div class="col-2">
                <img class='badge-size' src='../assets/img/badges/python.png'/>
            </div>
            <div class="col-2">
                <img class='badge-size' src='../assets/img/badges/go.png'/>
            </div>
        </div>
        <div style='position:absolute;bottom:0;right:0' align="right">
            <button onclick='LoadTests()' class="btn btn-success btn-icon btn-round">
                <i class="now-ui-icons ui-1_simple-add"></i>
            </button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const LoadTests = () => {
        console.log("loadtests");
    }
</script>