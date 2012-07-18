<?php
namespace JetPay\Objects;

class JetPayResponse extends JetPayXMLObject {

  protected $Approval;

  protected $ActionCode;

  protected $TransactionID;

  public function getActionCode() {
    return $this->ActionCode;
  }
  public function getApproval() {
    return $this->Approval;
  }
  public function getTransactionID() {
    return $this->TransactionID;
  }
}
