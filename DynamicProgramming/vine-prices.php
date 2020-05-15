<?php
// Представим что есть полка с бутылками вина в количестве N штук
// Каждый год вино дорожает кратно количеству лет
// Мы хотим продать вино каждый год по одной бутылке.
// Каждый год мы можем продовать только крайнюю левую, либо крайнюю правую бутылку.
// И нам запрещено перемещать бутылки на полке
// Задача понять какую максимальную выручку можно получить продавая бутылки
// С такими ограничениями

$vinePrices = [1,2,3];
$vinePrices = [1,4,2,3];

$vinePrices = [2, 3, 5, 1, 4];

function getProfit($vinePrices, $currentYear = 1)
{
    if (count($vinePrices) == 1) {
        return $currentYear * array_shift($vinePrices);
    }

    $rightPrices = $vinePrices;
    $leftBottlePrice = array_shift($rightPrices);
    $leftPrices = $vinePrices;
    $rightBottlePrice = array_pop($leftPrices);

    return max(
        $leftBottlePrice * $currentYear + getProfit($rightPrices,$currentYear + 1) ,
        getProfit($leftPrices, $currentYear + 1) + $rightBottlePrice * $currentYear
    );
}

//$vinePrices = [2, 3];

echo getProfit($vinePrices)."\n";