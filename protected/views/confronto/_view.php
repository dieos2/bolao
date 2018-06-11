<?php
/* @var $this ConfrontoController */
/* @var $data Confronto */
date_default_timezone_set('America/Belem');
$date = date_create($data->data);
?>
<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=120052838155369&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->
<style>
    .progress {
    height: 50px !important;
    margin-bottom: 0px !important;
        height: 20px;
    margin-bottom: 20px;
    overflow: hidden;
    background-color: #f5f5f5;
    border-radius: 0px !important;
    -webkit-box-shadow: none !important;
     box-shadow: none !important;
     
    }
    .progress-bar{
     
    }
	.label {
    
    font-size: 100% !important;
	}
    
</style>
<section class="panel panel-default">

    <header class="panel-heading font-bold" style="text-align: center"><?php echo date_format($date, 'd-m-Y H:i');  $id_user = Yii::app()->user->getId();
                                    $model2 = User::model()->findByPk($id_user);
                                    $model2->username;
                                       if($model2->username == 'diego'){
                                           echo ' - <a href="index.php?r=confronto/update&id='.$data->id.'" class="btn btn-success" >Editar</a>';
                                       }?>  </header>
                                <div class="panel-body" style="text-align:center;">
                                    <form id="<?php echo CHtml::encode($data->id) ?>" class="form-inline" role="form" data-validate="parsley">
                                        <div class="" style="width: 30%;display: initial;">
                                            <label>
                                                <?php if($data->placar_casa != null){
                                                echo '<span class="label bg-dark">'. CHtml::encode($data->placar_casa).'</span>'; } ?>
                                                <img src="images/<?php echo CHtml::encode($data->idTimeCasa->escudo)?>" /> <?php echo CHtml::encode($data->idTimeCasa->nome); ?></label>
                                        </div> 
                                        <div class="form-group" style="width: 26px; display: inline-block;">
                                           
                                            <input class="c<?php echo CHtml::encode($data->id) ?>" type="text" data-notblank="true" data-maxlength="2" id="placar_casa" name="placar_casa" style="width: 100%;text-align: center;">
                                        </div> x
                                        <div class="form-group" style="width: 26px; display: inline-block;">
                                           
                                            <input  class="v<?php echo CHtml::encode($data->id) ?>" type="text" data-notblank="true" data-maxlength="2" id="placar_visitante" name="placar_visitante" style="width: 100%;text-align: center;" >
                                        
                                        </div>
                                        <div class="" style="width: 30%;display: initial;">
                                            <label>
                                               <?php echo CHtml::encode($data->idTimeVisitante->nome); ?> <img src="images/<?php echo CHtml::encode($data->idTimeVisitante->escudo)?>" /> <?php if($data->placar_casa != null){
                                                echo '<span class="label bg-dark">'. CHtml::encode($data->placar_visitante).'</span>'; } ?></label>
                                        </div>
                                        <div class="col-md-12">  <?php 
                                     $data1 = date("Y-m-d H:i:s");
$data2 = date_format($date,'Y-m-d H:i:s ');
// converte as datas para o formato timestamp
$d1 = strtotime($data1); 
$d2 = strtotime($data2);
// verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
$dataFinal = ($d2 - $d1 ) / 60;
// caso a data 2 seja menor que a data 1

                                       if($dataFinal < 60 ){
                                           echo '<a class="btn btn-default" disabled="disabled" ><i class="fa fa-check-circle" aria-hidden="true"></i> Apostar</a>';   
                                       }else{
                                          echo '<a  id="btn-'.$data->id.'" data-idConfronto="'.$data->id.'" data-idGrupo="'.$data->id_grupo.'" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Apostar</a>';
                                       } 
                                       
                                   ?> 
								     <?php
               $model = new CActiveDataProvider('Aposta', array(
                'criteria' => array(
                    'condition' => "id_confronto = $data->id",
                    'order' => 'data',
            )));
               
				$CriteriaApostas = new CDbCriteria();
			    $CriteriaApostas->condition = "id_confronto = $data->id";
				$apostaTotais = Aposta::model()->findAll($CriteriaApostas);
                ?>
                                       <a id="verAposta-<?php echo $data->id ?>" data-id="<?php echo $data->id ?>" class="btn verAposta btn-info"><i class="fa fa-binoculars" aria-hidden="true"></i> Ver Apostas <strong>(<?php echo count ($apostaTotais); ?>)</strong></a> 
                                       <input type="hidden" id="id_confronto" name="id_confronto" value="<?php echo $data->id ?>" />
                                       <input type="hidden" id="id_user" name="id_user" value="<?php echo Yii::app()->user->getId(); ?>" />
                                       <input type="hidden" id="data" name="data" value="<?php echo date("Y-m-d H:i:s") ?>" />
                                      </div>
                                    </form>
<!--                                    <div class="fb-share-button" data-href="http://www.casadogui.com.br/index.php?r=confronto/curtir&id=<?php echo $data->id ?>" data-type="button"></div>-->
                                </div> 
        <div id="verApostaDiv-<?php echo $data->id ?>" class="panel-body verApostaDiv">
             <table class="table table-striped">
								   <tbody>
              
				
                <?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model,
	
	'itemView'=>'_viewAposta',
                     'enablePagination'=>false,
					
					 
)); ?></tbody>
				</table>
         </div> 
       <div class="progress">
            <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="<?php echo ConfrontoController::GetNumeroApostaCasa($data->id) ?>" style="width: <?php echo ConfrontoController::GetPorcentagemApostaCasa($data->id) ?>%">
                <img src="images/barratorcida.png" style="height: 100%; width: 101%"/>
            </div>
            <div class="progress-bar progress-bar-primary" data-toggle="tooltip" data-original-title="<?php echo ConfrontoController::GetNumeroApostaVisitante($data->id) ?>" style="width: <?php echo ConfrontoController::GetPorcentagemApostaVisitante($data->id) ?>%">
             <img src="images/barratorcida.png" style="height: 100%; width: 101%"/>
            </div> 
       </di> 
                            </section>
	
	
	

