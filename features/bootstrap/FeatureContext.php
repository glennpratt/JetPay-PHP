<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use JetPay\Client;
use JetPay\Objects\JetPay;


// Require 3rd-party libraries here:

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';


/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * @var JetPay\Objects\JetPay
     */
    protected $request;

    /**
     * @var Client
     */
    protected $client;

    protected $response;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->request = new JetPay();
        $this->client = new Client();
    }

    /**
     * @Given /^I am using "([^"]*)"$/
     */
    public function iAmUsing($url)
    {
        $this->client->setGateway($url);
    }

    /**
     * @Given /^I have a TransactionID of "([^"]*)"$/
     */
    public function iHaveATransactionidOf($id)
    {
        $this->request->setTransactionId($id);
    }

    /**
     * @When /^I create a ping request$/
     */
    public function iCreateAPingRequest()
    {
        $this->request->setTransactionType('PING');
    }

    /**
     * @Given /^I execute the request$/
     */
    public function iExecuteTheRequest()
    {
        $this->response = $this->client->post($this->request);
    }

    /**
     * @Then /^I should get$/
     */
    public function iShouldGet(PyStringNode $string)
    {
      $expected = DOMDocument::loadXML($string);
      $got = DOMDocument::loadXML($this->response->getBody());
      assertEquals($expected->saveXML(), $got->saveXML());
    }

}
