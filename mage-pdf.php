<?php
/**
* Plugin Name: MagePeople PDF Support
* Plugin URI: http://mage-people.com
* Description: This is the main PDF Lib for PDF Ticket, You Need to keep active this plugin for working MagePeople Plugin which generate PDF Tickets.
* Version: 1.0
* Author: MagePeople Team
* Author URI: http://www.mage-people.com/
* Text Domain: magepeople-pdf-support
* Domain Path: /languages/
*/

if( ! class_exists( 'mPDF' ) ) {
    require_once( dirname(__FILE__) . "/mpdf/mpdf.php");
}
