<?php
namespace JetPay\Objects;

use DOMDocument;

/**
 * Represents the request JetPay XML data structure.
 */
class JetPayXMLObject {
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

  /**
   *
   * @param string $xml
   * @return JetPayXMLObject
   */
  public function loadXML($xml) {
    $doc = new DOMDocument();
    $doc->loadXML($xml);
    $root = $doc->documentElement;
    foreach ($root->getElementsByTagName('*') as $element) {
      $this->{$element->tagName} = $element->nodeValue;
    }

    // Allow chaining.
    return $this;
  }
}
