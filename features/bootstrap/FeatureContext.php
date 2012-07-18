<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use JetPay\Client;
use JetPay\Objects\JetPay;
use JetPay\Objects\JetPayResponse;


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
        // Use the test merchant id by default.
        $this->request->setTerminalId('TESTMERCHANT');
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
     * @Given /^I have a "([^"]*)" of "([^"]*)"$/
     */
    public function iHaveAOf($arg1, $arg2)
    {
      $setter = "set{$arg1}";
      $this->request->$setter($arg2);
    }

    /**
     * @Given /^I have an "([^"]*)" of "([^"]*)"$/
     */
    public function iHaveAnOf($arg1, $arg2)
    {
      return $this->iHaveAOf($arg1, $arg2);
    }

    /**
     * @Given /^I have a "([^"]*)" of ""(\d+)"$/
     */
    public function iHaveAOf2($arg1, $arg2)
    {
      return $this->iHaveAOf($arg1, $arg2);
    }

    /**
     * @Given /^I execute the request$/
     */
    public function iExecuteTheRequest()
    {
        //echo $this->request;
        //exit;
        $this->response = $this->client->post($this->request);
    }

    /**
     * @When /^I create a "([^"]*)" request$/
     */
    public function iCreateARequest($arg1)
    {
      $this->request->setTransactionType($arg1);
    }

    /**
     * @Then /^I should get ActionCode "([^"]*)"$/
     */
    public function iShouldGetActioncode($arg1)
    {
      $doc = DOMDocument::loadXML($this->response->getBody());
      $response = JetPayResponse::fromXML($doc);
      assertEquals($arg1, $response->getActionCode());
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
