<div class="divApostas_<?php echo CHtml::encode($data->id) ?>" style="padding: 0 0px 0px 2.5%;;
margin: -30px 0 12px  0; text-align: right;width: 162px;">
                                   
                                        <div class="" style="width: 30%;display: initial;">
                                            <label>
                                                <?php echo ucfirst(CHtml::encode($data->idUser->username)); ?></label>
                                        </div> <div class="form-group" style="width: 26px; display: inline-block;">
                                           
                                            <input class="c<?php echo CHtml::encode($data->id) ?>" type="text" data-notblank="true" data-maxlength="2" id="placar_casa" name="placar_casa" style="width: 100%;text-align: center; border: none" value="<?php echo $data->placar_casa ?>" readonly="readonly">
                                        </div> x
                                        <div class="form-group" style="width: 26px; display: inline-block;">
                                           
                                            <input  class="v<?php echo CHtml::encode($data->id) ?>" type="text" data-notblank="true" data-maxlength="2" id="placar_visitante" name="placar_visitante" style="width: 100%;text-align: center; border: none " value="<?php echo $data->placar_visitante ?>" readonly="readonly">
                                        
                                        </div> <div class="" style="width: 30%;display: initial;">
                                            <label>
                                              
                                        </div>
 </div>
