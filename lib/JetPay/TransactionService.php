<?php
namespace JetPay;

use JetPay\Client;
use JetPay\Objects\JetPay;
use JetPay\Objects\JetPayResponse;

/**
 * Handle transport of requests to HTTP Client.
 */
class TransactionService {

  /**
   * @var Client
   */
  protected $client;

  /**
   * @param Client $client
   *   The JetPay\Client to use.
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * Execute the transaction and parse a response.
   *
   * @param JetPay $request
   *   The request data.
   * @return JetPayResponse
   *   The response from JetPay.
   */
  public function execute(JetPay $request) {
    $http_response = $this->client->post($request);

    $response = new JetPayResponse();
    return $response->loadXML($http_response->getBody());
  }
}
