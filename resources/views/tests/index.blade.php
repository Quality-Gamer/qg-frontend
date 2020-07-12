@extends('layout.app')

@section('content')
<div class="col-lg-8 col-md-12 col-sm-12 col-12">
    <div id="messages">
        
    </div>
    <div align="center"><h1 class="title-page">Conquistas</h1></div>
    <div class="jumbotron p-4 card-default col-lg-12 col-md-12 col-sm-12 bg-lg-green">
    <div id="btn-close" class="btn-close pos-close"><a onclick="closeTab()">X</a></div>
    <div id='badges-div'>    
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
            <div style='position:absolute;bottom:0;right:0;margin-right:15px;' align="right">
                <button onclick='LoadTests()' class="btn btn-success btn-icon btn-round">
                    <i class="now-ui-icons ui-1_simple-add"></i>
                </button>
            </div>
    </div>
    <div class="d-none" id="tests-div">
            <div align="center"><h2 class="title-card">Descrição</h2></div>
                <div>
                    @if ($allow)
                        @foreach ($allow as $a)
                            <div class="row">
                                <div class="col-3"><img class="test-icon" src='../assets/img/badges{{$a->badge}}'></div>
                                <div class="col-4">{{$a->title}}</div>
                                <div class="col-3"><img class="test-icon" src='../assets/img/icons/coin_green.png'> {{$a->test_value}}</div>
                                <div class="col-2"><button class="btn btn-success">Fazer</button></div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div>
                    @if ($deny)
                        @foreach ($deny as $d)
                            <div class="row">
                                <div class="col-3"><img class="test-icon" src='../assets/img/badges{{$d->badge}}'></div>
                                <div class="col-4">{{$d->title}}</div>
                                <div class="col-3"><img class="test-icon" src='../assets/img/icons/coin_green.png'> {{$d->test_value}}</div>
                                <div class="col-2"><div class="badge badge-danger">Feito X</div></div>
                            </div>
                        @endforeach
                    @endif
                </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(() => {
        $("#btn-close").hide();
        $("#tests-div").removeClass("d-none");
        $("#tests-div").hide();
    });

    const LoadTests = () => {
        $("#btn-close").show();
        $("#tests-div").show();
        $("#badges-div").hide();
    }

    const closeTab = () => {
        $("#badges-div").show();
        $("#btn-close").hide();
        $("#tests-div").hide();
    };
</script>
@endsection