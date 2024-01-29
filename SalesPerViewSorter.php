<?php

class SalesPerViewSorter implements ProductSorterInterface
{
    public function sort(array $products): array
    {
        usort($products, function ($a, $b) {
            $ratioA = $a->sales_count / $a->views_count;
            $ratioB = $b->sales_count / $b->views_count;
            return $ratioB <=> $ratioA;
        });
        return $products;
    }
}
