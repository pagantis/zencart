<?php
/**
 * Pagantis Payment Module
 *
 * @package languageDefines
 * @copyright Copyright 2016-2017 Pagantis Development Team
 * @copyright Pagantis
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Author: Albert Fatsini  mon dic 19 17:20:52 CET 2016
 */


  global $customer_id, $order;
  if ( MODULE_PAYMENT_PAGANTIS_DISCOUNT == 'True' ){
    $discount = 1;
  }else{
    $discount = 0;
  }

  if ( MODULE_PAYMENT_PAGANTIS_TESTMODE == 'Test' ){
    $key = MODULE_PAYMENT_PAGANTIS_TK;
  }else{
    $key = MODULE_PAYMENT_PAGANTIS_PK;
  }

  $widget = '';
  if ( MODULE_PAYMENT_PAGANTIS_WIDGET == 'True' ) {
    $widget =   '<div class="PmtSimulator" data-pmt-num-quota="4" data-pmt-style="neutral" data-pmt-type="3" data-pmt-discount="'.$discount.'" data-pmt-amount="'.(float)( $order->info['total']  ).'" data-pmt-expanded="no"></div>
      <script type ="text/javascript" src ="https://cdn.pagamastarde.com/pmt-simulator/3/js/pmt-simulator.min.js">
      </script>
      <script>
      (function(){
        pmtSimulator.simulator_app.setPublicKey("'.$key.'");
        setTimeout(function(){pmtSimulator.simulator_app.load_jquery();},1000);
      })();
      </script>';
  }

  define('MODULE_PAYMENT_PAGANTIS_TEXT_CATALOG_TITLE', 'Pago en cuotas '. $widget);  // Payment option title as displayed to the customer

  define('MODULE_PAYMENT_PAGANTIS_TEXT_ADMIN_TITLE', 'Pagantis');

  define('MODULE_PAYMENT_PAGANTIS_TEXT_DESCRIPTION', '<strong>Pagantis</strong><br /><br/>
            Pagantis es una plataforma de financiación online. Escoge Pagantis como tu método de pago para permitir el pago a plazos.
            <br /><br/>
  <img src="images/icon_popup.gif" border="0">
  <a target="_blank" style="text-decoration: underline; font-weight: bold;" href="https://bo.pagamastarde.com/">Login al panel de Pagantis</a>
  <br/><br/>
  <img src="images/icon_popup.gif" border="0">
  <a target="_blank" style="text-decoration: underline; font-weight: bold;" href="http://docs.pagamastarde.com/">Documentación</a><br /><br />
  Testing Info:<br /><b>Automatic Approval Credit Card Numbers:</b><br />Visa#: 4507670001000009<br />MC#: 5540500001000004<br />
  Expire date: 12 / current year <br />
  CVV: 989 <br />
  <b>Note:</b> These credit card numbers will return a decline in live mode, and an approval in test mode.');


  define('MODULE_PAYMENT_PAGANTIS_TEXT_TYPE', 'Type:');
  define('MODULE_PAYMENT_PAGANTIS_TEXT_ERROR_MESSAGE', 'There has been an error processing your credit card. Please try again.');
  define('MODULE_PAYMENT_PAGANTIS_TEXT_DECLINED_MESSAGE', 'Your credit card was declined. Please try another card or contact your bank for more info.');
  define('MODULE_PAYMENT_PAGANTIS_TEXT_ERROR', 'Credit Card Error!');
