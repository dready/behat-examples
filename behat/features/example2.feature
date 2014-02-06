Feature: Example 2 - selenium example
  Showcase for javascript tests

  @example2 @javascript @selenium
  Scenario: I can load the Plunker website which needs javascript
    Given I am on "http://plnkr.co/"
    When I wait 5 seconds
    Then I should see "Real-time code collaboration"
