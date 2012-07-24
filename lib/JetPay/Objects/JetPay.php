<?php
namespace JetPay\Objects;

use DOMDocument;

/**
 * Represents the request JetPay XML data structure.
 */
class JetPay extends JetPayXMLObject {
  const AUTHONLY = 'AUTHONLY';
  const CAPT = 'CAPT';
  const CREDIT = 'CREDIT';
  const SALE = 'SALE';
  const VOID = 'VOID';



  protected $BillingAddress;
  protected $BillingCity;
  protected $BillingStateProv;
  protected $BillingPostalCode;
  protected $BillingCountry;

  protected $CardName;
  protected $CardNum;
  protected $CardExpMonth;
  protected $CardExpYear;
  protected $CVV;

  protected $Email;

  protected $OrderNumber;

  protected $TotalAmount;
  protected $TransactionID;
  protected $TransactionType;
  protected $TerminalID;
  protected $Token;
  protected $UDField1;
  protected $UserIPAddress;
  /*

  empty($billing_address['thoroughfare']) ?:        $request->setBillingAddress($billing_address['thoroughfare']);
  empty($billing_address['locality']) ?:            $request->setBillingCity($billing_address['locality']);
  empty($billing_address['administrative_area']) ?: $request->setBillingStateProv($billing_address['administrative_area']);
  empty($billing_address['postal_code']) ?:         $request->setBillingPostalCode($billing_address['postal_code']);
  empty($billing_address['country']) ?:             $request->setBillingCountry($billing_address['country']);
  */

  public function setApproval($id) {
    $this->Approval = $id;
  }
  public function setBillingAddress($address_line_1) {
    $this->BillingAddress = $address_line_1;
  }
  public function setBillingCity($city) {
    $this->BillingCity = $city;
  }
  public function setBillingStateProv($state_province) {
    $this->BillingStateProv = $state_province;
  }
  public function setBillingPostalCode($postal_code) {
    $this->BillingPostalCode = $postal_code;
  }
  public function setBillingCountry($country_code) {
    $this->BillingCountry = $country_code;
  }

  public function setEmail($email) {
    $this->Email = $email;
  }


  public function setTerminalId($id) {
    $this->TerminalID = $id;
  }



  public function setTransactionType($type) {
    $this->TransactionType = $type;
  }

  public function setCardName($name) {
    $this->CardName = $name;
  }

  public function getCardNum() {
    return $this->CardNum;
  }
  public function setCardNum($num) {
    $this->CardNum = $num;
  }
  public function setCardExpMonth($month) {
    $this->CardExpMonth = $month;
  }
  public function setCardExpYear($year) {
    $this->CardExpYear = $year;
  }
  public function setCVV($cvv) {
    $this->CVV = $cvv;
  }

  public function setOrderNumber($number) {
    $this->OrderNumber = $number;
  }
  public function setTotalAmount($cents) {
    $this->TotalAmount = $cents;
  }

  public function getToken() {
    return $this->Token;
  }
  public function setToken($token) {
    $this->Token = $token;
  }

  /**
   * Get TransactionID
   *
   * @return string
   */
  public function getTransactionId() {
    return $this->TransactionID;
  }

  /**
   * Set TransactionID
   *
   * @param string $id
   */
  public function setTransactionId($id) {
    $this->TransactionID = $id;
  }

  public function setUDField1($string) {
    $this->UserIPAddress = $string;
  }
  public function setUserIPAddress($ip_address) {
    $this->UserIPAddress = $ip_address;
  }

  /**
   * Generate a random, 18 charachter alphanumeric token based on 14 character
   * datetime and 4 character random padding.
   *
   * @return string
   */
  public static function generateRandomToken() {
    $random_padding = implode('', array_rand(array_flip(array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9))), 4));
    return date('YmdHis') . $random_padding;
  }
}
