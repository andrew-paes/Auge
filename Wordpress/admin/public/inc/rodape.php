</div>
		</section>

		<!-- JS -->                
                <script src="<?php echo URLADMIN; ?>public/js/jquery.js"></script>		
                <script src="<?php echo URLADMIN; ?>public/js/jquery.browser.mobile.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/jquery.cookie.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap/js/bootstrap.js"></script>			
                <script src="<?php echo URLADMIN; ?>public/js/nanoscroller.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>	
                
                <!--
                <script src="<?php echo URLADMIN; ?>public/js/style.switcher.js"></script>			
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		
                <script src="<?php echo URLADMIN; ?>public/js/magnific-popup/magnific-popup.js"></script>		
                <script src="<?php echo URLADMIN; ?>public/js/jquery.placeholder.js"></script>
		
                <script src="<?php echo URLADMIN; ?>public/js/select2/select2.js"></script>		
                <script src="<?php echo URLADMIN; ?>public/js/jquery-datatables/media/js/jquery.dataTables.js"></script>		
                <script src="<?php echo URLADMIN; ?>public/js/jquery-datatables-bs3/assets/js/datatables.js"></script>
                	
                <script src="<?php echo URLADMIN; ?>public/js/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-multiselect/bootstrap-multiselect.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/jquery.maskedinput.js"></script>		
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/dropzone/dropzone.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-markdown/js/markdown.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-markdown/js/to-markdown.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-markdown/js/bootstrap-markdown.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/jquery-validation/jquery.validate.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/pnotify/pnotify.custom.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/funcoes.js"></script>
                
                
                <script src="<?php echo URLADMIN; ?>public/js/summernote/summernote.js"></script>		
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-maxlength/bootstrap-maxlength.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/ios7-switch.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/validation.js"></script>		
                
		<script src="<?php echo URLADMIN; ?>public/js/theme_1.init.js"></script>
		<script src="<?php echo URLADMIN; ?>public/js/modals.js"></script>
		<script src="<?php echo URLADMIN; ?>public/js/theme_1.js"></script>
                -->
                
                <?php if($popup == true){ ?>
                <script src="<?php echo URLADMIN; ?>public/js/magnific-popup/magnific-popup.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/popup.js"></script>		                
                <?php } ?>
                
                <?php if($pnotify == true){ ?>
                <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/js/pnotify/pnotify.custom.css" />
                <script src="<?php echo URLADMIN; ?>public/js/pnotify/pnotify.custom.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/pnotify.js"></script>
                <?php } ?> 
                
                <?php if($data = true){ ?>
                <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/js/bootstrap-datepicker/css/datepicker3.css" />
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/datepicker.js"></script>
                <?php } ?>
                
                <?php if($validacao == true){ ?>
                <script src="<?php echo URLADMIN; ?>public/js/jquery-validation/jquery.validate.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/validacao.js"></script>
                <?php } ?>
                
                <?php if($ativo == true){ ?>
                <script src="<?php echo URLADMIN; ?>public/js/style.switcher.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/ios7-switch.js"></script>	   
                <script src="<?php echo URLADMIN; ?>public/js/ativo.js"></script>	              
                <?php } ?>
                
                <?php if($lightBox == true){ ?>
		<script src="<?php echo URLADMIN; ?>public/js/lightbox.js"></script>	                
                <?php } ?>                
                
                <?php if($uploadImagem == true){ ?>	
                <script src="<?php echo URLADMIN; ?>public/js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
                <link rel="stylesheet" href="<?php echo URLADMIN; ?>public/js/bootstrap-fileupload/bootstrap-fileupload.min.css" />
                <?php } ?>  
                
                <?php if($masked == true){ ?>
                <script src="<?php echo URLADMIN; ?>public/js/jquery.maskedinput.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/jquery.masked.js"></script>		                
                <?php } ?>
                                
                <script src="<?php echo URLADMIN; ?>public/js/theme.init.js"></script>
		<script src="<?php echo URLADMIN; ?>public/js/modals.js"></script>
                
                <?php if($galeria == true){ ?>
                <!-- Galeria -->
                <script src="<?php echo URLADMIN; ?>public/js/mediagallery.js"></script>	
                <script src="<?php echo URLADMIN; ?>public/js/gallery/jquery-1.4.3.min.js"></script>
                <script src="<?php echo URLADMIN; ?>public/js/gallery/jquery-ui-1.8.6.custom.min.js"></script>   
                <script src="<?php echo URLADMIN; ?>public/js/gallery/jquery.scrollto.js"></script>                
                <script src="<?php echo URLADMIN; ?>public/js/gallery/gallery.js"></script>                
                <script src="<?php echo URLADMIN; ?>public/js/gallery/jquery.uploadifive.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                    <?php $timestamp = time();?>
                    $(function() {
                        $('#file_upload').uploadifive({
                            'auto'             : false,
                            'checkScript'      : 'check-exists.php',
                            'buttonText'       : 'Selecionar Imagem',
                            'formData'         : {
                                                    'timestamp' : '<?php echo $timestamp;?>',
                                                    'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                                                 },
                            'queueID'          : 'queue',
                            'uploadScript'     : '<?php echo URLADMIN; ?>public/uploadify.php?id=<?php echo $idP; ?>&nomeClasse=<?php echo $nomeClasse; ?>&destino=<?php echo $destino; ?>&idSalva=<?php echo $idSalva; ?>',
                            'onQueueComplete': function() {
                                window.location = '<?php echo $paginaRetorno; ?>';
                            }
                            /*
                            'onUploadComplete' : function(file, data) { console.log(data); }                
                           */
                        });
                    });
                </script>
                <?php } ?>
	</body>

</html>