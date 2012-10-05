<?php echo $header; ?>
<div id="content">
                <?php echo $column_left; ?>
                <?php echo $column_right; ?>
                <div id="content">
                    <?php echo $content_top; ?>
                <h1 style="display: none;">
                    <?php echo $heading_title; ?>
                </h1>
                <?php echo $content_bottom; ?>
                </div>
                <!-- 
                Links to required files.
                                  
                     avgrund.css contains styles for the dialog, style.css contains some basic styles for the page, and of course the jquery.avgrund.js contains the javascript code.
                     There have been some slight modifications made to the code in the plugin to ensure that the dialog cannot be closed. 
                     Line 57 in the js file has been commented to ensure that the dialog will not close on keypress.
               
                 -->
                <link rel="stylesheet" href="catalog/view/javascript/jquery/avgrund/style/avgrund.css"> 
                <link rel="stylesheet" href="catalog/view/javascript/jquery/avgrund/style/style.css">
                <script type="text/javascript" src="catalog/view/javascript/jquery/avgrund/js/jquery.avgrund.js"></script>
                <script>
              $(document).ready(function() {
                     $('body').avgrund({            // link to the body tag
			            height: <?php echo $maintenance_dialog_height;?>,                // height of the dialog
                        width:<?php echo $maintenance_dialog_width;?>,                  // width of the dialog
			            holderClass: 'custom',      // Custom styles for popin & close button, defined in style.css
			            showClose: false,           // whether to show a close button.
	                    showCloseText: '',          // the text of the close button
	                    closeByEscape: false,       // do we allow the dialog to be closed by pressing the ESC key. Note this has been removed from the code. See comment above
	                    closeByDocument: false,     // do we allow a click on the document to close this dialog
			            enableStackAnimation: true, // do we allow a stack animation to play
			            template: '<?php echo str_replace("\r","\n",$maintenance_message); ?>' // the HTML that will be shown as the dialog content

		                });
                     $('body').click();             // mimic a click on the body, so the dialog will show.
                    });
                </script>
                </div>
<?php echo $footer; ?>