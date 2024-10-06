<?php

namespace Invoices;

class Invoice{
    protected float $finalPrice;
    protected string $orderTime;

    public function __construct(float $finalPrice)
    {
        $this->finalPrice = $finalPrice;
        $this->orderTime = date("D M d,Y G:i");
    }

    public function getFinalPrice():float{
        return $this->finalPrice;
    }

    public function getOrderTime():string{
        return $this->orderTime;
    }

    public function printInvoice(){
        $hr = "----------------------------------\n";
        print(sprintf(
            "%sDate: %s\nFinal Price:  %s\n%s",
            $hr,
            $this->orderTime,
            $this->finalPrice,
            $hr
        ));
    }
}