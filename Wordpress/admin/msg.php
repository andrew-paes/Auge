<?php 
if(isPost($msg)){
if(isPost($msg_erro) and $msg != $msg_ok){ ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Erro!</strong> <?php echo $msg_erro; ?>
</div>
<?php }elseif(isPost($msg) and !isPost($msgInfo)){ ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Sucesso!</strong> <?php echo $msg_ok; ?>
</div>
<?php }elseif(isPost($msgInfo)) { ?>
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Atenção!</strong> <?php echo $msgInfo; ?>
</div>
<?php }} ?>