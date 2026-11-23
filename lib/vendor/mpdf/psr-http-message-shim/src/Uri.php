<?php
	/**
	 * Version-aware loader for Mpdf\PsrHttpMessageShim\Uri.
	 *
	 * The class itself lives in v1/ and v2/; psr_http_message_variant() picks the one whose
	 * method signatures match the psr/http-message interfaces loaded in this request.
	 * See psr-variant.php.
	 */

	require_once __DIR__ . '/psr-variant.php';
	require_once __DIR__ . '/' . \Mpdf\PsrHttpMessageShim\psr_http_message_variant() . '/Uri.php';
