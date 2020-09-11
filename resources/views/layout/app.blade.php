<!--

=========================================================
* Now UI Kit - v1.3.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-kit
* Copyright 2019 Creative Tim (http://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/icons/favicon.png">
  <link rel="icon" type="image/png" href="../assets/img/icons/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/countdown.css" rel="stylesheet" />

  <link href="../assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/css/style.css" rel="stylesheet" />
  <link href="../assets/css/chat.css" rel="stylesheet" />

   <!--   Core JS Files   -->
   <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVKjHMzN-gncXoFcOhL45VxYq7-XG1HsA"></script> -->
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
  <!-- SendBird Chat -->
  <!-- <script src="../assets/sendbird/SendBird.min.js"></script> -->
 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>

 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>

<body class="login-page sidebar-collapse">
    <div id="app">
            @auth
                <div>
                <nav class="navbar navbar-expand-lg bg-blue">
                    <div class="container">
                    <a class="navbar-brand" href="/"><b><span class="text-gray fs-20">Quality</span><span class="text-green fs-20">Gamer</span></b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar" data-nav-image="assets/img/blurred-image-1.jpg">
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/manager">
                            <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/store">
                            <p>Loja</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tests">
                            <p>Conquistas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ranking">
                            <p>Ranking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">
                            <p><img class="navbar-img" src="./assets/img/avatar/pumpkin.png"></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                            <p><span class="mr-1 fs-12">2000</span><img class="navbar-img" src="./assets/img/icons/coin_green.png"></p>
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="/profile">
                            <p><img class="navbar-img" src="./assets/img/icons/network.png"></p>
                            </a>
                        </li>
                        <form class="form-inline ml-auto" action="logout" method="post" data-background-color>
                            @csrf
                            <div class="form-group has-white">
                                <input type="submit" class="form-control bold" value="Sair">
                            </div>
                        </form>

                        </ul>
                    </div>
                    </div>
                </nav>
                </div>
            @endauth

        <main>
            <h2 align="center" style="text-transform: uppercase" class="text-orange">@yield('title')</h2>
            <div align="center" style="font-size:16px;"  id="page-alert"></div>
            @auth
            <div class="container">
            <div class="row" style="margin-top:80px">
            <div class="col-lg-3 col-md-12 col-sm-12 col-12 mb-5">
                <div>
                    <div class="card-user">
                        <div align="center" class="text-rookie mt-2 bold">Rookie</div>
                        <div align="center" class="mt-2 bold">Desenvolvedor Backend</div>
                        <div align="center" class="mt-2 bold">Iago</div>
                        <div class="flex-a">
                            <div align="center" class="mt-3 mb-3 char"><img src="../assets/img/char/pumpkin.png"></div>
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
            <div class="col-lg-1 col-md-12 col-1"></div>
            @endauth
            @yield('content')
            </div>
            </div>
        </div>
        @guest
        <div id="chat-min-div" class="col-lg-3 col-md-3 col-sm-6 col-6 chat">
            <div class="card card-min"">
            <div style="display:flex; justify-content:space-between">
                <h4 class="card-min-title">
                Chat <i class="now-ui-icons ui-2_chat-round" style="position:relative;top:3px"></i>
                </h4>
                <div style="margin-top:4px; margin-right:4px" onclick="showChat()" id="div-open">
                    <i class="now-ui-icons arrows-1_minimal-up"></i>
                </div>
            </div>
            </div>
        </div>
        <div id="chat-div" class="col-lg-3 col-md-3 col-sm-6 col-6 chat">
                    <div class="card">
                        <div class="card-body container">
                            <div style="display:flex; justify-content:space-between">
                                <h4 class="card-title box-title">
                                Chat
                                </h4>
                                <div onclick="hideChat()" id="div-close">
                                    <i class="now-ui-icons arrows-1_minimal-down"></i>
                                </div>
                            </div>
                            <div class="card-content row">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-4 card-overflow-y">
                                    <ul class="list-group" style="list-style-type:none;">
                                        <li class="chat-avatar" id="user-7"><span class="badge badge-danger" id="clear-count-7" style="background-color:transparent;border-color:transparent;color:transparent;z-index:1000;position:relative;top:17px;left:8px">0</span><img src="https://media-exp1.licdn.com/dms/image/C4E03AQF6_Y5xP6pd7w/profile-displayphoto-shrink_200_200/0?e=1605139200&v=beta&t=EAc_MK9AF9YiWgQNrXBZD5YTFcu3jVZ2-isWfA4k7hI" class="figure-img img-fluid rounded" style></li>
                                        <li class="chat-avatar"><span class="badge badge-danger" id="clear-count-4" style="background-color:transparent;border-color:transparent;color:transparent;z-index:1000;position:relative;top:17px;left:8px">0</span><img src="https://media-exp1.licdn.com/dms/image/C4E03AQF6_Y5xP6pd7w/profile-displayphoto-shrink_200_200/0?e=1605139200&v=beta&t=EAc_MK9AF9YiWgQNrXBZD5YTFcu3jVZ2-isWfA4k7hI" class="figure-img img-fluid rounded" style></li>
                                        <!-- <div align="center"><li class="chat-avatar"><div align="center" class="bg-blue py-1 badge"><strong><span style="font-size:18px;">+</span></strong></li></div> -->
                                    </ul>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-8">
                                    <div id="messenger-box" class="messenger-box card-overflow-y" style="overflow-x:none;">
                                    <div id="empty-chat" class="card-subtitle mb-2 text-muted">
                                    <div><h6>Ops! Vocês ainda não mandaram nenhuma mensagem =(</h6></div>
                                    <!-- <div style="" class="lds-hourglass"></div> loading -->
                                    </div>
                                    </div><!-- /.messenger-box -->
                                    <div class="send-mgs">
                                            <div class="yourmsg">
                                                <input id="input-msg" class="form-control" type="text">
                                            </div>

                                            <button onclick="sendMessage()" type="button" id="btn-msg" class="msg-send-btn">
                                                <div>
                                                    <i class="now-ui-icons ui-1_send"></i>
                                                </div>
                                            </button>
                                        </div>
                                </div>
                            </div>
                        </div> <!-- /.card-body -->
                        <div class="footer-inner bg-white">
                        <div class="row">
                            <div class="col-sm-6">
                                Copyright &copy; 2018 Ela Admin
                            </div>
                            <div class="col-sm-6 text-right">
                                Designed by <a target="_blank" href="https://colorlib.com">Colorlib</a>
                            </div>
                        </div>
                    </div>
                    </div><!-- /.card -->
                </div>
        @endguest
    </main>

    @yield('scripts')

    <script>
        $(document).ready(function(){
            hideChat();
            my_name = null;
            your_name = null;
            my_id = 2;
            your_id = null;


            socket = io.connect("https://qg-chat.herokuapp.com/");
            socket.emit('news', {user_id_1: 1});
            openChat();
            socket.on('message', (data) => {
                console.log(data);
                json = JSON.parse(data);
                if(json.count) {
                    addCountNew(json);
                } else {
                    addMessage(json);
                }
                scrollTopAnimated();
            });
        });

        openChat = () => {
             var messageObject = {
                author : 'Iago',
                message : 'Oi tudo bem?',
                user_id_1 : 7,
                user_id_2 : 2
            }
            getUser(messageObject.user_id_2);
            socket.emit('openChatRoom', messageObject);
        }

        sendMessage = () => {
            var msg = $("#input-msg").val();
            $("#input-msg").val('');

            var messageObject = {
                author : 'QualityGamer',
                message : msg,
                user_id_1 : 2,
                user_id_2 : 7
            }
            socket.emit('sendMessage', messageObject);
        }

        hideChat = () => {
            $("#chat-div").hide();
            $("#chat-min-div").show();
        }

        showChat = () => {
            $("#chat-min-div").hide();
            $("#chat-div").show();
            scrollTopAnimated();
        }

        addMessage = (message) => {
            $("#empty-chat").hide();
            var image = "https://media-exp1.licdn.com/dms/image/C4E03AQF6_Y5xP6pd7w/profile-displayphoto-shrink_200_200/0?e=1605139200&v=beta&t=EAc_MK9AF9YiWgQNrXBZD5YTFcu3jVZ2-isWfA4k7hI";

            if(my_id == message.user_id) {
                var html = getSendHTMLMessages(message.user_id,message.message,image,message.datetime);
            } else {
                var html = getReceivedHTMLMessages(message.user_id,message.message,image,message.datetime);
            }

            $("#messenger-box").append(html);
            fillUser(your_name);
        }

        getReceivedHTMLMessages = (username,msg,profile_url,date) => {
            var received_msg_html = '<ul><li><div class="msg-received msg-received-call msg-container"><div class="avatar">'+
            '<img src="'+profile_url+'" alt="">'+
            '<div class="send-time">'+getDateTime(date)+'</div></div><div class="msg-box"><div class="inner-box"> <div class="name">'+
            '<span class="user-name"></span>' + '</div><div class="meg">'+msg+'</div></div></div></div></li></ul>';
            return received_msg_html;
        }
        getSendHTMLMessages = (username,msg,profile_url,date) => {
            var send_msg_html = '<ul><li><div class="msg-sent msg-sent-call msg-container"><div class="avatar">'+
            '<img src="'+profile_url+'" alt="">'+
            '<div class="send-time">'+getDateTime(date)+'</div></div><div class="msg-box"><div class="inner-box"> <div class="name">'+
            '<span class="user-name"></span>' + '</div><div class="meg">'+msg+'</div></div></div></div></li></ul>';
            return send_msg_html;
        }

        getDateTime = (timestamp) => {
            var ts = Math.trunc(timestamp/1000);
            dateObj = new Date(ts * 1000);
            brString = dateObj.toLocaleString("pt-BR", {timeZone: "America/Sao_Paulo"});
            return brString;
        }

        getUser = (uid) => {
            $.ajax({
            method: "POST",
            url: "https://qg-usuario.herokuapp.com/api/user?user_id=1",
            crossDomain: true,
            data: { user_id: 1}
            }).done( (r) => {
                your_name = r.name;
                your_id = r.id;
            });
        }

        fillUser = (name) => {
            $(".user-name").text(name);
        }

        scrollTopAnimated = () => {

            var scroll = $("#messenger-box");
            var totalOverflow = scroll.css('height');
            var toverflow = totalOverflow.split('px');
            var velocity = 5; //to force fast and whole animated
            $("#messenger-box").animate(
                { scrollTop: toverflow[0] * velocity}, 100);
        }

        addCountNew = (data) => {
            var id = "#user-"+data.user_id;
            var cc = "clear-count-"+data.user_id;
            $("#"+cc).remove();
            var html = '<span class="badge badge-danger" id="'+cc+'" style="z-index:1000;position:relative;top:17px;left:8px">'+data.count+'</span>';
            $(id).prepend(html);
        }

        $(document).on('keypress',function(e) {
            if(e.which == 13) {
                if($("#input-msg").is(":focus") && $("#input-msg").val().length > 0) {
                    sendMessage();
                }
            }
        });
    </script>

</body>
</html>
