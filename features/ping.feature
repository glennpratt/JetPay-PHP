Feature: Ping
  In order to test connectivity
  As a client
  I need to be able to ping JetPay.

  Scenario: Pinging JetPay test gateway
    Given I am using "https://test1.jetpay.com/jetpay"
    And I have a TransactionID of "010327153017T10052"
    When I create a ping request
    And I execute the request
    Then I should get
      """
      <JetPayResponse><TransactionID>010327153017T10052</TransactionID>
      <ActionCode>000</ActionCode>
      <ResponseText>PING</ResponseText>
      </JetPayResponse>
      """
