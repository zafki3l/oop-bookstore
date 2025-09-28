<?php 

class OrderErrorHandle
{
    private $order;

    public function __construct($order = new Order())
    {
        $this->order = $order;
    }
}
?>