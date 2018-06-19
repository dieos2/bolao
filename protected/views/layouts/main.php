<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en" class="app">

    <head>
        <meta charset="utf-8" />
        <title>Bolão da Copa Online | Web Application</title>
        <meta name="description" content="Sistema de Bolão para os frescos não pertubarem mais" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120532595-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120532595-1');
</script>

        <link rel="stylesheet" href="css/app.v2.css" type="text/css" />
        <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="js/calendar/bootstrap_calendar.css" type="text/css" cache="false" />
        <!--[if lt IE 9]> <script src="js/ie/html5shiv.js" cache="false"></script> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/excanvas.js" cache="false"></script> <![endif]-->
  <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
<link rel="manifest" href="js/manifest.json">
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAD3yP6i5UfcQ169MNBkMn3euQBsAhFQ68",
    authDomain: "bolaocopa-7b8d0.firebaseapp.com",
    databaseURL: "https://bolaocopa-7b8d0.firebaseio.com",
    projectId: "bolaocopa-7b8d0",
    storageBucket: "",
    messagingSenderId: "539451403175"
  };
  
  firebase.initializeApp(config);
  // Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.usePublicVapidKey("BPwW-KPEq9rPCUXAyo9AgVAHSMObHcoeWz2APxwleZVKZXrfb3z39QUEdGXPQOtgXJY-F1dtY0TJU4nOJ6epuYE");
messaging.requestPermission().then(function() {
  console.log('Notification permission granted.');
  // TODO(developer): Retrieve an Instance ID token for use with FCM.
  // ...
}).catch(function(err) {
  console.log('Unable to get permission to notify.', err);
});
 messaging.onMessage(function(payload) {
	 console.log(mensagem, payload);
 });
  </script>
  <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js"></script>
  <script src="js/firebase-messaging-sw.js"></script>
	  <script src="js/app.v2.js"></script>
        <!-- Bootstrap -->
        <!-- App -->
        <script src="js/charts/easypiechart/jquery.easy-pie-chart.js" cache="false"></script>
        <script src="js/charts/sparkline/jquery.sparkline.min.js" cache="false"></script>
        <script src="js/charts/flot/jquery.flot.min.js" cache="false"></script>
        <script src="js/charts/flot/jquery.flot.tooltip.min.js" cache="false"></script>
        <script src="js/charts/flot/jquery.flot.resize.js" cache="false"></script>
        <script src="js/charts/flot/jquery.flot.grow.js" cache="false"></script>
        <script src="js/charts/flot/demo.js" cache="false"></script>
        <script src="js/calendar/bootstrap_calendar.js" cache="false"></script>
        <script src="js/calendar/demo.js" cache="false"></script>
        <script src="js/sortable/jquery.sortable.js" cache="false"></script>
    </head>

    <body>
        <section class="vbox">
            <header class="bg-dark dk header navbar navbar-fixed-top-xs">
                <div class="navbar-header aside-md">
                    <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
                        <i class="fa fa-bars"></i> 
                    </a>
                    <a href="#" class="navbar-brand" data-toggle="fullscreen">
                        <img src="images/logo.png" class="m-r-sm">Bolão da Copa</a>
                    <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                        <i class="fa fa-cog"></i> 
                    </a>
                </div>
                <ul class="nav navbar-nav hidden-xs">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
                            <i class="fa fa-building-o"></i>
                            <span class="font-bold">Activity</span> 
                        </a>
                        <section class="dropdown-menu aside-xl on animated fadeInLeft no-borders lt">
                            <div class="wrapper lter m-t-n-xs">
                                <a href="#" class="thumb pull-left m-r">
                                    <img src="images/avatar.jpg" class="img-circle">
                                </a>
                                <div class="clear">
                                    <a href="#">
                                        <span class="text-white font-bold">@Mike Mcalidek</span>
                                    </a>

                                    <small class="block">Art Director</small>
                                    <a href="#" class="btn btn-xs btn-success m-t-xs">Upgrade</a>
                                </div>
                            </div>
                            <div class="row m-l-none m-r-none m-b-n-xs text-center">
                                <div class="col-xs-4">
                                    <div class="padder-v">
                                        <span class="m-b-xs h4 block text-white">245</span>
                                        <small class="text-muted">Followers</small> 
                                    </div>
                                </div>
                                <div class="col-xs-4 dk">
                                    <div class="padder-v">
                                        <span class="m-b-xs h4 block text-white">55</span> 
                                        <small class="text-muted">Likes</small>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="padder-v">
                                        <span class="m-b-xs h4 block text-white">2,035</span>
                                        <small class="text-muted">Photos</small> 
                                    </div>
                                </div>
                            </div>
                        </section>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right hidden-xs nav-user">
                    <li class="hidden-xs">


                    </li>
                    <li class="dropdown hidden-xs">


                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="thumb-sm avatar pull-left">
                                <img src="images/<?php
                                $id_user = Yii::app()->user->getId();
                                $model2 = User::model()->findByPk($id_user);
                                echo $model2->username
                                ?>.jpg">
                            </span><?php
                            $id_user = Yii::app()->user->getId();
                            $model2 = User::model()->findByPk($id_user);
                            echo $model2->username
                            ?>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight">
                            <span class="arrow top"></span>
                            <li> <a href="#">Settings</a> 
                            </li>
                            <li>
                                <a href="index.php?r=perfil/trocasenha">Trocar Senha</a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge bg-danger pull-right">3</span> Notifications</a>
                            </li>
                            <li>
                                <a href="docs.html">Help</a> 
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="index.php?r=site/logout" data-toggle="ajaxModal">Logout</a> 
                            </li>
                        </ul>
                    </li>
                </ul>
            </header>
            <section>
                <section class="hbox stretch">
                    <!-- .aside -->
                    <aside class="bg-dark lter aside-md hidden-print" id="nav">
                        <section class="vbox">

                            <section class="w-f scrollable">
                                <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                                    <!-- nav -->
                                    <nav class="nav-primary hidden-xs">
                                        <ul class="nav">
                                            <li class="active">
                                                <a href="index.php?r=confronto/index&id=0" class="active">
                                                    <i class="fa fa-bolt icon">
                                                        <b class="bg-danger"></b>
                                                    </i>  <span>Confrontos</span>
                                                </a>
                                            </li>
