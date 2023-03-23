<?php

namespace Source\Traits;

class Cart
{
    use UserTrait;
    use AddressTrait;

    private $products;
    private $cart;

    public function add($id, $product, $qty, $price)
    {
        $this->products[$id] = [
            "product" => $product,
            "qty" => $qty,
            "price" => $price,
            "total" => $qty * $price
        ];
        $this->cart += $qty * $price;
    }

    public function remove($id, $qty)
    {
        $this->cart -= $qty * $this->products[$id]["price"];

        if ($this->products[$id]["qty"] > $qty) {
            $this->products[$id]["qty"] -= $qty;
            $this->products[$id]["total"] = $this->products[$id]["qty"] * $this->products[$id]["price"];
        }else{
            unset($this->products[$id]);
        }
    }

    public function checkout(User $user, Address $address)
    {
        $this->setUser($user);
        $this->setAddress($address);
    }
}