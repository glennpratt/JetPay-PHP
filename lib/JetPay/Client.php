<?php
namespace JetPay;

use Guzzle\Http\Message\EntityEnclosingRequest;
use JetPay\TransactionService;

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

  /**
   *
   * @return TransactionService
   */
  public function transaction() {
    return new TransactionService($this);
  }

  /**
   *
   * @param string $data
   *
   * @return EntityEnclosingRequest
   */
  public function post($data) {
    $client = new \Guzzle\Service\Client();
    return $client->post($this->gateway, $this->headers, (string) $data)->send();
  }

}
