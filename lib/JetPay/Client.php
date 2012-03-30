<?php
namespace JetPay;

use Buzz\Browser;

class Client {

  protected $headers = array(
      'Content-Type: text/xml',
      'Accept: text/xml',
  );

  /**
   * Set the gateway url.
   *
   * @param string $url
   */
  public function setGateway($url) {

  }

  public function post($data) {
    $browser = new Browser();
    return $browser->post('https://test1.jetpay.com/jetpay', $this->headers, (string) $data);
  }

}
