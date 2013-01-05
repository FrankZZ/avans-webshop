<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
		<title>Webshop F&amp;J - <?php echo $viewName?></title>
        <link type="text/css" href="<?php echo CSS_URL?>/style.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo CSS_URL?>/lightbox.css" rel="stylesheet" />
        <script src="<?php echo SCRIPT_URL?>/jquery-1.7.2.min.js"></script>
        <script src="<?php echo SCRIPT_URL?>/lightbox.js"></script>
	</head>
	<body>
		<div id="Wrapper">
			<div id="Header">
				<div id="CartSummary">
					<h2><a href="<?php echo BASE_URL?>/Cart">Winkelwagen</a></h2>
					<p><?php echo $cart->getProductCount()?> product<?php if ($cart->getProductCount() != 1) echo 'en';?></p>
					<p>Totaal:
					&euro;<?php echo number_format($cart->getTotal(), 2)?></p>
				</div>
				<div id="Menu">
					<ul>
						<?php foreach( $links as $link ):?>
						<li class="RoundedCorners">
							<a href="<?php echo $link['url']?>">
								<?php echo $link['name']?>
							</a>
						</li>
						<?php endforeach; ?>
                    </ul>
                    <div id="Search">
	                    <form id="searchForm" method="post" action="<?php echo BASE_URL?>/Catalog/Search">
		                    <ul>
			                    <li>
                                    <input id="searchString" name="searchString" type="text" value="Type hier uw zoekterm..." onClick="this.value = '';" />
			                    </li>
		                        <li>
				                    <a onClick="document.getElementById('searchString').value = ''; document.getElementById('searchForm').submit();">
					                    Zoeken
				                    </a>
								</li>
                            </ul>
                        </form>
					</div>
				</div>

            </div>
			<div id="Inner">
