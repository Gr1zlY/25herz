<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css">
		<script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>js/jquery.corners.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#mainMenu li").corner("4px");
				$(".meta span, input, textarea, #pagination *").corner("4px");	
			});
		</script>
        <title><?php echo $meta['title']; ?></title>
        
        <?php if(isset($meta) and $meta != FALSE):?>
		<meta name="description" content="<?php echo $meta['meta_description'];?>" />
		<meta name="keywords" content="<?php echo $meta['meta_tags'];?>" />
	<?php endif;?>
    </head>
    <body>
    	<div id="leftCol">
    		<div id="logo">
        		<h1><?php echo anchor('', '25HERZ')?></h1>
			</div>
		</div>
		<div id="rightCol">
			<?php $this->load->view('parts/menu'); ?>
			<div class = "cleanup"></div>
			
			<?php if(isset($page) AND $page != FALSE): ?>
				<?php $this->load->view($page); ?>
			<?php endif; ?>
		</div>
		<div id="footer">
			<?php $this->load->view('parts/footer'); ?>
		</div>
    </body>
</html>
