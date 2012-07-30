<?php
namespace JetPay\Objects;

/**
 * Represents the request JetPay XML data structure which is defined in JetPay
 * XML PDF documentation.
 *
 * @TODO - Not all defined schema elements are present.
 */
class JetPay extends JetPayXMLObject {

  /**
   * The credit card limit is checked to verify that a certain amount is
   * available (and to reserve that amount), but the card is not charged.
   * Either a FORCE or CAPT is used to complete the transaction.
   * @var string
   */
  const AUTHONLY = 'AUTHONLY';

  /**
   * A credit card charge using an amount equal to or less than the amount of a
   * previous AUTHONLY transaction. The AUTHONLY transaction is required to be
   * present in the JetPay system for the capture to complete.
   * @var string
   */
  const CAPT = 'CAPT';

  /**
   * The CREDIT transaction submits a credit card transaction reversal for
   * settlement. The CREDIT reverses a transaction regardless of the
   * settlement status of the transaction it reverses.
   * @var string
   */
  const CREDIT = 'CREDIT';

  /**
   * Authorizes and captures a credit card charge in a single transaction.
   * @var string
   */
  const SALE = 'SALE';

  /**
   * The VOID transaction removes a credit card transaction from the host
   * before the transaction settles. If a transaction has already settled, it
   * cannot be VOIDed (when a transaction is not VOIDed before settlement, a
   * CREDIT transaction is required to reverse the charge). See also CREDIT.
   *
   * @var string
   */
  const VOID = 'VOID';

  /**
   * Cardholder's address.
   * @var string
   */
  protected $BillingAddress;

  /**
   * Cardholder's city.
   * @var string
   */
  protected $BillingCity;

  /**
   * Cardholder's state code abbreviation.
   * @var string
   */
  protected $BillingStateProv;

  /**
   * Cardholder's zip code.
   * @var string
   */
  protected $BillingPostalCode;

  /**
   * Cardholder's country, a valid ISO Country Code (consisting of either three
   * alphabetic characters or three digits).
   * @var string
   */
  protected $BillingCountry;

  /**
   * Cardholder's telephone number.
   * @var string
   */
  protected $BillingPhone;

  /**
   *
   * @var string
   */
  protected $CardName;

  /**
   * The credit card number or PAN ("personal account number") submitted for a
   * transaction. The PAN is thirteen to nineteen digits long, depending on
   * the type of the credit card.
   * @var string
   */
  protected $CardNum;

  /**
   * Two-digit card expiration month.
   * @var string
   */
  protected $CardExpMonth;

  /**
   * Two-digit card expiration year.
   * @var string
   */
  protected $CardExpYear;

  /**
   * The Card Verification Value printed on the back of a credit card. The CVV2
   * number is a three or four-digit value. These CVV2 digits provide
   * additional security for a transaction, assuring the physical presence of
   * a credit card. Please note the terminology differences between credit
   * card companies, in that Visa uses the CVV2 term (meaning "Card
   * Verification Value 2"), MasterCard uses CVC2 term (meaning "Card
   * Validation Code 2"), and American Express uses the CID term (meaning
   * "Card IDentifier code").
   * @var string
   */
  protected $CVV2;

  /**
   * Cardholder's email address.
   * @var string
   */
  protected $Email;

  /**
   * A string referencing an order.
   * @var string
   */
  protected $OrderNumber;

  /**
   * Purchase price to be transacted, including taxes and fees. The currency
   * type assumed for the amount is dependent on the merchant.Digits only:
   * no decimal point, no dollar sign, no plus/minus sign. Value must be
   * non-zero.
   * @var string
   */
  protected $TotalAmount;

  /**
   * Required for all transactions. The TransactionID is an 18-character value.
   * Allowed characters are "a" through "z" , "A" through "Z", "0" through "9"
   * and "-".
   * @var string
   */
  protected $TransactionID;

  /**
   * Required for all transactions. Must be one of:
   *  - SALE
   *  - AUTHONLY
   *  - CAPT
   *  - FORCE
   *  - VOID
   *  - ENQ
   *  - CREDIT
   *  - REVERSEAUTH
   *  - CHECK
   *  - REVERSAL
   *  - VOIDACH
   *  - PING
   *  - ACK
   * @var string
   */
  protected $TransactionType;

