<section class="vbox">
                            <section class="scrollable padder">
 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                                <li><a href="index.php?r=confronto/index&id=0">Todos</a></li>
                                <li><a href="index.php?r=confronto/index&id=1">A</a></li>
                                <li class="active"><a href="index.php?r=confronto/index&id=2">B</a></li>
                                 <li class="active"><a href="index.php?r=confronto/index&id=3">C</a></li>
                                  <li class="active"><a href="index.php?r=confronto/index&id=4">D</a></li>
                                   <li class="active"><a href="index.php?r=confronto/index&id=5">E</a></li>
                                    <li class="active"><a href="index.php?r=confronto/index&id=6">F</a></li>
                                     <li class="active"><a href="index.php?r=confronto/index&id=7">G</a></li>
                                      <li class="active"><a href="index.php?r=confronto/index&id=8">H</a></li>
                                      
                                        <li class="active"><a href="index.php?r=confronto/index&id=10"> - 8ª</a></li>
                            </ul>
<div class="m-b-md"> <h3 class="m-b-none">Confrontos</h3> </div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>   </section>
</section>
<script>                            
jQuery(function (){
    jQuery('.summary').hide();
     jQuery('.peguei').click(function(){
         
     debugger;
            var id = jQuery(this).attr('data-id');
           
            var pego = jQuery(this).attr('data-pego');
           
             <?php
                echo Chtml::ajax(array(
                        'url'=>array('poke/createajax'),
                        'type'=>'post',
                        'data'=>'js:{id:id,pego:pego}',
                        'success'=>"function(string){
                            debugger;
                           location.reload();
                           
                            }"
                ));
            ?>
       
    });
});</script>