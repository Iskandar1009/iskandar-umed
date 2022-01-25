<?php

function cocktailMojito
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

cocktailMojito(10, 0.5, 150, 8, 1, "Drink this and chill");
