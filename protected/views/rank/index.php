<?php
/* @var $this RankController */
/* @var $dataProvider CActiveDataProvider */


?>


 <section class="vbox">
                        <header class="header bg-white b-b b-light">
                            <p>Extrato de Pontos <small>(de jogos realizados)</small></p>
                        </header>
                        <section class="scrollable wrapper">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <section class="panel panel-default">
                                                <header class="panel-heading bg-danger lt no-border">
                                                    <div class="clearfix"><a href="#" class="pull-left thumb avatar b-3x m-r">
                                                        <img src='images/<?php  $id_user = Yii::app()->user->getId();
                                    $model2 = User::model()->findByPk($id_user);
                                    echo $model2->username?>.jpg' class="img-circle">
                                                    </a>
                                                        <div class="clear">
                                                            <div class="h3 m-t-xs m-b-xs text-white"><?php
                                    $id_user = Yii::app()->user->getId();
                                    $model2 = User::model()->findByPk($id_user);
                                    echo strtoupper($model2->username)?><span> <i class="fa fa-user text-white pull-right text-xs m-t-sm"></i></span></div>
                                                            <small class="text-muted"><?php echo RankController::actionGetPosicao(Yii::app()->user->getId())?>º Colocado </small> </div>
                                                    </div>
                                                </header>
                                              <div class="list-group no-radius alt">
                                                  <table class="table ">
                                                      <thead>
                                                          <tr>
                                                                                                                            <th>Resultado</th>
                                                                 <th>Aposta</th>
<th>Pontos</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	 'enablePagination'=>false,
        )); ?>
                                                          <tr>
                                                              <td colspan="2">
                                                                  <i class="fa fa-tachometer"></i> Total</td>
                                                              <td><a class="" href="#">
                                <span class="badge bg-success"><?php echo RankController::actionGetTotal($id_user); ?></span></td>
                                                          </tr></tbody> </table></div>
                       
                                            </section>
                                         
                                        </div>
                                        <div class="col-sm-6">
                                            <section class="panel panel-default">
                                                <div class="text-center wrapper bg-light lt">
                                                    <div class="sparkline inline" data-type="pie" data-height="165" data-slice-colors="['#77c587','#41586e','#f2f2f2']"><?php echo RankController::GetAcertos($id_user) ?>,<?php echo RankController::GetResultados($id_user) ?>,<?php echo RankController::GetErros($id_user) ?></div>
                                                </div>
                                                <ul class="list-group no-radius">
                                                    <li class="list-group-item"><span class="pull-right"><?php echo RankController::GetAcertos($id_user) ?></span> <span class="label bg-primary">1</span>Placar Exatos</li>
                                                    <li class="list-group-item"><span class="pull-right"><?php echo RankController::GetResultados($id_user) ?></span> <span class="label bg-dark">2</span> Acerto de Resultado </li>
                                                    <li class="list-group-item"><span class="pull-right"><?php echo RankController::GetErros($id_user) ?></span> <span class="label bg-light">3</span> Não Pontuadas </li>
                                                </ul>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <section class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="clearfix text-center m-t">
                                                <div class="inline">
                                                    <div class="easypiechart" data-percent="75" data-line-width="5" data-bar-color="#4cc0c1" data-track-color="#f5f5f5" data-scale-color="false" data-size="130" data-line-cap='butt' data-animate="1000">
                                                        <div class="thumb-lg">
                                                            <img src="images/<?php $id_user = Yii::app()->user->getId();
                                    $model2 = User::model()->findByPk($id_user);
                                    echo $model2->username?>.jpg" class="img-circle">
                                                        </div>
                                                    </div>
                                                    <div class="h4 m-t m-b-xs"><?php echo strtoupper($model2->username)?></div>
                                                    <small class="text-muted m-b">Art director</small> </div>
                                            </div>
                                        </div>
                                        <footer class="panel-footer bg-info text-center">
                                            <div class="row pull-out">
                                                <div class="col-xs-4">
                                                    <div class="padder-v"><span class="m-b-xs h3 block text-white">245</span> <small class="text-muted">Followers</small> </div>
                                                </div>
                                                <div class="col-xs-4 dk">
                                                    <div class="padder-v"><span class="m-b-xs h3 block text-white">55</span> <small class="text-muted">Following</small> </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class="padder-v"><span class="m-b-xs h3 block text-white">2,035</span> <small class="text-muted">Tweets</small> </div>
                                                </div>
                                            </div>
                                        </footer>
                                    </section>
                                </div>
                            </div>
                           
                        </section>
                    </section>
<script>
jQuery(function (){
    jQuery('.summary').hide();
})</script>