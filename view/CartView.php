<div id="Right" class="fullRight">
	<h1>Winkelwagen</h1>
	<?php
	$baseurl = BASE_URL;
	$totalprice = 0;
	if (count($products) == 0)
	{
		echo <<<END
			<div class="Item">
				<h2>U heeft geen producten in uw winkelwagen.</h2>
			</div>
END;
	}
	else
	foreach ($products as $prodArray)
	{
		$prod = $prodArray[0];
		$quantity = $prodArray[1];
		$totalprice += ($prod->price * $quantity);
	echo <<<END
		<div class="Item">
		    <div class="ItemKar" style="min-height: 100px; width:800px; float:left;">
			    {$quantity}x <h2>{$prod->name}</h2>
			    <p>{$prod->summary}</p>
			    <p>
			    	<form id="delProd{$prod->id}" method="post" action="${baseurl}/Cart/Remove/{$prod->id}">
			    		<input type="hidden" name="fnj_token" value="{$token}" />
			    		<a onClick="document.getElementById('delProd{$prod->id}').submit();">Verwijder product uit winkelmandje</a>
			    	</form>
			    	<span class="price">&euro;{$prod->price}</span>
			    </p>
             </div>

			<div class="KarKnoppen" style="min-height: 100px; width:100px; float:right;">

			<div style="float:left; margin-top:30px; padding:5px; ">
			<form method="post" action="${baseurl}/Cart/Add/{$prod->id}" >
                <input type="hidden" name="fnj_token" value="{$token}"/>
                <button type="submit" name="+" value="+">+</button>
            </form>
            </div>

            <div style="float:left; margin-top:30px; padding:5px;">
            <form method="post" action="${baseurl}/Cart/Remove/{$prod->id}">
                <input type="hidden" name="fnj_token" value="{$token}"/>
                <button type="submit" name="-" value="-">-</button>
            </form>
            </div>

            <div style="float:left; margin-top:30px; padding:5px;">
            <form method="post" action="${baseurl}/Cart/Set/{$prod->id}/0">
                <input type="hidden" name="fnj_token" value="{$token}"/>
                <button type="submit" name="X" value="X">X</button>
            </form>
            </div>

			</div>
		</div>
END;
	}
	$totalprice = number_format($totalprice, 2);
	echo <<<END
		<div class="Item">
			<p class="price">Totaalprijs: &euro;{$totalprice}</p>
		</div>
END;

?>
</div>