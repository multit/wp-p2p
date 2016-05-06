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
$colonne = 3;
$n_colonne = floor ( 12 / $colonne);
$curr_col = 1;
?>

<!-- <div class="row small-up-1 medium-up-2 large-up-2 document-box"> -->

  <?php foreach ($docs as $pubb ) :
		$file = get_field('file',$pubb->ID); 
		$autori =  get_field('doc-autori',$pubb->ID);
		$abstract =  get_field('doc-abstract',$pubb->ID);
		$web_url = get_field('file_url',$pubb->ID);
		$download_url = $file['url'];
		//$curr_col = ( $curr_col >  $colonne ) ? 1 : $curr_col ; 

		if ($curr_col == 1) {
			echo '<div class="row">';
		}
		?>


		<?php if ($abstract != ""): ?>

		<div class="column document-box large-<?php  echo $n_colonne ?> end document-box">
			<a data-open="pub<?php echo $pubb->ID; ?>">
				<p class="doc-autori"><?php //echo $curr_col ?> <?php echo $autori; ?></p>
				<p class="doc-titolo"><?php echo $pubb->post_title; ?></p>
				<p class="doc-opener">abstract &amp; download</p>
			</a>
		</div>

		<div class="reveal doc-popup-abstract" data-reveal id="pub<?php echo $pubb->ID; ?>">    	
				<h2 class="random_colored">Abstract</h2>
				<h4><?php echo $pubb->post_title; ?></h4>
				<?php echo $abstract; ?>
				<a href=""><p class="doc-opener">
					Download file
				</p></a>
		</div>   

		<?php endif ?>


<?php 
$curr_col ++;
if ($curr_col > $colonne) {
	echo "</div>";
	$curr_col = 1;	
}

endforeach; ?>

<!-- </div> -->