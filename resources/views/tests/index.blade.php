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
                <div align="center">
                    @if ($allow)
                        @foreach ($allow as $a)
                            <div align="center" class="row my-1">
                                <div class="col-2"><img class="test-icon" src='../assets/img/badges{{$a->badge}}'></div>
                                <div class="col-3">{{$a->title}}</div>
                                <div class="col-2"><img class="test-icon" src='../assets/img/icons/coin_green.png'> {{$a->test_value}}</div>
                                <div class="col-2"><button onclick = 'joinTest("<?php echo $a->id?>","<?php echo $a->title?>")' style="cursor:pointer" class="badge badge-success">Fazer</button></div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div align="center">
                    @if ($deny)
                        @foreach ($deny as $d)
                            <div align="center" class="row my-1">
                                <div class="col-2"><img class="test-icon" src='../assets/img/badges{{$d->badge}}'></div>
                                <div class="col-3">{{$d->title}}</div>
                                <div class="col-2"><img class="test-icon" src='../assets/img/icons/coin_green.png'> {{$d->test_value}}</div>
                                <div class="col-2"><div class="badge badge-danger">Feito X</div></div>
                            </div>
                        @endforeach
                    @endif
                </div>
    </div>
    <div class="d-none" id="id-start">
        <div class="test-title"></div>
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
        $("#id-start").removeClass("d-none");
        $("#id-start").hide();
        matchId = '';
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

    const joinTest = (test_id,title) => {
        $.ajax({
            method: "GET",
            url: "/api/http/request",
            crossDomain: true,
            headers: {
                    'Content-Type' : 'application/json',
                },
            data: { method: "GET", params : { ms: "tests", action: "create", params: {user_id: <?php echo Auth::user()->id ?>, test_id:test_id} } }
        }).done( r => { 
            var html = "<div class='test-content' align='center'"+
            "<h3>Pronto para começar o teste?</h3><br/>"+
            "<strong><h4>"+title+"</h4></strong><br/>"+
            "<p>Você terá 45 segundos para responder cada questão</p><br/>"+
            "<button class='btn btn-success'>Começar</button>"+
            "</div>";
            $(".test-content").remove();
            $("#test-title").append(html);
            $("#id-start").show();
            $("#id-start").hide();
            $("#badges-div").hide();

            matchId = r.match_id;
        });
    }
</script>
@endsection