<?php
/* @var $this ConfrontoController */
/* @var $dataProvider CActiveDataProvider */




?> <section class="vbox">
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
										 <li class="active"><a href="index.php?r=confronto/index&id=11"> - 4ª</a></li>
										  <li class="active"><a href="index.php?r=confronto/index&id=12"> - Semi</a></li>
										  <li class="active"><a href="index.php?r=confronto/index&id=13"> - 3º Lugar</a></li>
										  <li class="active"><a href="index.php?r=confronto/index&id=9"> - Final</a></li>
                            </ul>
<div class="m-b-md"> <h3 class="m-b-none">Confrontos</h3> </div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    
)); ?>
                            </section>
</section>
    <script>
        jQuery(function (){
             $(".summary").hide();
              $(".verApostaDiv").hide();
             PreencheApostas();
            
        
        });
      function PreencheApostas(){
              $.ajax({
            type: "get",
            url: "index.php?r=aposta/GetApostas/",
            data:"id=<?php echo Yii::app()->user->getId();?>",
            dataType: "json",
            success: function(response, status) {
                debugger;
               

                for (var i = 0; response.length > i; i++) {
                    
                  jQuery('#'+response[i][1]).find('input[id=placar_casa]').val(response[i][4]);
                    jQuery('#'+response[i][1]).find('input[id=placar_visitante]').val(response[i][5]);
                   
                }
            
            },
            error: function(response, status) {

            },
        });
        }
         function AtualizeApostas(){
              $.ajax({
            type: "get",
            url: "index.php?r=aposta/GetApostas/",
           data: "id=0",
            dataType: "json",
            success: function(response, status) {
                debugger;
              
                for (var i = 0; response.length > i; i++) {
                     debugger;
                     var divAposta = jQuery('.divApostas_'+response[i][0]);
                     if(divAposta.length > 0){
                    jQuery('.divApostas_'+response[i][0]).find('input[id=placar_casa]').val(response[i][4]);
                    jQuery('.divApostas_'+response[i][0]).find('input[id=placar_visitante]').val(response[i][5]);
                }else
              {
                  jQuery('#verApostaDiv-'+response[i][1]).find('div[class=items]').append('<div class="divApostas_'+response[i][0]+'" style="padding: 0 0px 0px 2.5%;margin: -30px 0 12px  0; text-align: right;width: 162px;">'
                                       + '<div class="" style="width: 30%;display: initial;">'
                                           +' <label>'+response[i][6]+'</label>'
                                       +' </div> <div class="form-group" style="width: 26px; display: inline-block;">'
                                           
                                            +'<input class="c26" type="text" data-notblank="true" data-maxlength="2" id="placar_casa" name="placar_casa" style="width: 100%;text-align: center; border: none" value="'+response[i][4]+'" readonly="readonly">'
                                      +  '</div> x'
                                       + '<div class="form-group" style="width: 26px; display: inline-block;">'
                                           
                                           + '<input class="v26" type="text" data-notblank="true" data-maxlength="2" id="placar_visitante" name="placar_visitante" style="width: 100%;text-align: center; border: none " value="'+response[i][5]+'" readonly="readonly">'
                                        
                                       +' </div> <div class="" style="width: 30%;display: initial;">'
                                           + '<label>'
                                              
                                       +' </label></div>'
 +'</div>');
                 
              }
                }
             
            },
            error: function(response, status) {

            },
        });
        }
         jQuery('.verAposta').click(function (){
             debugger;AtualizeApostas();
             var id =  jQuery(this).attr('data-id');
             var teste= jQuery('#verApostaDiv-'+id).attr('style');
             if(jQuery('#verApostaDiv-'+id).attr('style') == 'display: block;'){
             jQuery('#verApostaDiv-'+id).slideUp();
             }else
             {
                 jQuery('#verApostaDiv-'+id).slideDown();
             }
             
         });
        jQuery('.btn-success').click(function (){
            
            debugger;
            var id = jQuery(this).attr('data-idConfronto');
            var id_confronto = jQuery('#'+id).find('input[id=id_confronto]').val();
            var placar_casa =jQuery('#'+id).find('input[id=placar_casa]').val();
            var placar_visitante =jQuery('#'+id).find('input[id=placar_visitante]').val();
            var id_user = jQuery('#'+id).find('input[id=id_user]').val();
            var data = jQuery('#'+id).find('input[id=data]').val();
            if(jQuery('.c'+id).val() !== '' && jQuery('.v'+id).val() !=='' && checkNumber(jQuery('.v'+id).val()) && checkNumber(jQuery('.c'+id).val())){
             <?php
                echo Chtml::ajax(array(
                        'url'=>array('aposta/createajax'),
                        'type'=>'post',
                        'data'=>'js:{id_confronto:id_confronto,placar_casa:placar_casa,placar_visitante:placar_visitante,id_user:id_user,data:data}',
                        'success'=>"function(string){
                            debugger;
                            jQuery('#btn-'+id).html('ok');
                            AtualizeApostas();
                            }"
                ));
            ?>
        }else       
        {
        alert('dados Invalidos');
         jQuery('#btn-'+id_confronto).html('Apostar');
          jQuery('#btn-'+id_confronto).removeAttr('disabled');
        }
           
        });
   function checkNumber(valor) {
  var regra = /^[0-9]+$/;
  if (valor.match(regra)) {
   return true;
  }else{
     return false;
  }
}; 
        </script>