<?php 

/*

Developed by:
    ___       ___       ___       ___       ___       ___            ___       ___       ___       ___       ___       ___       ___       ___   
   /\  \     /\__\     /\  \     /\  \     /\  \     /\  \          /\  \     /\  \     /\  \     /\  \     /\  \     /\__\     /\__\     /\  \  
  /::\  \   /:| _|_   /::\  \   /::\  \   /::\  \   /::\  \        /::\  \   _\:\  \   /::\  \   /::\  \   /::\  \   /:/  /    /:/  /    _\:\  \ 
 /::\:\__\ /::|/\__\ /:/\:\__\ /::\:\__\ /::\:\__\ /::\:\__\      /::\:\__\ /\/::\__\ /:/\:\__\ /::\:\__\ /::\:\__\ /:/__/    /:/__/    /\/::\__\
 \/\::/  / \/|::/  / \:\/:/  / \;:::/  / \:\:\/  / \/\::/  /      \/\:\/__/ \::/\/__/ \:\/:/  / \;:::/  / \:\:\/  / \:\  \    \:\  \    \::/\/__/
   /:/  /    |:/  /   \::/  /   |:\/__/   \:\/  /    /:/  /          \/__/   \:\__\    \::/  /   |:\/__/   \:\/  /   \:\__\    \:\__\    \:\__\  
   \/__/     \/__/     \/__/     \|__|     \/__/     \/__/                    \/__/     \/__/     \|__|     \/__/     \/__/     \/__/     \/__/  

www.andreafiorelli.com

*/

?>

<ul class="document-box">

  <?php foreach ($docs as $pubb ) :


		$file = get_field('file',$pubb->ID); 
		$autori =  get_field('doc-autori',$pubb->ID);
		$abstract =  get_field('doc-abstract',$pubb->ID);
		$web_url = get_field('file_url',$pubb->ID);
		$download_url = $file['url'];

		?>


		<li>
		<p class="doc-autori"><?php echo $autori; ?></p>
		<p class="doc-titolo"><?php echo $pubb->post_title; ?></p>

		<?php if ($abstract != ""): ?>
		<div class="reveal" id="pub<?php echo $pubb->ID; ?>" data-reveal>    	
				Abstract:<?php echo $abstract; ?>
		</div>    
		<?php endif ?>

		<a data-open = "pub<?php echo $pubb->ID; ?>">abstract</a>

		</li>

<?php endforeach; ?>

 </ul>