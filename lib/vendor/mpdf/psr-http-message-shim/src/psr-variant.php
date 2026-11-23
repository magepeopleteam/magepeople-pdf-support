<?php
	/**
	 * Which psr/http-message major version is actually loaded in this request.
	 *
	 * WordPress resolves Psr\Http\Message\* once per request, from whichever plugin's
	 * autoloader registered first. mPDF ships this shim typed for psr/http-message ^2.0,
	 * so on a site where another plugin bundles ^1.0 (untyped interfaces) the typed shim
	 * is an incompatible implementation and PHP fatals the moment mPDF autoloads it while
	 * fetching a remote asset. Detect the loaded interfaces instead of assuming ^2.0.
	 */

	namespace Mpdf\PsrHttpMessageShim;

	if ( ! function_exists( __NAMESPACE__ . '\psr_http_message_variant' ) ) {
		/**
		 * @return string 'v2' when the loaded interfaces are typed ( psr/http-message ^2.0 ),
		 *                'v1' when they are not. Defaults to 'v2' - the shipped variant - when
		 *                the interfaces cannot be inspected.
		 */
		function psr_http_message_variant() {
			static $variant = null;

			if ( null !== $variant ) {
				return $variant;
			}

			$variant = 'v2';

			try {
				$method  = new \ReflectionMethod( 'Psr\Http\Message\RequestInterface', 'withRequestTarget' );
				$variant = $method->hasReturnType() ? 'v2' : 'v1';
			} catch ( \ReflectionException $e ) {
				// Interfaces unavailable: keep the shipped default.
			}

			return $variant;
		}
	}
