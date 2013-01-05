<?php
foreach ($products as $prod)
{
$imgsrc = IMG_URL . '/' . $prod->image;
$baseurl = BASE_URL;
echo <<<END
		<div class="Item" >
            <div class="Itemimgsmall">
END;
				echo '<a href="' . $imgsrc . '" data-lb="lightbox" title="' . $product->name . '"><img height="85" src="'.$imgsrc.'" alt="'.$product->name.'" /></a>';
				//echo '<img height="85" src="'.$imgsrc.'" alt="'.$prod->name.'" />';

                echo<<<END
            </div>
            <div class="Itemtxtsmall">
                <h2>{$prod->name}</h2>
                <p>{$prod->summary}</p>
				<form id="addProd{$prod->id}" method="post" action="{$baseurl}/Cart/Add/{$prod->id}">
					<input type="hidden" name="fnj_token" value="{$token}" />
					<a href="{$baseurl}/Catalog/Product/{$prod->id}">Bekijk product</a> &#124;
					<a onClick="document.getElementById('addProd{$prod->id}').submit();">Voeg toe aan winkelmandje</a>
					<span class="price">&euro;{$prod->price}</span>
				</form>
            </div>
        </div>
END;
}