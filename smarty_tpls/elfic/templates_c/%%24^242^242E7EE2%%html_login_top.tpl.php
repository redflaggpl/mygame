<?php /* Smarty version 2.6.26, created on 2012-07-03 10:16:53
         compiled from html_login_top.tpl */ ?>
<html>
<head>
  <title><?php echo $this->_tpl_vars['title']; ?>
</title>
  <link href="css/front.css" media="screen, projection" rel="stylesheet" type="text/css">
   
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  
	<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="js/fancybox/source/jquery.fancybox.css" media="screen" />
	  <?php echo '
  <script language="javascript" type="text/javascript">
  function setFocus() {
      document.loginForm.handle.select();
      document.loginForm.handle.focus();
  }

  function submitbutton(pressbutton) {
      var form = document.loginForm;

      // do field validation
      if (form.handle.value == "") {
          alert( "Debe ingresar el Nombre de Usuario" );
      } else if (form.passwd.value == "") {
          alert( "Debe ingresar el Password" );
      } else {
          submitform( pressbutton );
      }
  }
  </script>
  <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$(\'.fancybox\').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay opening speed and opacity
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : \'outside\'
					},
					overlay : {
						speedIn : 500,
						opacity : 0.95
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : \'none\',
				closeEffect	: \'none\',

				helpers : {
					title : {
						type : \'over\'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : \'fancybox-custom\',
				closeClick : true,

				helpers : {
					title : {
						type : \'inside\'
					},
					overlay : {
						css : {
							\'background-color\' : \'#eee\'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : \'elastic\',
				openSpeed  : 150,

				closeEffect : \'elastic\',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$(\'.fancybox-buttons\').fancybox({
				openEffect  : \'none\',
				closeEffect : \'none\',

				prevEffect : \'none\',
				nextEffect : \'none\',

				closeBtn  : false,

				helpers : {
					title : {
						type : \'inside\'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = \'Image \' + (this.index + 1) + \' of \' + this.group.length + (this.title ? \' - \' + this.title : \'\');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$(\'.fancybox-thumbs\').fancybox({
				prevEffect : \'none\',
				nextEffect : \'none\',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$(\'.fancybox-media\')
				.attr(\'rel\', \'media-gallery\')
				.fancybox({
					openEffect : \'none\',
					closeEffect : \'none\',
					prevEffect : \'none\',
					nextEffect : \'none\',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open(\'1_b.jpg\');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : \'iframe.html\',
					type : \'iframe\',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : \'1_b.jpg\',
						title : \'My title\'
					}, {
						href : \'2_b.jpg\',
						title : \'2nd title\'
					}, {
						href : \'3_b.jpg\'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
  '; ?>

  
</head>
<body onload="setFocus();">