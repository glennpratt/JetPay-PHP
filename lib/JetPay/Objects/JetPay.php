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

  protected $TransactionID;
  protected $TransactionType;
  protected $TerminalID;
  protected $Token;

  protected $BillingAddress;
  protected $BillingCity;
  protected $BillingStateProv;
  protected $BillingPostalCode;
  protected $BillingCountry;
  protected $Email;

  public function setTerminalId($id) {
    $this->TerminalID = $id;
  }

  /**
   * Set TransactionID
   *
   * @param string $id
   */
  public function setTransactionId($id) {
    $this->TransactionID = $id;
  }

  /**
   * Set TransactionID
   *
   * @param string $id
   */
  public function setTransactionType($type) {
    $this->TransactionType = $type;
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
  public function setTotalAmount($cents) {
    $this->TotalAmount = $cents;
  }
  public function setApproval($id) {
    $this->Approval = $id;
  }
  public function setToken($token) {
    $this->Token = $token;
  }
}
