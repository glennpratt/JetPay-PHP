<?php
namespace JetPay\Objects;

/**
 * Represents the request JetPay XML data structure.
 */
class JetPay {
  protected $transaction_id;
  protected $transaction_type;

  /**
   * Set TransactionID
   *
   * @param string $id
   */
  public function setTransactionId($id) {
    $this->transaction_id = $id;
  }

  /**
   * Set TransactionID
   *
   * @param string $id
   */
  public function setTransactionType($type) {
    $this->transaction_type = $type;
  }

  public function __toString() {
    return "<JetPay>
<TransactionType>{$this->transaction_type}</TransactionType>
<TerminalID>TESTMERCHANT</TerminalID>
<TransactionID>{$this->transaction_id}</TransactionID>
</JetPay> ";
  }

}
