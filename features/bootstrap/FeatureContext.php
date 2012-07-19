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

    protected $major_test_id;
    protected $current_test_id;
    protected static $test_shared_storage = array();
    protected static $test_case_result = array();

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
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
     * @Given /^I have a valid, unique TransactionID$/
     */
    public function iHaveAValidUniqueTransactionid()
    {
      $random_padding = implode('', array_rand(array_flip(array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9))), 4));
      $id = date('YmdHis') . $random_padding;
      $this->request->setTransactionId($id);
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
      $this->request = new JetPay();
      // Use the test merchant id by default.
      $this->request->setTerminalId('TESTMERCHANT');
      $this->request->setTransactionType($arg1);
    }

    /**
     * @Then /^I should get ActionCode "([^"]*)"$/
     */
    public function iShouldGetActioncode($arg1)
    {
      $doc = new DOMDocument();
      $doc->loadXML($this->response->getBody());
      $response = JetPayResponse::fromXML($doc);
      assertRegExp("/$arg1/", $response->getActionCode());
    }

    /**
     * @Then /^I should get$/
     */
    public function iShouldGet(PyStringNode $string)
    {
      $expected = new DOMDocument();
      $expected->loadXML($string);
      $got = new DOMDocument();
      $got->loadXML($this->response->getBody());
      assertEquals($expected->saveXML(), $got->saveXML());
    }

    /**
     * @Given /^I store the response$/
     */
    public function iStoreTheResponse()
    {
      $doc = new DOMDocument();
      $doc->loadXML($this->response->getBody());
      $response = JetPayResponse::fromXML($doc);
      $this->lastResponse = $response;
    }

    /**
     * @Given /^I use the stored response "([^"]*)"$/
     */
    public function iUseTheStoredResponse($arg1)
    {
      $this->request->{"set$arg1"}($this->lastResponse->{"get$arg1"}());
    }

    /**
     * @Given /^I\'m running test case "([^"]*)"$/
     */
    public function iMRunningTestCase($arg1)
    {
      $this->current_test_id = $arg1;
      // Strip lowercase sub-test identifier to use the same storage for major tests.
      $this->major_test_id = preg_replace("/[^A-Z0-9\s\p{P}]/", "", $arg1);

      if (isset(self::$test_shared_storage[$this->major_test_id])) {
        $stored_response = self::$test_shared_storage[$this->major_test_id];
        $approval = $stored_response->getApproval();
        $this->request->setApproval($approval);
      }
    }

    /**
     * @Given /^store data for this test case$/
     */
    public function storeDataForThisTestCase()
    {
      if (empty($this->major_test_id) || empty($this->current_test_id)) {
        throw new ErrorException('Current test case not found, step invalid.');
      }
      $doc = new DOMDocument();
      $doc->loadXML($this->response->getBody());
      $response = JetPayResponse::fromXML($doc);

      // Store the major test case response on the first minor test.
      if (!isset(self::$test_shared_storage[$this->major_test_id])) {
        self::$test_shared_storage[$this->major_test_id] = $response;
      }
    }

    /**
     * @AfterScenario @certification
     */
    public function storeCertification() {
      $doc = new DOMDocument();
      $doc->loadXML($this->response->getBody());
      $response = JetPayResponse::fromXML($doc);
      self::$test_case_result[$this->current_test_id] = $response;
    }

    /**
     * @AfterSuite
     */
    public static function writeCertificationTestCSV() {
      // Check if we should write and if we have any results.
      if (!getenv('JETPAY_WRITE_CERT_CSV') || empty(self::$test_case_result)) {
        return;
      }

      $filename = 'jetpay-certification-results.csv';
      $fp = fopen($filename, 'w');

      $header = array('Test Case', 'Transaction ID', 'Action Code', 'Approval');
      $keys = array_flip($header);

      fputcsv($fp, $header, ',', '"');
      foreach (self::$test_case_result as $id => $result) {
        $values = array($id);
        $values[] = $result->getTransactionID();
        $values[] = $result->getActionCode();
        $values[] = $result->getApproval();
        fputcsv($fp, $values, ',', '"');
      }
      echo 'Certification CSV written to: '. getcwd() . "/$filename \n";
    }

}
