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
	<?php
	if (empty($products))
	{
		echo '<div class="Item"><h2>Helaas, er zijn geen producten gevonden.</h2></div>';
	}
	else
		include(VIEW_DIR . '/ProductListView.php');
?>
</div>