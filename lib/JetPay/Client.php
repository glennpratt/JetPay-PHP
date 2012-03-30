<?php
namespace JetPay;

use Buzz\Browser;

class Client {

  protected $headers = array(
      'Content-Type: text/xml',
      'Accept: text/xml',
  );

  protected $gateway;

  /**
   * Set the gateway url.
   *
   * @param string $url
   */
  public function setGateway($url) {
    $this->gateway = $url;
  }

  public function post($data) {
    $browser = new Browser();
    return $browser->post($this->gateway, $this->headers, (string) $data);
  }

}
