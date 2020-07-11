@extends('layout.app')

@section('content')
<div class="col-lg-8 col-md-12 col-sm-12 col-12">
    <div id="messages">
        
    </div>
    <div align="center"><h1 class="title-page">Manager</h1></div>
    <div class="jumbotron p-4 card-default col-lg-12 col-md-12 col-sm-12 bg-lg-green">
    <div id="btn-close" class="btn-close pos-close"><a onclick="closeTab()">X</a></div>
    <div align="center" id="content-game">
            <div id="main">
            <div class="flex-a w-50 mb-3">
                @for ($i = 1; $i <= $week; $i++)
                    <span id="week-badge-<?php echo $i?>" class="badge badge-blue">{{$i}}</span>
                @endfor

                @for ($i = $week + 1; $i <= 8; $i++)
                    <span id="week-badge-<?php echo $i?>" class="badge badge-transparent">{{$i}}</span>
                @endfor
            </div>
            <div align="center" id="week-title"><h2 class="title-card clear-week">Semana {{$week}}</h2></div>
                <a onclick="changeToDescription()" class="badge btn-green badge-button mr-2 text-white">Descrição</a>
                <a onclick="changeToManager()" class="badge btn-blue badge-button mr-2 text-white">Gerenciar</a>
                <a onclick="changeToProject()" class="badge btn-pink badge-button mr-2 text-white">Projeto</a>
            <div class="mt-4">
                <button onclick="nextWeek()" class="btn img-btn next-week-btn"><div>Avançar semana</div><img src="assets/img/icons/arrow.png" alt="Avançar semana"> </button>
            </div>
        </div>
        <div class="d-none" id="description">
            <div align="center"><h2 class="title-card">Descrição</h2></div>
                <div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in iaculis mi, pharetra luctus ligula. Cras nunc arcu, imperdiet sed magna at, porta varius ex. Donec imperdiet justo id sapien pharetra, eu posuere nunc mollis. Donec mollis luctus augue, non egestas nunc mollis tempus. Sed ac eros sed magna iaculis luctus in quis tellus. Duis scelerisque et ipsum nec maximus. In hac habitasse platea dictumst. Sed feugiat, leo vitae interdum consectetur, risus tellus aliquam odio, non placerat odio dolor quis lorem. Morbi blandit magna sed orci sagittis ultrices. Suspendisse potenti. Quisque augue nulla, ultrices sed urna laoreet, mattis lobortis urna. Fusce dui nulla, molestie et sem quis, imperdiet gravida massa. Sed sodales quam vitae ligula vulputate, ac aliquam metus porttitor. Suspendisse vestibulum, nibh in suscipit dictum, quam enim maximus justo, cursus consectetur est lacus suscipit ipsum. Quisque tristique ullamcorper justo id laoreet.
                </div>
        </div>
        <div class="d-none" id="manager">
            <div align="center"><h2 class="title-card">Gerenciar</h2></div>
            <div>
                <div class="row">
                    <div class="col-12 col-lg-6 col-sm-12 col-md-12 mt-sm-auto" style="max-height: 320px; height:auto;">
                        <div class="title-manager" style="display:flex;justify-content:center"><p class="manager-title" id="money-project"></p> <img class="icon-manager ml-3" src="assets/img/icons/money.png" alt="Dinheiro disponível"></div>
                        <div class="card card-manager">
                            <div class="card-body">
                                <h4 class="card-title mt-0 mb-1">Contratar</h4>
                                <table class="table table-sm">
                                    <tbody>
                                        <div id="card-team" class="row">

                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-sm-12 col-md-12" style="max-height: 320px; height:auto">
                        <div class="title-manager" style="display:flex;justify-content:center"><p class="manager-title" id="clock-project"></p> <img class="icon-manager ml-3" src="assets/img/icons/clock.png" alt="Tempo disponível"></div>
                        <div class="card card-manager">
                            <div class="card-body">
                                <h4 class="card-title mt-0 mb-1">Processos</h4>
                                <table class="table table-sm">
                                    <tbody id="card-actions">
                                    <div id="card-actions" class="row">

                                    </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none" id="project">
            <div align="center"><h2 class="title-card">Projeto</h2></div>
            <div class="row">
                <div class="col-lg-4 col-4">
                    <h5>Equipe</h5>
                    <div id="list-team">

                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <h5>Outros</h5>
                    <div id="list-others">

                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <h5>Status</h5>
                    <div>
                            <div align="center" class="progress-container col-12">
                                <span class="progress-badge" id="status-project"></span>
                                <div class="progress mt-1 pb">
                                    <div class="progress-bar progress-bar-striped" id="status-pg-bar" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100" style="width: 37%;">
                                    </div>
                                </div>
                                <span class="progress-badge mt-1" id="status-percentage" ></span>
                            </div>
                        </div>
                </div>
            </div>
            <h5>Ocorrências</h5>
            <div class="row">
                <div id="div-occurrences" class="jumbotron card-oc col-12 p-0">
                            
                </div>
            </div>
        </div>
    </div>
    <div align="center" id="new-game" class="mt-5">
        <div><h3 class="mr-2 text-blue" style="text-transform: uppercase"><strong>Criando novo game</strong></h3></div>
            <div class="col-10 mt-5">
                <img id="loading" src="assets/img/icons/circle.png">
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
        $("#new-game").hide();
        $("#description").removeClass("d-none");
        $("#manager").removeClass("d-none");
        $("#project").removeClass("d-none");
        
        updateAmount();
        
        load = 0;
        time = 0;
        round = 0;

        <?php if($new) {?>
           $("#content-game").hide();
           $("#new-game").show();
           interval = window.setInterval(loading, 300);
        <?php } ?>

        <?php if(isset($message)) {?>
            alert("<?php echo $message?>");
        <?php } ?>

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
            
            $.ajax({
                method: "POST",
                url: "<?php echo $url ?>",
                crossDomain: true,
                headers: {
                    'Content-Type' : 'application/json',
                    'api-key': "<?php echo $key?>"
                },
                data: {ms: "manager", action: "store"},
            }).done( r => {
                console.log(r)
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
               $(".card-manager").css("width", "auto");
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
        $.ajax({
            method: "POST",
            url: "<?php echo $url ?>",
            crossDomain: true,
            headers: {
                    'Content-Type' : 'application/json',
                    'api-key': "<?php echo $key?>"
                },
            data: { ms: "manager", action: "find", params: {user_id: <?php echo Auth::user()->id ?>, manager_id: '<?php echo $manager_id?>'} }
        }).done( r => {
            var res = r.response[0];
            var t = res.team;
            var l = res.license;
            $('.clear-loaded').remove();
            appendProjectItem("bk",t.backend,1);
            appendProjectItem("ft",t.frontend,1);
            appendProjectItem("dg",t.designer,1);
            appendProjectItem("tt",t.tester,1);
            appendProjectItem("ra",t.requirement_analyst,1);
            appendProjectItem("po",t.product_owner,1);
            appendProjectItem("li",l.ide);
            appendProjectItem("ld",l.design_software);

            $('.clear-div-occurrences').remove();
            if(res.manager_occurrence != null){
                res.manager_occurrence.forEach( r => {
                    appendProjectOccurrence(r.occurrence.description);
                });
            }

            if(res.user_occurrence != null){
                res.user_occurrence.forEach( r => {
                    appendProjectOccurrence(r.occurrence.description,1);
                });
            }

            var progress = Math.round(res.progress * 100);

            updateStatus(res.progress_status, progress);
            
        }).fail( (err) => {
            console.log(err);
        });

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
        var type = "A";

        if(item[1] == 1){
            img = "money.png";
            cs = "minimize-icon";
            id = "#card-team";
            type = "T"

            if(key == "li" || key == "ld"){
                type = "L"
            }

        }

        var html = "<tr class='col-12' px-1'>"+
                    "<div class='row'>"+
                    "<div style=\"display:flex;justify-content:space-between\">"+
                    "<div><td class='px-2'>"+item[0]+"</td>"+
                    "<td class='px-1'>"+value+"<img class=" + "'" + cs + " img-fluid'" + "src=" + "assets/img/icons/"+ img + ">"+"</td></div>"+
                    "<div><td class='px-0'>"+"<img onclick=\"buyItem('"+ key + "','" + value + "','" + type +"')\" class=\"img-fluid minimize-icon-done\" src=\"assets/img/icons/done.png\">"+"</td></div>"+
                    +"</div></tr>"

        $(id).append(html);
    }

    const loading = () => {
        if(time > 0){
            var t = time - 1;
            $("#loading").removeClass("loading-"+t);
        }
        
        $("#loading").addClass("loading-"+time);
        time += 1;
        
        if(time >= 12){
            var t = time - 1;
            $("#loading").removeClass("loading-"+t);
            time = 0;
            round +=1;
            if(round > 1){
                clearInterval(interval);
                initGame();
            }
        }
    }

    const initGame = () => {
        $("#content-game").show();
        $("#new-game").hide();
    }

    const appendProjectItem = (key,value,team = 0) => {
        var item = arrayName.get(key);
        var id = "#list-others";

        if(team == 1){
            id = "#list-team";
        }
        
        var html = "<p class=\"list-item my-0 ml-4 font-bold text-project clear-loaded\">" + value + "&nbsp;&nbsp;" + item[0] + "</p>";

        $(id).append(html);
    }

    const appendProjectOccurrence = (value,user = 0) => {
        var img = "alert.png";
        var id = '#div-occurrences';

        if(user == 1){
            id = "user_alert.png";
        }
        
        var html = "<div class=\"row my-1 ml-2 clear-div-occurrences\">" +
                    "<img class=\"minimize-icon-clock\" src=\"assets/img/icons/"+img+"\">"+
                    "<p class=\"list-item my-0 font-bold\">"+ value +"</p>"+
                    "</div>";

        $(id).append(html);
    }

    const updateStatus = (status,perc) => {
        var st = "Normal";
        var color = "navy-blue";
       
        $(".clear-status").remove();

        if(status == "L"){
            st = "Atrasado";
            color = "red";
        }

        if(status == "A"){
            st = "Adiantado";
            color = "green";
        }

        var p = "<div class=\"clear-status text-"+ color +"\">" + perc + "%</div>";
        var s = "<div class=\"clear-status  text-"+ color +"\">" + st + "</div>";
        
        var cs = "bg-"+color;

        $("#status-project").append(s);
        $("#status-percentage").append(p);

        $("#status-pg-bar").removeClass("bg-blue");
        $("#status-pg-bar").removeClass("bg-red");
        $("#status-pg-bar").removeClass("bg-green");
        $("#status-pg-bar").addClass(cs);
        $('#status-pg-bar').attr('aria-valuenow', perc).css('width', perc);
    }

    const buyItem = (key,price,type) => {
        $.ajax({
            method: "POST",
            url: "<?php echo $url?>",
            crossDomain: true,
            headers: {
                    'Content-Type' : 'application/json',
                    'api-key': "<?php echo $key?>"
                },
            data: { ms: "manager", action: "transaction", params: {user_id: <?php echo Auth::user()->id ?>, manager_id: '<?php echo $manager_id?>', item: key, type: type}}
        }).done( r => {
           var res = r.response[0];
           console.log(res);
           if(res.done == 1){
               updateAmount();
           } else {
               if(res.errCode == 1){
                   addAlert("Saldo insuficiente",1);
               } else {
                    addAlert("Desculpe, essa operação não é válida",1);
               }
           }
        }).fail( (err) => {
            console.log(err);
        });
    }

    const updateAmount = () => {
        $.ajax({
            method: "POST",
            url: "<?php echo $url ?>",
            crossDomain: true,
            headers: {
                    'Content-Type' : 'application/json',
                    'api-key': "<?php echo $key?>"
                },
            data: { ms: "manager", action: "find", params: {msuser_id: <?php echo Auth::user()->id ?>, manager_id: '<?php echo $manager_id?>' }}
        }).done( r => {
            var idm = "#money-project";
            var idc = "#clock-project";
            var res = r.response[0];
            var money = res.money;
            var time = res.time;
            var html_money = "<div class=\"clear-amount\">"+money+"</div>";
            var html_clock = "<div class=\"clear-amount\">"+time+"</div>";

            $(".clear-amount").remove();
            $(idm).append(html_money);
            $(idc).append(html_clock);
        }).fail( (err) => {
            console.log(err);
        });
    }

    addAlert = (message,error = 0) => {
        var icon = "ui-2_like";
        var cs = "alert-success";

        if(error){
            icon = "";
            cs = "alert-danger";
        }
        
        var html =  "<div class=\"alert " +cs+ "\" role=\"alert\">"+
                    "<div class=\"container\" id=\"messages\">"+
                    "<div class=\"alert-icon\">"+
                    "<i class=\"now-ui-icons " + icon + "\"></i>"+
                    "</div>"+
                    message +
                    "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">"+
                    "<span aria-hidden=\"true\">"+
                    "<i class=\"now-ui-icons ui-1_simple-remove\"></i>"+
                    "</span>"+
                   "</button> </div>";
        $("#messages").append(html);
    }

    const nextWeek = () => {
        var c = confirm('Tem certeza que deseja avançar para próxima semana?'); 
        
        if(!c){
            return;
        }

        $.ajax({
            method: "POST",
            url: "<?php echo $url?>",
            crossDomain: true,
            headers: {
                    'Content-Type' : 'application/json',
                    'api-key': "<?php echo $key?>"
                },
            data: { ms: "manager", action: "next", params:{user_id: <?php echo Auth::user()->id ?>, manager_id: '<?php echo $manager_id?>'}}
        }).done( r => {
            var res = r.response[0];
            updateWeekInView(res.week,res.money,res.time);
        }).fail( (err) => {
            console.log(err);
        });
    }

    const updateWeekInView = (week,value,time) => {
        var old = week - 1;
        var html = "<h2 class=\"title-card clear-week\">Semana " + week + "</h2>";
        var id = "#week-badge-" + week;
        $(".clear-week").remove();
        $(".clear-amount").remove();
        var h1 = "<div class=\"clear-amount\">" + value + "</div>";
        var h2 = "<div class=\"clear-amount\">" + time + "</div>";

        $("#money-project").append(h1);
        $("#clock-project").append(h2);
        $(id).removeClass("badge-transparent");
        $(id).addClass("badge-blue");
        $("#week-title").append(html);
    }   
    
</script>
@endsection