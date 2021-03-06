<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2010, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

/**
 * Welcome to Lithium! This front-controller file is the gateway to your application. It is
 * responsible for intercepting requests, and handing them off to the `Dispatcher` for processing.
 *
 * If you're sharing a single Lithium core install or other libraries among multiple
 * applications, you may need to manually set things like `LITHIUM_LIBRARY_PATH`. You can do that in
 * `config/bootstrap.php`, which is loaded below:
 */
require dirname(__DIR__) . '/config/bootstrap.php';

/**
 * The following will instantiate a new `Request` object and pass it off to the `Dispatcher` class.
 * By default, the `Request` will automatically aggregate all the server / environment settings, URL
 * and query string parameters, request content (i.e. POST or PUT data), and HTTP method and header
 * information.
 *
 * The `Request` is then used by the `Dispatcher` (in conjunction with the `Router`) to determine
 * the correct controller to dispatch to, and the correct response type to render. The response
 * information is then encapsulated in a `Response` object, which is returned from the controller
 * to the `Dispatcher`, and finally echoed below. Echoing a `Response` object causes its headers to
 * be written, and its response body to be written in a buffer loop.
 *
 * @see lithium\action\Request
 * @see lithium\action\Response
 * @see lithium\action\Dispatcher
 * @see lithium\net\http\Router
 */
try{
	echo lithium\action\Dispatcher::run(new lithium\action\Request());
} catch (Exception $e) {
	header('HTTP/1.1 500 Internal Server Error');
?>
	<a href="http://api.apontador.com.br/pt/status.html" rel="external nofollow">
		<img src="<?php echo ROOT_URL;?>img/a_casa_caiu.jpg" alt="A casa caiu" border="0"/>
	</a>
	<h2>
		A casa caiu...
		<?php echo $e->getMessage();?>
	</h2>
	<h3>
		Mas n&atilde;o desista! Daqui a pouco estamos de volta.
	</h3>
<?php } ?>

