<?php
namespace JetPay\Objects;

class JetPayResponse extends JetPayXMLObject {

  public function getActionCode() {
    return $this->ActionCode;
  }
}
