Feature: General Examples
  In order to test connectivity
  As a client
  I need to make common test request to JetPay.

  Scenario Outline: Sale Transaction Tests
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a "TransactionID" of "010327153017T10052"
    And I have a "CardNum" of "411111111111<PAN>"
    And I have a "CardExpMonth" of "<Exp MO>"
    And I have a "CardExpYear" of "<Exp YR>"
    And I have a "TotalAmount" of "<Amount>"
    When I create a "<Type>" request
    And I execute the request
    Then I should get ActionCode "000"
    
  Examples:
      | Test Case |   Type   | PAN  | Exp MO | Exp YR | Amount | Expected Result |
      |  STND001  |   SALE   | 1111 |   12   |   13   |  1000  |     APPROVED    |
      |  STND002  |   SALE   | 1111 |   12   |   09   |  1000  |     EXPIRED     |
      |  STND105a | AUTHONLY | 1160 |   12   |   13   |  1000  |     APPROVED    |
