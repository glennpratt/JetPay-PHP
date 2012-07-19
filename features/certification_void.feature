@certification
Feature: Void Certification Tests
  In order to be approved for JetPay usage
  As a client
  I need to make several different test transactions.

  Scenario Outline: CREDIT Transaction Tests
    Given I create a "<Type>" request
    And I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "455555555555<PAN>"
    And I have a "CardExpMonth" of "<Exp MO>"
    And I have a "CardExpYear" of "<Exp YR>"
    And I have a "TotalAmount" of "<Amount>"
    And I'm running test case "<Test Case>"
    When I execute the request
    Then I should get ActionCode "<Expected Code>"
    And store data for this test case

    Examples:
      | Test Case | Type     | PAN  | Exp MO | Exp YR | Amount | Expected Code |
      | VOID01a   | AUTHONLY | 5519 | 12     | 13     | 1000   | 000           |
      | VOID01b   | VOID     | 5519 | 12     | 13     | 1000   | 000           |

