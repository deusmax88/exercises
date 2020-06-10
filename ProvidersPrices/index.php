<?php
// Suppose we've got sale orders from multiple providers
// in terms of offerId => price
// we need to group offers from multiple providers
// and sort them by provider price

$allOffers = [
    [
        1 => 10,
        2 => 20,
        3 => 30,
    ],
    [
        1 => 40,
        2 => 50,
        3 => 60
    ]
];

// Sees over complicated
// Maybe just use single PriorityQueue

$priorityQueue = new \SplPriorityQueue();
foreach($allOffers as $providerId => $offers) {
    foreach($offers as $offerId => $price) {
        $priorityQueue->insert([
            $offerId,
            $providerId,
            $price
        ], $price);
    }
}

$groupedOffers = [];
while($priorityQueue->valid()) {
    [$offerId, $providerId, $price] = $priorityQueue->current();
    if (!array_key_exists($offerId, $groupedOffers)) {
        $groupedOffers[$offerId] = [];
    }
    $groupedOffers[$offerId][] = [$providerId, $price];

    $priorityQueue->next();
}

foreach($groupedOffers as $offerId => $offers) {
    echo "Offer Id: ".$offerId.PHP_EOL;
    foreach($offers as $offer) {
        [$providerId, $price] = $offer;
        echo "Provider Id: ".$providerId." Price: ".$price.PHP_EOL;
    }
}