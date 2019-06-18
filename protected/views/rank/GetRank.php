
<div class = "col-sm-6">
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
				$posicaoNoArray = 1;
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
						$proximo = $posicaoNoArray;
						$anterior = $posicaoNoArray-2;
						if($posicaoNoArray < 8){
						if($conta != 1){
				if($item["pontos"] != $dataProvider[$proximo]["pontos"] ){
                $conta++;
				}
						}else
						{
							 $conta++;
						}
						$posicaoNoArray++;
						}
                }
				
				?>
                
              
            </tbody> 
        </table> 
    </section> 
  
</div>