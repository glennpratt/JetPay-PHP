<?php
namespace JetPay;

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
    $client = new \Guzzle\Service\Client();
    return $client->post($this->gateway, $this->headers, (string) $data)->send();
  }

}
