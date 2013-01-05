<div id="Right" style="width: 935px;">
	<h1>Afrekenen</h1>
        <?php
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
			{$quantity}x <h2>{$prod->name}</h2>
			<span class="price">&euro;{$prod->price}</span>
			<p>{$prod->summary}</p>
		</div>
END;
        }

        $totalprice = number_format($totalprice, 2);
      echo <<<END
    <div class ="checkout">

        <p class="price">Totaalprijs: &euro;{$totalprice}</p>

        <form method="post">
			<input type="hidden" name="fnj_token" value="{$token}" />
			<button type="submit" name="submit" value="submit">Afrekenen</button>
        </form>
    </div>
</div>
END;

?>
