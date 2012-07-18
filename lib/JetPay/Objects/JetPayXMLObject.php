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
   * @param DOMDocument $xml
   * @return \JetPay\Objects\JetPayXMLObject
   */
  public static function fromXML(DOMDocument $xml) {
    $object = new static();
    $root = $xml->documentElement;
    foreach ($root->getElementsByTagName('*') as $element) {
      $object->{$element->tagName} = $element->nodeValue;
    }
    return $object;
  }
}
