<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */


?>

<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
    <meta charset="utf-8" />
    <title>Bolão da Copa Online | Web Application</title>
    <meta name="description" content="Sistema de Bolão para os frescos não pertubarem mais" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v2.css" type="text/css" />
    <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js" cache="false"></script> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/excanvas.js" cache="false"></script> <![endif]-->
</head>
<body>
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
        <div class="container aside-xxl"><a class="navbar-brand block" href="index.html">Bolão da Copa Online</a>
          
<div class = "col-sm-6 col-md-12">

    <section class = "panel panel-default">
        <header class = "panel-heading">RANK</header>
       
        <table class = "table table-striped m-b-none text-sm">
            <thead>
                <tr>
                    <th colspan="2">Classificação</th>
                    <th>Pontos</th>
                    <th>A</th>
                    <th>R</th>
                    
                </tr> </thead>
            <tbody>
                <?php 
                
                $conta = 1;
                $posicao  = '';
                foreach ($dataProvider as $item) {
                   $posicaoAtual = RankController::actionGetPosicaoAtual($item["id"]);
                   $posicaoAnterior = RankController::actionGetPosicaoAntiga($item["id"]);
                   if($posicaoAtual > $posicaoAnterior){
                       
                       $posicao  = '<i style="color:red" class="fa fa-arrow-down"></i>';
                   }else if($posicaoAtual == $posicaoAnterior){
                       $posicao='<i  class="fa fa-square"></i>';
                   }else{
                        $posicao='<i style="color:green" class="fa fa-arrow-up"></i>';
                   }
                    echo '<tr>';
                    if($conta == 1){
                      echo '<td style="color: #468847;background-color: #dff0d8;border-color: #d6e9c6;"> '.$conta.'º  <i class="fa fa-trophy"></i></td>';
                    }  else {
                          echo '<td>'.$conta.'º '.$posicao.'</td>';
                    }
                     echo '<td style="width:40%"><span class="thumb-sm avatar pull-left">
                                <img src="images/'.$item["nome"].'.jpg" />
                            </span> ' . strtoupper($item["nome"]).'</td>';
                 
                   echo '<td><strong>'.$item["pontos"].'</strong></td>';
                   echo '<td class = "text-success"><strong>';
                    echo   $item["acertos"].'</strong></td>';
                     echo '<td class = "text-info"><strong>';
                    echo   $item["resultados"].'</strong></td>';
                    
                        echo '</tr>';
                $conta++;
                }?>
                
              
            </tbody> 
        </table> 
    </section> 
  
</div>
  </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder">
            <p><small>Bolão da Copa Online<br>
                &copy; 2018</small> </p>
        </div>
    </footer>
    <!-- / footer -->
    <script src="js/app.v2.js"></script>
    <!-- Bootstrap -->
    <!-- App -->
</body>
</html>