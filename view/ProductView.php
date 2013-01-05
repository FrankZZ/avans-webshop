<?php
/**
 * @author Frank Wammes
 * @date 14-12-12
 * @time 3:40
 * @version 0.1
 * @desc
 */
include(VIEW_DIR . '/CategoryListView.php');
$baseurl = BASE_URL;
?>
<div id="Right">
    <h1>Catalogus &#187; Product <?php echo $product->name?></h1>
	<?php
	if (isset($product))
	{
        $imgsrc = IMG_URL . '/' . $product->image;

		echo <<<END
			<div class="Itemtxt">
				<h2>{$product->name}</h2>
				<p>{$product->description}</p>
				<form id="addProd{$product->id}" method="post" action="{$baseurl}/Cart/Add/{$product->id}">
					<input type="hidden" name="fnj_token" value="{$token}" />
					<a onClick="document.getElementById('addProd{$product->id}').submit();">Voeg toe aan winkelmandje</a>
				</form>
				<span class="price">&euro;{$product->price}</span>
			</div>

			<div class="Itemimg">
END;
               echo '<a href="' . $imgsrc . '" data-lb="lightbox" title="' . $product->name . '"><img width="250" src="'.$imgsrc.'" alt="'.$product->name.'" /></a>';       echo<<<END
        </div>
END;

	}
	?>
</div>