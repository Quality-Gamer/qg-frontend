@extends('layout.app')

@section('content')
<div class="col-lg-8 col-md-12 col-sm-12 col-12">
    <div align="center"><h1 class="title-page">Manager</h1></div>
    <div class="jumbotron p-4 card-default col-lg-12 col-md-12 col-sm-12 bg-lg-green">
    <div id="btn-close" class="btn-close pos-close"><a onclick="closeTab()">X</a></div>
    <div align="center">
            <div id="main">
            <div class="flex-a w-50 mb-3">
                <span class="badge badge-blue">1</span>
                <span class="badge badge-blue">2</span>
                <span class="badge badge-blue">3</span>
                <span class="badge badge-blue">4</span>
                <span class="badge badge-blue">5</span>
                <span class="badge badge-transparent">6</span>
                <span class="badge badge-transparent">7</span>
                <span class="badge badge-transparent">8</span>
            </div>
            <div align="center"><h2 class="title-card">Semana 6</h2></div>
                <a onclick="changeToDescription()" class="badge btn-green badge-button mr-2 text-white">Descrição</a>
                <a onclick="changeToManager()" class="badge btn-blue badge-button mr-2 text-white">Gerenciar</a>
                <a onclick="changeToProject()" class="badge btn-pink badge-button mr-2 text-white">Projeto</a>
            <div class="mt-4">
                <button class="btn img-btn next-week-btn"><div>Avançar semana</div><img src="assets/img/icons/arrow.png" alt="Avançar semana"> </button>
            </div>
        </div>
        <div id="description">
            <div align="center"><h2 class="title-card">Descrição</h2></div>
                <div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in iaculis mi, pharetra luctus ligula. Cras nunc arcu, imperdiet sed magna at, porta varius ex. Donec imperdiet justo id sapien pharetra, eu posuere nunc mollis. Donec mollis luctus augue, non egestas nunc mollis tempus. Sed ac eros sed magna iaculis luctus in quis tellus. Duis scelerisque et ipsum nec maximus. In hac habitasse platea dictumst. Sed feugiat, leo vitae interdum consectetur, risus tellus aliquam odio, non placerat odio dolor quis lorem. Morbi blandit magna sed orci sagittis ultrices. Suspendisse potenti. Quisque augue nulla, ultrices sed urna laoreet, mattis lobortis urna. Fusce dui nulla, molestie et sem quis, imperdiet gravida massa. Sed sodales quam vitae ligula vulputate, ac aliquam metus porttitor. Suspendisse vestibulum, nibh in suscipit dictum, quam enim maximus justo, cursus consectetur est lacus suscipit ipsum. Quisque tristique ullamcorper justo id laoreet.
                </div>
        </div>
        <div id="manager">
            <div align="center"><h2 class="title-card">Gerenciar</h2></div>
            <div>
                <div class="flex-a">
                    <div class="col-6" style="max-height: 320px; height:auto;">
                        <div class="title-manager" style="display:flex;justify-content:center"><p class="manager-title">500</p> <img class="icon-manager ml-3" src="assets/img/icons/money.png" alt="Dinheiro disponível"></div>
                        <div class="card card-manager">
                            <div id="card-team" class="card-body">
                                <h4 class="card-title mt-0 mb-1">Contratar</h4>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="max-height: 320px; height:auto;">
                        <div class="title-manager" style="display:flex;justify-content:center"><p class="manager-title">30</p> <img class="icon-manager ml-3" src="assets/img/icons/clock.png" alt="Tempo disponível"></div>
                        <div class="card card-manager">
                            <div id="card-actions" class="card-body">
                                <h4 class="card-title mt-0 mb-1">Processos</h4>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="project">
            <div align="center"><h2 class="title-card">Projeto</h2></div>
            <div class="row">
                <div class="col-lg-4 col-4">
                    <h5>Equipe</h5>
                    <p class="list-item my-0 font-bold">1 Backend</p>
                    <p class="list-item my-0 font-bold">2 Frontend</p>
                    <p class="list-item my-0 font-bold">1 Designer</p>
                    <p class="list-item my-0 font-bold">1 Testador</p>
                </div>
                <div class="col-lg-4 col-4">
                    <h5>Outros</h5>
                    <p class="list-item my-0 font-bold">1 Licenças IDE</p>
                    <p class="list-item my-0 font-bold">2 Licenças Software UI</p>
                </div>
                <div class="col-lg-4 col-4">
                    <h5>Status</h5>
                    <div>
                            <div align="center" class="progress-container col-12">
                                <span class="progress-badge text-red">Atrasado</span>
                                <div class="progress mt-1 pb">
                                    <div class="progress-bar progress-bar-striped bg-red" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100" style="width: 37%;">
                                    </div>
                                </div>
                                <span class="progress-badge text-red mt-1">45%</span>
                            </div>
                        </div>
                </div>
            </div>
            <h5>Ocorrências</h5>
            <div class="row">
                <div class="jumbotron card-oc col-12 p-0">
                    <div class="row my-1 ml-2">
                        <img class="minimize-icon-clock" src="assets/img/icons/useralert.png" alt="Preço">
                        <p class="list-item my-0 font-bold">Você possui dois programadores parados por falta de Licenças de IDE</p>
                    </div>
                    <div class="row my-1 ml-2">
                        <img class="minimize-icon-clock" src="assets/img/icons/alert.png" alt="Preço">
                        <p class="list-item my-0 font-bold">Um dos seus programadores backend está doente</p>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(() => {
        $("#btn-close").hide();
        $("#description").hide();
        $("#manager").hide();
        $("#project").hide();
        
        load = 0;

        arrayName = new Map();
        arrayName.set("bk",["Backend",1]);
        arrayName.set("cc",["Contato Cliente",0]);
        arrayName.set("dg",["Designer",1]);
        arrayName.set("dv",["Entrega Semanal",0]);
        arrayName.set("ft",["Frontend",1]);
        arrayName.set("ld",["L. Software UI",1]);
        arrayName.set("li",["Licença IDE",1]);
        arrayName.set("po",["Product Owner",1]);
        arrayName.set("ra",["A. Requisitos",1]);
        arrayName.set("rk",["A. Risco Semanal",0]);
        arrayName.set("sc",["Scrum Semanal",0]);
        arrayName.set("tt",["Testador",1]);
    });

    const changeToDescription = () => {
        $("#main").hide();
        $("#manager").hide();
        $("#project").hide();
        $("#description").show();
        $("#btn-close").show();
    };

    const changeToManager = () => {
        if(!load){
            var url = "http://localhost:8002/api/store";
            $.ajax({
                method: "GET",
                url: url,
                data: {}
            }).done( r => {
                var i = r.response[0];
                appendItem("bk",i.bk);
                appendItem("dg",i.dg);
                appendItem("tt",i.tt);
                appendItem("ra",i.ra);
                appendItem("po",i.po);
                appendItem("cc",i.cc);
                appendItem("dv",i.dv);
                appendItem("ft",i.ft);
                appendItem("ld",i.ld);
                appendItem("li",i.li);
                appendItem("rk",i.rk);
                appendItem("sc",i.sc);
                load = 1;
            }).fail( (err) => {
                console.log(err);
            });
        }

        $("#main").hide();
        $("#manager").show();
        $("#project").hide();
        $("#description").hide();
        $("#btn-close").show();
    };

    const changeToProject = () => {
        $("#main").hide();
        $("#manager").hide();
        $("#project").show();
        $("#description").hide();
        $("#btn-close").show();
    };

    const closeTab = () => {
        $("#main").show();
        $("#btn-close").hide();
        $("#description").hide();
        $("#manager").hide();
        $("#project").hide();
    };

    const appendItem = (key,value) => {
        var item = arrayName.get(key);
        var img = "clock.png";
        var cs = "minimize-icon-clock";
        var id = "#card-actions";

        if(item[1] == 1){
            img = "money.png";
            cs = "minimize-icon";
            id = "#card-team";
        }

        var html = "<div style=\"display:flex;justify-content:flex-start\">"+
                    "<p id="+ "'" + key + "'" +" class=\"m-0 list-item\">" + item[0] + "</p>"+
                    "<div class=\"row\" style=\"\"><div class=\"col-4\">"+
                    "<p id=" + "'" + key + "-price'" + "class=\"minimize-text\">"+ value +"</p></div>"+
                    "<div class=\"col-4\" style=\"text-transform: justify;\"> <img class=" + "'" + cs + "'" + "src=" + "assets/img/icons/"+ img + " alt=\"Preço\"></div>"+
                    "<div class=\"col-4\"><img class=\"minimize-icon-done\" src=\"assets/img/icons/done.png\" alt=\"Comprar\"></div></div>"+
                    "</div>";

        $(id).append(html);
    }
</script>
@endsection