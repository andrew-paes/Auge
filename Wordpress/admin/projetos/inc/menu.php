<?php
$pg_imagem = URLADMIN."projetos/galeria.php?id=".$idP;
$pg_servico = URLADMIN."projetos/servicos.php?id=".$idP;
?>
<div class="row">
    <div class="col-sm-12 text-right">
        <a href="<?php echo $pg_servico; ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-wrench"></i> Serviços Relacionados</a>
        <a href="<?php echo $pg_imagem; ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-image"></i> Galeria Imagem</a>
        <a href="<?php echo $pg_voltar; ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
    </div>
</div>