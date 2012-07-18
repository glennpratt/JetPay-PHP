Feature: General Examples
  In order to test connectivity
  As a client
  I need to make common test request to JetPay.

  Scenario: Ping Transaction Example
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a "TransactionID" of "010327153017T10052"
    When I create a "PING" request
    And I execute the request
    Then I should get ActionCode "000"

  Scenario: Authonly Transaction Example
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a "TransactionID" of "010327153017T10052"
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I create a "AUTHONLY" request
    And I execute the request
    Then I should get ActionCode "000"

  Scenario: Capture Transaction Example
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a "TransactionID" of "010327153017T10052"
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I create a "CAPT" request
    And I execute the request
    Then I should get ActionCode "000"

  Scenario: Sale Transaction Example
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a "TransactionID" of "010327153017T10052"
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I create a "SALE" request
    And I execute the request
    Then I should get ActionCode "000"

  Scenario: Force Transaction Example
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a "TransactionID" of "010327153017T10018"
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have an "Approval" of "502F6B"
    And I have a "TotalAmount" of "8799"
    When I create a "FORCE" request
    And I execute the request
    Then I should get ActionCode "000"

  Scenario: Void Transaction Example
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a "TransactionID" of "010327153x17T10418"
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "8719"
    And I have an "Approval" of "502F7B"
    When I create a "VOID" request
    And I execute the request
    Then I should get ActionCode "000"

  Scenario: Reverse Authorization Transaction Example
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a "TransactionID" of "010327153017T10052"
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I create a "REVERSEAUTH" request
    And I execute the request
    Then I should get ActionCode "000"

  Scenario: Credit Transaction Example
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a "TransactionID" of "010327153017T10052"
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I create a "CREDIT" request
    And I execute the request
    Then I should get ActionCode "000"

  Scenario: Enquire Transaction Example
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a "TransactionID" of "010327153017T10052"
    And I have a "CardNum" of "4000300020001000"
    And I have a "CardExpMonth" of "12"
    And I have a "CardExpYear" of "15"
    And I have a "TotalAmount" of "99999"
    When I create a "ENQ" request
    And I execute the request
    Then I should get ActionCode "000"