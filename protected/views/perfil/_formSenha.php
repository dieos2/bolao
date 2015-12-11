<?php
$id_user = Yii::app()->user->getId();
 $user = User::model()->find($condition="id=$id_user");
?>
 <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'senha-form',
        'action' => Yii::app()->createUrl('/perfil/senha'),
        'enableAjaxValidation' => false,
    ));
    ?>
<div class="block">
                            <div class="head">                                
                                <h2>Alterar Senha</h2>
                                                            
                            </div>                                        
                            <div class="data-fluid">
                                
                                <div class="row-form">
                                    <div class="span3">Senha Anterior:</div>
                                    <div class="span9"><input id='senhaatual' type="password" name='senhaatual'/>
                                    <span class="bottom">Senha atual não confere</span></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Nova Senha:</div>
                                    <div class="span9"><input type="password" name='passwordNova' id='passwordNova'/>
                                     <span class="bottom">Repita a mesma senha</span></div>
                                    </div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Repita:</div>
                                    <div class="span9"><input type="password" name='repeti' id='repeti' />
                                     <span class="bottom">Repita a mesma senha</span></div>
                                    </div>
                                </div>
                                  <div class="row-form">
                                      
                       <button id='salvasenha' type='button' class='btn'>Salvar</button>
                    </div> 
                               <input id='id' name='id' value='<?php echo $user->id ?>' class ='hidden' />
                       
                   
<?php $this->endWidget(); ?>
 <script type='text/javascript' src='js/validationSenha.js'></script>
<script>
   
    $(function(){
        $(".bottom").hide();
       $("#salvasenha").click(function(){
           debugger;
           var validation = Conferesenha('<?php echo $user->password ?>');
               validation = Conferenovasenha();       
    if(validation)
               {
                   $("#senha-form").submit();
               }
       
       });
      
        
    });
 
    </script>