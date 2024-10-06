<?php

namespace FoodOrders;

use Invoices\Invoice;
use FoodItems\FoodItem;

class FoodOrder {
    protected array $foodItems;
    protected float $totalPrice;
    protected string $orderTime;

    public function __construct(array $foodItems)
    {
        $this->foodItems = $foodItems;
        $this->totalPrice = $this->calculateTotalPrice();
        $this->orderTime = date("D M d, Y G:i");
    }

    public function calculateTotalPrice(): float {
        $total = 0;
        foreach ($this->foodItems as $foodItem) {
            if ($foodItem instanceof FoodItem) {
                $total += $foodItem->getPrice();
            }
        }
        return $total;
    }

    public function getFoodItems(): array {
        return $this->foodItems;
    }

    public function getTotalPrice(): float {
        return $this->totalPrice;
    }

    public function getOrderTime(): string {
        return $this->orderTime;
    }

    public function generateInvoice(): Invoice {
        // Generate and return a new Invoice object based on the total price
        return new Invoice($this->totalPrice);
    }

    public function printOrderDetails() {
        echo "Order Details:\n";
        echo "Order Time: " . $this->orderTime . "\n";
        echo "Food Items:\n";
        foreach ($this->foodItems as $foodItem) {
            echo "- " . $foodItem->getName() . " (" . $foodItem->getPrice() . ")\n";
        }
        echo "Total Price: " . $this->totalPrice . "\n";
    }
}
