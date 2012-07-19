@examples
Feature: General Examples
  In order to test connectivity
  As a client
  I need to make common test request to JetPay.

  @ping
  Scenario: Ping Transaction Example
    Given I create a "PING" request
    And I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    When I execute the request
    Then I should get ActionCode "000"

  @authonly
  Scenario: Authonly Transaction Example
    Given I create a "AUTHONLY" request
    And I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I execute the request
    Then I should get ActionCode "000"

  @authonly @capt
  Scenario: Capture Transaction Example
    Given I create a "AUTHONLY" request
    And I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    And I execute the request
    And I store the response
    And I create a "CAPT" request
    And I use the stored response "Approval"
    And I use the stored response "TransactionID"
    When I execute the request
    Then I should get ActionCode "000"

  @sale
  Scenario: Sale Transaction Example
    Given I create a "SALE" request
    And I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I execute the request
    Then I should get ActionCode "000"

  @force
  Scenario: Force Transaction Example
    Given I create a "FORCE" request
    And I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have an "Approval" of "502F6B"
    And I have a "TotalAmount" of "8799"
    When I execute the request
    Then I should get ActionCode "000"

  @void
  Scenario: Void Transaction Example
    Given I create a "SALE" request
    And I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    And I execute the request
    And I store the response
    And I create a "VOID" request
    And I use the stored response "Approval"
    And I use the stored response "TransactionID"
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I execute the request
    Then I should get ActionCode "000"

  @reverseauth
  Scenario: Reverse Authorization Transaction Example
    Given I create a "SALE" request
    And I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    And I execute the request
    And I store the response
    And I create a "REVERSEAUTH" request
    And I use the stored response "Approval"
    And I use the stored response "TransactionID"
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I execute the request
    Then I should get ActionCode "000"

  @credit
  Scenario: Credit Transaction Example
    Given I create a "CREDIT" request
    And I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I execute the request
    Then I should get ActionCode "000"

  @enquire
  Scenario: Enquire Transaction Example
    Given I create a "SALE" request
    And I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    And I execute the request
    And I store the response
    And I create a "ENQ" request
    And I use the stored response "TransactionID"
    When I execute the request
    Then I should get ActionCode "000"
