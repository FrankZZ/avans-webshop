<?php
?>
<div id="Left">
    <div class="Item">
        <h2>Categorie&#235;n</h2>
        <ul>
			<?php
			foreach ($categories as $cat)
			{
				if ($cat->parent === 0)
				{
					printCategories($cat, $cat);
				}
			}
			?>
        </ul>
    </div>
</div>




<?php
function printCategories($cat, $root = null)
{
	printCategory($cat, ($cat !== $root));

	if (!empty($cat->children))
	{
		if (!empty($cat->children))
		{
			echo '<ul>';

			foreach ($cat->children as $child)
			{
				printCategories($child, $cat);
			}

			echo '</ul>';
		}
	}
	echo '</li>';
}

function printCategory($cat, $showCount = true)
{
	$name = $cat->name;

	if ($showCount == true)
	{
		$name .= ' (s' . count($cat->products) . ')';
	}
	else
	{
		$name = '<b>' . $name . '</b>';
	}
	$baseurl = BASE_URL;
	echo <<<END
	<li>
		<a href="${baseurl}/Catalog/category/{$cat->id}">
			{$name}
		</a>
END;
}