Feature: Standard Certification Tests
  In order to be approved for JetPay usage
  As a client
  I need to make several different test transactions.

  Scenario Outline: Sale Transaction Tests
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a valid, unique TransactionID
    And I have a "CardNum" of "411111111111<PAN>"
    And I have a "CardExpMonth" of "<Exp MO>"
    And I have a "CardExpYear" of "<Exp YR>"
    And I have a "TotalAmount" of "<Amount>"
    And I'm running test case "<Test Case>"
    When I create a "<Type>" request
    And I execute the request
    Then I should get ActionCode "<Expected Code>"
    And store data for this test case

  Examples:
      | Test Case |   Type   | PAN  | Exp MO | Exp YR | Amount | Expected Code |
      |  STND001  |   SALE   | 1111 |   12   |   13   |  1000  |      000      |
      |  STND002  |   SALE   | 1129 |   12   |   09   |  1000  |      917      |
      |  STND003  |   SALE   | 1128 |   12   |   13   |  1000  |      912      |
      |  STND004  |   SALE   | 1137 |   12   |   13   |   100  |      \d\d\d   |
      |  STND104  |   SALE   | 1137 |   12   |   13   |   200  |      \d\d\d   |
      |  STND105a | AUTHONLY | 1145 |   12   |   13   |  1000  |      000      |
      |  STND105b |   CAPT   | 1145 |   12   |   13   |  1000  |      000      |
      |  STND106a | AUTHONLY | 1152 |   12   |   13   |  1000  |      000      |
      |  STND106b |   CAPT   | 1152 |   12   |   13   |   500  |      0\d\d    |
      |  STND107a | AUTHONLY | 1160 |   12   |   13   |  1100  |      000      |
      |  STND107b |   CAPT   | 1178 |   12   |   13   |  1100  |      0\d\d    |
      |  STND108a | AUTHONLY | 1186 |   12   |   13   |  1200  |      000      |
      |  STND108b |   CAPT   | 1186 |   12   |   13   |  1200  |      000      |
      |  STND108c |   CAPT   | 1186 |   12   |   13   |  1200  |      025      |
      |  STND109a | AUTHONLY | 1194 |   12   |   13   |  1305  |      005      |
      |  STND109b |   CAPT   | 1194 |   12   |   13   |  1305  |      025      |
