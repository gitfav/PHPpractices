<?php 

	function my_callback_function(){
		echo 'Hell World!';
	}

	class Myclass{
		static function mycallbackmethod(){
			echo 'Hell World!';
		}
	}

	call_user_func('my_callback_function');

	call_user_func(array('Myclass','mycallbackmethod'));

	call_user_func('Myclass::mycallbackmethod');
	echo '<br/>';
	echo preg_replace_callback('~-([a-z])~', function ($match) {
		return $match[1];
	}, 'hello-world!');
	echo '<br/>';
	echo PHP_INT_MAX;
	echo '<br/>';
	define('NI','ni');
	echo NI;

class Cart
{
    const PRICE_BUTTER  = 1.00;
    const PRICE_MILK    = 3.00;
    const PRICE_EGGS    = 6.95;

    protected   $products = array();
    
    public function add($product, $quantity)
    {
        $this->products[$product] = $quantity;
    }
    
    public function getQuantity($product)
    {
        return isset($this->products[$product]) ? $this->products[$product] :
               FALSE;
    }
    
    public function getTotal($tax)
    {
        $total = 0.00;
        
        $callback =
            function ($quantity, $product) use ($tax, &$total)
            {
                $pricePerItem = constant(__CLASS__ . "::PRICE_" .
                    strtoupper($product));
                $total += ($pricePerItem * $quantity) * ($tax + 1.0);
            };
        
        array_walk($this->products, $callback);
        return round($total, 2);;
    }
}

$my_cart = new Cart;

// 往购物车里添加条目
$my_cart->add('butter', 1);
$my_cart->add('milk', 3);
$my_cart->add('eggs', 6);

// 打出出总价格，其中有 5% 的销售税.
print $my_cart->getTotal(0.05) . "\n";
// 最后结果是 54.29

 ?>