<li class="">
                                                <a href="index.php?r=confronto/index&id=9" class="active">
                                                    <i class="fa fa-columns icon">
                                                        <b class="bg-warning"></b>
                                                    </i><span>Final</span>
                                                </a>
                                            </li>
											<li class="">
                                                <a href="index.php?r=confronto/index&id=13" class="active">
                                                    <i class="fa fa-columns icon">
                                                        <b class="bg-warning"></b>
                                                    </i><span>Disputa de 3º Lugar</span>
                                                </a>
                                            </li>
											
											<li class="">
                                                <a href="index.php?r=confronto/index&id=12" class="active">
                                                    <i class="fa fa-columns icon">
                                                        <b class="bg-warning"></b>
                                                    </i><span>Semifinal</span>
                                                </a>
                                            </li>
                                              <li class="">
                                                <a href="index.php?r=confronto/index&id=11" class="active">
                                                    <i class="fa fa-columns icon">
                                                        <b class="bg-warning"></b>
                                                    </i><span>Quartas</span>
                                                </a>
                                            </li>
                                             <li class="">
                                                <a href="index.php?r=confronto/index&id=10" class="active">
                                                    <i class="fa fa-columns icon">
                                                        <b class="bg-warning"></b>
                                                    </i><span>Oitavas</span>
                                                </a>
                                            </li>
                                           
                                            <li class="">
                                                <a href="index.php?r=rank&id=<?php echo Yii::app()->user->getId(); ?>" class="active">
                                                    <i class="fa fa-dashboard icon">
                                                        <b class="bg-danger"></b>
                                                    </i>  <span>Meus Pontos</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#layout">
                                                    <i class="fa fa-columns icon">
                                                        <b class="bg-warning"></b>
                                                    </i>
                                                    <span class="pull-right">
                                                        <i class="fa fa-angle-down text"></i>
                                                        <i class="fa fa-angle-up text-active"></i> </span>
                                                    <span>Grupos</span> 
                                                </a>
                                                <ul class="nav lt">
                                                    <li>
                                                        <a href="index.php?r=grupoTime&id=1"> <i class="fa fa-angle-right"></i>  <span>A</span> 
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index.php?r=grupoTime&id=2"> <i class="fa fa-angle-right"></i>  <span>B</span> 
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index.php?r=grupoTime&id=3"> <i class="fa fa-angle-right"></i>  <span>C</span> 
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index.php?r=grupoTime&id=4"> <i class="fa fa-angle-right"></i>  <span>D</span> 
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index.php?r=grupoTime&id=5"> <i class="fa fa-angle-right"></i>  <span>E</span> 
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index.php?r=grupoTime&id=6"> <i class="fa fa-angle-right"></i>  <span>F</span> 
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index.php?r=grupoTime&id=7"> <i class="fa fa-angle-right"></i>  <span>G</span> 
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index.php?r=grupoTime&id=8"> <i class="fa fa-angle-right"></i>  <span>H</span> 
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a href="index.php?r=rank/GetRank">
                                                    <i class="fa fa-bars icon">
                                                        <b class="bg-success"></b>
                                                    </i>

                                                    <span>Rank</span>
                                                </a>

                                            </li>


                                        </ul>
                                    </nav>
                                    <!-- / nav -->
                                </div>
                            </section>
                            <footer class="footer lt hidden-xs b-t b-dark">

                                <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon"> <i class="fa fa-angle-left text"></i>  <i class="fa fa-angle-right text-active"></i> 
                                </a>

                            </footer>
                        </section>
                    </aside>
                    <!-- /.aside -->
                    <section id="content">
                        <section class="vbox">
                            <section class="scrollable ">
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- topo -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-6679421319462361"
     data-ad-slot="5462408038"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php echo $content; ?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- footer -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-6679421319462361"
     data-ad-slot="6233522089"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
                            </section>
                            <aside class="bg-light lter b-l aside-md hide" id="notes">
                                <div class="wrapper">Notification</div>
                            </aside>
                        </section>
                    </section>
                </section>

                </body>
<script>
    $(function(){
        
        setInterval(function() {
                   $.ajax({
            type: "get",
            url: "index.php?r=site/atualiza",
           
            dataType: "json",
            success: function(response, status) {
              debugger;          
              
             
            },
            error: function(response, status) {

            },
        });
        },60000);
    });
 function MandaMensagem(mensagem){
	 debugger;
	 messaging.onMessage(function(payload) {
	 console.log(mensagem, payload);
 });}
</script>
                </html>
