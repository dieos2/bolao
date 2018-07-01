<?php
/* @var $this ConfrontoController */
/* @var $dataProvider CActiveDataProvider */




?><style>
.contdown{
font-size: 150%;
}
.red{
color: red;}</style> <section class="vbox">
                            <section class="scrollable">
                                
 
 
                               
                                      
                                       
                          
<div class="btn btn-dark" style="width: 100%"> <h3 class="">Confrontos</h3> </div>
<select id="selecionarGrupo" class="form-control m-b">
             <option value="0">Todos</option>
             <option value="1">A</option>
             <option value="2">B</option>
             <option value="3">C</option>
             <option value="4">D</option>
             <option value="5">E</option>
             <option value="6">F</option>
             <option value="7">G</option>
             <option value="8">H</option>
             <option value="10">8ª</option>
             <option value="14">4ª</option>
             <option value="12">Semi Final</option>
             <option value="13">3º Lugar</option>
             <option value="9">Final</option>
         </select>
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
             $("#selecionarGrupo").change(function(){
                var grupo = $(this).val();
                window.location.href= "index.php?r=confronto/index&id="+grupo;
            });
            $(".contdown").each(function(){
               
               MontaContDown($(this).attr("data-data"), $(this).attr("data-id")); 
            });
       $("#selecionarGrupo").val(<?php echo $idGrupo?>);
        });
      function PreencheApostas(){
              $.ajax({
            type: "get",
            url: "index.php?r=aposta/GetApostas/",
            data:"id=<?php echo Yii::app()->user->getId();?>",
            dataType: "json",
            success: function(response, status) {
               
               

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
              
              
                for (var i = 0; response.length > i; i++) {
                    
                     var divAposta = jQuery('.divApostas_'+response[i][0]);
                     if(divAposta.length > 0){
                    jQuery('.divApostas_'+response[i][0]).find('input[id=placar_casa]').val(response[i][4]);
                    jQuery('.divApostas_'+response[i][0]).find('input[id=placar_visitante]').val(response[i][5]);
                }else
              {
                  
                 
              }
                }
             
            },
            error: function(response, status) {

            },
        });
        }
         jQuery('.verAposta').click(function (){
            AtualizeApostas();
             var id =  jQuery(this).attr('data-id');
             var teste= jQuery('#verApostaDiv-'+id).attr('style');
             if(jQuery('#verApostaDiv-'+id).attr('style') == 'display: block;'){
             jQuery('#verApostaDiv-'+id).slideUp();
             }else
             {
                 jQuery('#verApostaDiv-'+id).slideDown();
             }
             
         });
         function MontaContDown(data, id){
   
var countDownDate = new Date(data).getTime() - (1*60*60*1000);

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = (countDownDate - now);

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor(((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo_"+id).innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
if(days == 0 && hours < 2){
	 document.getElementById("demo_"+id).classList.add('red');
}

  // If the count down is finished, write some text 
  if (distance <= 0) {
    clearInterval(x);
    document.getElementById("demo_"+id).innerHTML = "FECHADO";
	 document.getElementById("demo_"+id).classList.add('red');
  }
}, 1000);
}
        jQuery('.btn-success').click(function (){
            
           
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