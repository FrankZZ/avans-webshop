<?php

require_once(CONTROLLER_DIR . '/iController.php');

class CheckoutController implements iController
{
    function clearSession()
    {
        session_start();
        session_destroy();
    }

	function home()
	{
        if(isset($_POST['submit']) && Manager::checkToken())
        {
            $this->clearSession();
        }

		Manager::generateToken();

        $cart = Loader::model('Cart');

        $view = Loader::view();
        $view->token = Manager::getToken();
		$view->products = $cart->getProducts();
        $view->load('Checkout');
	}
}
?>