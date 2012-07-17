<?php
namespace JetPay\Objects;

use DOMDocument;

/**
 * Represents the request JetPay XML data structure.
 */
class JetPay {
  protected $TransactionID;
  protected $TransactionType;
  protected $TerminalID;

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

  /**
   * Convert object to XML wrapper object.
   *
   * @return DOMDocument
   */
  public function toXML() {
    $xml = new DOMDocument('1.0', 'utf-8');
    $jetpay = $xml->appendChild($xml->createElement('JetPay'));
    foreach ($this as $key => $property) {
      $jetpay->appendChild($xml->createElement($key, $property));
    }
    return $xml;
  }

  /**
   * @return string
   */
  public function __toString() {
    return $this->toXML()->saveXML();
  }
}
