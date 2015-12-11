<?php
/* @var $this ConfrontoController */
/* @var $dataProvider CActiveDataProvider */




?> <section class="vbox">
                            <section class="scrollable padder">
 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                              
                            </ul>
<div class="m-b-md"> <h3 class="m-b-none">Simulação de Oitavas De Final</h3> </div>
 <?php foreach ($dataProvider as $data) { ?>
<section class="panel panel-default">
    <header class="panel-heading font-bold"> </header>
                                <div class="panel-body">
                                    <form id="" class="form-inline" role="form" data-validate="parsley">
                                        <div class="" style="width: 30%;display: initial;">
                                            <label>
                                              <img src="images/<?php echo CHtml::encode($data["escudo1"])?>" /> <?php echo CHtml::encode($data["nome1"]); ?></label>
                                        </div> <div class="form-group" style="width: 26px; display: inline-block;">
                                       
                                        </div> x
                                        <div class="form-group" style="width: 26px; display: inline-block;">
                                          
                                        </div> <div class="" style="width: 30%;display: initial;">
                                            <label>
                                               <?php echo CHtml::encode($data["nome2"]); ?><img src="images/<?php echo CHtml::encode($data["escudo2"])?>" /> </label>
                                        </div>
                                      
                                     
                                      
                          
                                    
                                </div> 
    
       
       </di> 
                            </section>
<?php } ?>
                            </section>
</section>
   