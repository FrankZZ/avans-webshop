<?php
/**
 * @author Frank Wammes
 * @date 14-12-12
 * @time 3:08
 * @version 0.1
 * @desc
 */
include(VIEW_DIR . '/CategoryListView.php');
?>
<div id="Right">
    <h1>Catalogus &#187; <?php echo $categoryName?></h1>
	<?php
	if (empty($products))
	{
		echo '<div class="Item"><h2>Helaas, deze categorie heeft geen producten.</h2></div>';
	}
	else
		include(VIEW_DIR . '/ProductListView.php');
?>
</div>