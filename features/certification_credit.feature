Feature: Credit Certification Tests
  In order to be approved for JetPay usage
  As a client
  I need to make several different test transactions.

  Scenario Outline: CREDIT Transaction Tests
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "444444444444<PAN>"
    And I have a "CardExpMonth" of "<Exp MO>"
    And I have a "CardExpYear" of "<Exp YR>"
    And I have a "TotalAmount" of "<Amount>"
    And I'm running test case "<Test Case>"
    When I create a "<Type>" request
    And I execute the request
    Then I should get ActionCode "<Expected Code>"
    And store data for this test case

    Examples:
      | Test Case | Type   | PAN  | Exp MO | Exp YR | Amount | Expected Code |
      | CRED01    | CREDIT | 4448 | 12     | 13     | 1000   | 000           |
      | CRED02    | CREDIT | 4455 | 12     | 09     | 1000   | 917           |
      | CRED03    | CREDIT | 4462 | 12     | 13     | 1000   | 912           |
      | CRED04    | CREDIT | 4471 | 12     | 13     | 1505   | 000           |
