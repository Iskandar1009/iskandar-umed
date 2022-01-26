<?php

function cookCocktailMojito
(int $mint, 
 float $lime, 
 int $sprite, 
 int $ice, 
 int $cane_sugar, 
 string $feedbacks)
{
    echo "Slice $lime of lime and put in a glass.
    Add $mint grams of mint, $cane_sugar spoon of cane sugar and knead.
    Add $ice pieces of crushed ice and transfer the mixture to a shaker. And shake it.
    We shift it into a glass and pour $sprite milliliters of sprite.
    The drink is ready.
    $feedbacks";
}


cookCocktailMojito(10, 0.5, 150, 8, 1, "Drink this and chill");




/* Mint milk
0.5 liter, milk
2 tablespoons, sugar
2 twigs, mint
*/

function cookCocktailMintMilk
(float $milk
 int $sugar
 int $mint
 string $wishes)
{
	echo "1. Pour $milk liter the milk into a saucepan, rinse $mint twigs the mint and rub it lightly with your fingers so that the leaves give off a smell. We put it in a saucepan with milk and put the milk with mint on the fire.<br>
	2. Bring the milk to a boil, add $sugar tablespoons sugar and boil, stirring, for a minute or two. Remove the milk with mint from the heat and leave to cool for 20-30 minutes. We remove the foam, throw away $mint twigs the mint. We filter the milk and send it to cool in the refrigerator.<br>
	3. That's all, a delicious refreshing mint cocktail is ready. :) <br>
	$wishes";

	/* 1. Pour the milk into a saucepan, rinse the mint and rub it lightly with your fingers so that the leaves give off a smell. We put it in a saucepan with milk and put the milk with mint on the fire.<br>
	2. Bring the milk to a boil, add sugar and boil, stirring, for a minute or two. Remove the milk with mint from the heat and leave to cool for 20-30 minutes. We remove the foam, throw away the mint. We filter the milk and send it to cool in the refrigerator.<br>
	3. That's all, a delicious refreshing mint "cocktail" is ready. :) */
}

 cookCocktailMintMilk(0.5, 2, 2, 'Drink chilled');
