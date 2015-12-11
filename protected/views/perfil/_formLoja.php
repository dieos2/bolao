<?php
$id_user = Yii::app()->user->getId();
 $user = User::model()->find($condition="id=$id_user");
?>
 <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'perfil-form',
        'action' => Yii::app()->createUrl('/perfil/updateLoja'),
        'enableAjaxValidation' => false,
    ));
    ?>
<div class="block">
                            <div class="head">                                
                                <h2>Editar Dados</h2>
                                                            
                            </div>                                        
                            <div class="data-fluid">
                                
                                <div class="row-form">
                                    <div class="span3">Username:</div>
                                    <div class="span9"> <?php echo $form->textField($user, 'username', array('maxlength' => 100)); ?></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">Nome:</div>
                                    <div class="span9"><?php echo $form->textField($model, 'nome', array('maxlength' => 100)); ?></div>
                                </div>
                                <div class="row-form">
                                    <div class="span3">E-mail:</div>
                                    <div class="span9"><?php echo $form->textField($model, 'email', array('maxlength' => 100)); ?></div>
                                </div>
                                  <div class="row-form">
       <?php echo CHtml::submitButton($model->isNewRecord ? 'Update' : 'Save', array('class'=>'btn')); ?>
                    </div> 
                               <input id='idLoja' name='idloja' value='<?php echo $model->id ?>' class ='hidden' />
                                
                            </div>
    
                        </div>   
                   
<?php $this->endWidget(); ?>

<script>
    $(function(){
       
        var form = $("#perfil-form");
        $("").click(function(){
             debugger;
             
         $.ajax({
            type: "POST",
            url: "index.php?r=perfil/update/",
            dataType: "json",
            data: form.serialize(),
            success: function(response, status) {
                alert(response);
            },
            error: function(response, status) {
                alert("Fucking Bull Shit!");
            },
        }); 
        });
        
    });
    </script>