  /**
   * Required for all transactions. This ID is issued by JetPay LLC when an
   * account is set up with the merchant bank.
   * @var string
   */
  protected $TerminalID;

  /**
   * JetPay Account Safe tokens are data that can be used in the place of card
   * information when performing transactions.
   *
   * The token takes the place of the card number and the expiration date. No
   * other card holder information is associated with the token.
   * @var string
   */
  protected $Token;

  /**
   * User-defined field, available for reporting purposes.
   * @var string
   */
  protected $UDField1;

  /**
   * Customer's IP address.
   * @var string
   */
  protected $UserIPAddress;

  /**
   * @uses $Approval
   * @param string $id
   */
  public function setApproval($id) {
    $this->Approval = $id;
  }

  /**
   * @uses $BillingAddress
   * @param string $address_line_1
   */
  public function setBillingAddress($address_line_1) {
    $this->BillingAddress = $address_line_1;
  }

  /**
   * @uses $BillingCity
   * @param string $city
   */
  public function setBillingCity($city) {
    $this->BillingCity = $city;
  }

  /**
   * @uses $BillingStateProv
   * @param string
   */
  public function setBillingStateProv($state_province) {
    $this->BillingStateProv = $state_province;
  }

  /**
   * @uses $BillingPostalCode
   * @param string $postal_code
   */
  public function setBillingPostalCode($postal_code) {
    $this->BillingPostalCode = $postal_code;
  }

  /**
   * @uses $BillingCountry
   * @param string $country_code
   */
  public function setBillingCountry($country_code) {
    $this->BillingCountry = $country_code;
  }

  /**
   * @uses $Email
   * @param string $email
   */
  public function setEmail($email) {
    $this->Email = $email;
  }

  /**
   * @uses $TerminalID
   * @param string $id
   */
  public function setTerminalId($id) {
    $this->TerminalID = $id;
  }

  /**
   * @uses $TerminalID
   * @return string
   */
  public function getTransactionType() {
    return $this->TransactionType;
  }

  /**
   * @uses $TransactionType
   * @param string $type
   */
  public function setTransactionType($type) {
    $this->TransactionType = $type;
  }

  /**
   * @uses $CardName
   * @param string $name
   */
  public function setCardName($name) {
    $this->CardName = $name;
  }

  /**
   * @uses $CardName
   * @return string
   */
  public function getCardNum() {
    return $this->CardNum;
  }

  /**
   * @uses $CardNum
   * @param string $num
   */
  public function setCardNum($num) {
    $this->CardNum = $num;
  }

  /**
   * @uses $CardExpMonth
   * @param string $month
   */
  public function setCardExpMonth($month) {
    $this->CardExpMonth = $month;
  }

  /**
   * @uses $CardExpYear
   * @param string $year
   */
  public function setCardExpYear($year) {
    $this->CardExpYear = $year;
  }

  /**
   * @uses $CVV2
   * @param string $cvv2
   */
  public function setCVV2($cvv2) {
    $this->CVV2 = $cvv2;
  }

  /**
   * @uses $OrderNumber
   * @param string $number
   */
  public function setOrderNumber($number) {
    $this->OrderNumber = $number;
  }

  /**
   * @uses $TotalAmount
   * @param string $cents
   */
  public function setTotalAmount($cents) {
    $this->TotalAmount = $cents;
  }

  /**
   * @uses $TotalAmount
   * @return string
   */
  public function getToken() {
    return $this->Token;
  }

  /**
   * @uses $Token
   * @param string $token
   */
  public function setToken($token) {
    $this->Token = $token;
  }

  /**
   * @uses $Token
   * @return string
   */
  public function getTransactionId() {
    return $this->TransactionID;
  }

  /**
   * @uses $TransactionID
   * @param string $id
   */
  public function setTransactionId($id) {
    $this->TransactionID = $id;
  }

  /**
   * @uses $UserIPAddress
   * @param string $string
   */
  public function setUDField1($string) {
    $this->UserIPAddress = $string;
  }

  /**
   * @uses $UserIPAddress
   * @param string $ip_address
   */
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
