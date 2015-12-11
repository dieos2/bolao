<?php
$id_user = Yii::app()->user->getId();
$user = User::model()->find($condition = "id=$id_user");
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'senha-form',
    'action' => Yii::app()->createUrl('/perfil/senha'),
    'enableAjaxValidation' => false, 'htmlOptions'=>array(
        'class'=>'panel-body wrapper-lg',
    ),
        ));
?>
<div class="form-group">
    <label class="control-label"></label>
    <input id='senhaatual' class='form-control input-lg' placeholder='Senha Atual:' type="password" name='senhaatual'/>
    <span class="bottom">Senha atual não confere</span></div>

<div class="form-group">
    <label class="control-label"></label>
   <input class='form-control input-lg' placeholder='Nova Senha:' type="password" name='passwordNova' id='passwordNova'/>
        <span class="bottom">Repita a mesma senha</span></div>

    <div class="form-group">
        <label class="control-label"></label>
        <input class='form-control input-lg' placeholder='Repita:' type="password" name='repeti' id='repeti' />
        <span class="bottom">Repita a mesma senha</span></div>


    <div class="row-form">

        <button id='salvasenha' type='button' class='btn'>Salvar</button>
    </div> 
    <input id='id' name='id' value='<?php echo $user->id ?>' class ='hidden' />


    <?php $this->endWidget(); ?>
    <script type='text/javascript' src='js/validationSenha.js'></script>
    <script>

        $(function() {
            $(".bottom").hide();
            $("#salvasenha").click(function() {
                debugger;
                var validation = Conferesenha('<?php echo $user->password ?>');
                validation = Conferenovasenha();
                if (validation)
                {
                    $("#senha-form").submit();
                }

            });


        });

    </script>