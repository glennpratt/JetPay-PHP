@certification
Feature: Standard Certification Tests
  In order to be approved for JetPay usage
  As a client
  I need to make several different test transactions.

  Scenario Outline: Sale 1-3 Transaction Tests
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
      | Test Case | Type     | PAN  | Exp MO | Exp YR | Amount | Expected Code |
      | STND001   | SALE     | 1111 | 12     | 13     | 1000   | 000           |
      | STND002   | SALE     | 1129 | 12     | 09     | 1000   | 917           |
      | STND003   | SALE     | 1128 | 12     | 13     | 1000   | 912           |

  @overkill
  Scenario Outline: Sale 4-104 Transaction Tests
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
      | Test Case | Type     | PAN  | Exp MO | Exp YR | Amount | Expected Code |
      | STND004   | SALE     | 1137 | 12     | 13     | 100    | \d\d\d        |
      | STND005   | SALE     | 1137 | 12     | 13     | 101    | \d\d\d        |
      | STND006   | SALE     | 1137 | 12     | 13     | 102    | \d\d\d        |
      | STND007   | SALE     | 1137 | 12     | 13     | 103    | \d\d\d        |
      | STND008   | SALE     | 1137 | 12     | 13     | 104    | \d\d\d        |
      | STND009   | SALE     | 1137 | 12     | 13     | 105    | \d\d\d        |
      | STND010   | SALE     | 1137 | 12     | 13     | 106    | \d\d\d        |
      | STND011   | SALE     | 1137 | 12     | 13     | 107    | \d\d\d        |
      | STND012   | SALE     | 1137 | 12     | 13     | 108    | \d\d\d        |
      | STND013   | SALE     | 1137 | 12     | 13     | 109    | \d\d\d        |
      | STND014   | SALE     | 1137 | 12     | 13     | 110    | \d\d\d        |
      | STND015   | SALE     | 1137 | 12     | 13     | 111    | \d\d\d        |
      | STND016   | SALE     | 1137 | 12     | 13     | 112    | \d\d\d        |
      | STND017   | SALE     | 1137 | 12     | 13     | 113    | \d\d\d        |
      | STND018   | SALE     | 1137 | 12     | 13     | 114    | \d\d\d        |
      | STND019   | SALE     | 1137 | 12     | 13     | 115    | \d\d\d        |
      | STND020   | SALE     | 1137 | 12     | 13     | 116    | \d\d\d        |
      | STND021   | SALE     | 1137 | 12     | 13     | 117    | \d\d\d        |
      | STND022   | SALE     | 1137 | 12     | 13     | 118    | \d\d\d        |
      | STND023   | SALE     | 1137 | 12     | 13     | 119    | \d\d\d        |
      | STND024   | SALE     | 1137 | 12     | 13     | 120    | \d\d\d        |
      | STND025   | SALE     | 1137 | 12     | 13     | 121    | \d\d\d        |
      | STND026   | SALE     | 1137 | 12     | 13     | 122    | \d\d\d        |
      | STND027   | SALE     | 1137 | 12     | 13     | 123    | \d\d\d        |
      | STND028   | SALE     | 1137 | 12     | 13     | 124    | \d\d\d        |
      | STND029   | SALE     | 1137 | 12     | 13     | 125    | \d\d\d        |
      | STND030   | SALE     | 1137 | 12     | 13     | 126    | \d\d\d        |
      | STND031   | SALE     | 1137 | 12     | 13     | 127    | \d\d\d        |
      | STND032   | SALE     | 1137 | 12     | 13     | 128    | \d\d\d        |
      | STND033   | SALE     | 1137 | 12     | 13     | 129    | \d\d\d        |
      | STND034   | SALE     | 1137 | 12     | 13     | 130    | \d\d\d        |
      | STND035   | SALE     | 1137 | 12     | 13     | 131    | \d\d\d        |
      | STND036   | SALE     | 1137 | 12     | 13     | 132    | \d\d\d        |
      | STND037   | SALE     | 1137 | 12     | 13     | 133    | \d\d\d        |
      | STND038   | SALE     | 1137 | 12     | 13     | 134    | \d\d\d        |
      | STND039   | SALE     | 1137 | 12     | 13     | 135    | \d\d\d        |
      | STND040   | SALE     | 1137 | 12     | 13     | 136    | \d\d\d        |
      | STND041   | SALE     | 1137 | 12     | 13     | 137    | \d\d\d        |
      | STND042   | SALE     | 1137 | 12     | 13     | 138    | \d\d\d        |
      | STND043   | SALE     | 1137 | 12     | 13     | 139    | \d\d\d        |
      | STND044   | SALE     | 1137 | 12     | 13     | 140    | \d\d\d        |
      | STND045   | SALE     | 1137 | 12     | 13     | 141    | \d\d\d        |
      | STND046   | SALE     | 1137 | 12     | 13     | 142    | \d\d\d        |
      | STND047   | SALE     | 1137 | 12     | 13     | 143    | \d\d\d        |
      | STND048   | SALE     | 1137 | 12     | 13     | 144    | \d\d\d        |
      | STND049   | SALE     | 1137 | 12     | 13     | 145    | \d\d\d        |
      | STND050   | SALE     | 1137 | 12     | 13     | 146    | \d\d\d        |
      | STND051   | SALE     | 1137 | 12     | 13     | 147    | \d\d\d        |
      | STND052   | SALE     | 1137 | 12     | 13     | 148    | \d\d\d        |
      | STND053   | SALE     | 1137 | 12     | 13     | 149    | \d\d\d        |
      | STND054   | SALE     | 1137 | 12     | 13     | 150    | \d\d\d        |
      | STND055   | SALE     | 1137 | 12     | 13     | 151    | \d\d\d        |
      | STND056   | SALE     | 1137 | 12     | 13     | 152    | \d\d\d        |
      | STND057   | SALE     | 1137 | 12     | 13     | 153    | \d\d\d        |
      | STND058   | SALE     | 1137 | 12     | 13     | 154    | \d\d\d        |
      | STND059   | SALE     | 1137 | 12     | 13     | 155    | \d\d\d        |
      | STND060   | SALE     | 1137 | 12     | 13     | 156    | \d\d\d        |
      | STND061   | SALE     | 1137 | 12     | 13     | 157    | \d\d\d        |
      | STND062   | SALE     | 1137 | 12     | 13     | 158    | \d\d\d        |
      | STND063   | SALE     | 1137 | 12     | 13     | 159    | \d\d\d        |
      | STND064   | SALE     | 1137 | 12     | 13     | 160    | \d\d\d        |
      | STND065   | SALE     | 1137 | 12     | 13     | 161    | \d\d\d        |
      | STND066   | SALE     | 1137 | 12     | 13     | 162    | \d\d\d        |
      | STND067   | SALE     | 1137 | 12     | 13     | 163    | \d\d\d        |
      | STND068   | SALE     | 1137 | 12     | 13     | 164    | \d\d\d        |
      | STND069   | SALE     | 1137 | 12     | 13     | 165    | \d\d\d        |
      | STND070   | SALE     | 1137 | 12     | 13     | 166    | \d\d\d        |
      | STND071   | SALE     | 1137 | 12     | 13     | 167    | \d\d\d        |
      | STND072   | SALE     | 1137 | 12     | 13     | 168    | \d\d\d        |
      | STND073   | SALE     | 1137 | 12     | 13     | 169    | \d\d\d        |
      | STND074   | SALE     | 1137 | 12     | 13     | 170    | \d\d\d        |
      | STND075   | SALE     | 1137 | 12     | 13     | 171    | \d\d\d        |
      | STND076   | SALE     | 1137 | 12     | 13     | 172    | \d\d\d        |
      | STND077   | SALE     | 1137 | 12     | 13     | 173    | \d\d\d        |
      | STND078   | SALE     | 1137 | 12     | 13     | 174    | \d\d\d        |
      | STND079   | SALE     | 1137 | 12     | 13     | 175    | \d\d\d        |
      | STND080   | SALE     | 1137 | 12     | 13     | 176    | \d\d\d        |
      | STND081   | SALE     | 1137 | 12     | 13     | 177    | \d\d\d        |
      | STND082   | SALE     | 1137 | 12     | 13     | 178    | \d\d\d        |
      | STND083   | SALE     | 1137 | 12     | 13     | 179    | \d\d\d        |
      | STND084   | SALE     | 1137 | 12     | 13     | 180    | \d\d\d        |
      | STND085   | SALE     | 1137 | 12     | 13     | 181    | \d\d\d        |
      | STND086   | SALE     | 1137 | 12     | 13     | 182    | \d\d\d        |
      | STND087   | SALE     | 1137 | 12     | 13     | 183    | \d\d\d        |
      | STND088   | SALE     | 1137 | 12     | 13     | 184    | \d\d\d        |
      | STND089   | SALE     | 1137 | 12     | 13     | 185    | \d\d\d        |
      | STND090   | SALE     | 1137 | 12     | 13     | 186    | \d\d\d        |
      | STND091   | SALE     | 1137 | 12     | 13     | 187    | \d\d\d        |
      | STND092   | SALE     | 1137 | 12     | 13     | 188    | \d\d\d        |
      | STND093   | SALE     | 1137 | 12     | 13     | 189    | \d\d\d        |
      | STND094   | SALE     | 1137 | 12     | 13     | 190    | \d\d\d        |
      | STND095   | SALE     | 1137 | 12     | 13     | 191    | \d\d\d        |
      | STND096   | SALE     | 1137 | 12     | 13     | 192    | \d\d\d        |
      | STND097   | SALE     | 1137 | 12     | 13     | 193    | \d\d\d        |
      | STND098   | SALE     | 1137 | 12     | 13     | 194    | \d\d\d        |
      | STND099   | SALE     | 1137 | 12     | 13     | 195    | \d\d\d        |
      | STND100   | SALE     | 1137 | 12     | 13     | 196    | \d\d\d        |
      | STND101   | SALE     | 1137 | 12     | 13     | 197    | \d\d\d        |
      | STND102   | SALE     | 1137 | 12     | 13     | 198    | \d\d\d        |
      | STND103   | SALE     | 1137 | 12     | 13     | 199    | \d\d\d        |
      | STND104   | SALE     | 1137 | 12     | 13     | 200    | \d\d\d        |

  Scenario Outline: Sale 105-109 Transaction Tests
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
      | Test Case | Type     | PAN  | Exp MO | Exp YR | Amount | Expected Code |
      | STND105a  | AUTHONLY | 1145 | 12     | 13     | 1000   | 000           |
      | STND105b  | CAPT     | 1145 | 12     | 13     | 1000   | 000           |
      | STND106a  | AUTHONLY | 1152 | 12     | 13     | 1000   | 000           |
      | STND106b  | CAPT     | 1152 | 12     | 13     | 500    | 0\d\d         |
      | STND107a  | AUTHONLY | 1160 | 12     | 13     | 1100   | 000           |
      | STND107b  | CAPT     | 1178 | 12     | 13     | 1100   | 0\d\d         |
      | STND108a  | AUTHONLY | 1186 | 12     | 13     | 1200   | 000           |
      | STND108b  | CAPT     | 1186 | 12     | 13     | 1200   | 000           |
      | STND108c  | CAPT     | 1186 | 12     | 13     | 1200   | 025           |
      | STND109a  | AUTHONLY | 1194 | 12     | 13     | 1305   | 005           |
      | STND109b  | CAPT     | 1194 | 12     | 13     | 1305   | 025           |
