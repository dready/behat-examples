Feature: Example 3 - API Example
  Showcase for rest interface tests

  Background:
    Given I set header "Accept" with value "application/json, text/plain, */*"
    And I set header "Content-Type" with value "application/json;charset=UTF-8"

  @example3 @api
  Scenario: I can see the information of the meetup event
    When I send a GET request to "/2/event/159181122?key=YOURAPIKEY&sign=true"
    Then the response code should be 200
    And response should contain "Behat in Action"
