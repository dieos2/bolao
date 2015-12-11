<?php
$id = Yii::app()->request->getParam('id');
?>

   
      
 
<div class = "col-sm-6">
    <section class = "panel panel-default">
        <header class = "panel-heading">GRUPO <?php echo strtoupper(Grupo::Model()->findByPk($id)->nome)?></header>
        <table class = "table table-striped m-b-none text-sm">
            <thead>
                <tr>
                    <th colspan="2">Classificação</th>
                    <th>PG</th>
                    <th>V</th>
                    <th>E</th>
                    <th>D</th>
                </tr> </thead>
            <tbody>
                <?php 
                
                $conta = 1;
                foreach ($dataProvider as $item) {
                    echo '<tr>';
                    if($conta == 1 || $conta == 2){
                      echo '<td style="color: #468847;background-color: #dff0d8;border-color: #d6e9c6;">'.$conta.'º</td>';
                    }  else {
                          echo '<td>'.$conta.'º</td>';
                    }
                     echo '<td><img src="images/'.$item["escudo"].'" /> '. $item["id_time"].'</td>';
                 
                   echo '<td>'.$item["pontos"].'</td>';
                   echo '<td class = "text-success">';
                    echo   $item["vitoria"].'</td>';
                     echo '<td class = "text-warning">';
                    echo   $item["empate"].'</td>';
                     echo '<td class = "text-danger">';
                    echo   $item["derrota"].'</td>';
                        echo '</tr>';
                $conta++;
                    }?>
                
              
            </tbody> 
        </table> 
    </section> 
</div>  