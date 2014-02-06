Feature: Example 1 - default example
  I can have a Description here that can be
  as long as
  three lines

  @example1 @google
  Scenario: I can find the PHP Meetup Site in Google
    Given I am on "http://www.google.com"
    When I fill in "q" with "Vienna PHP Meetup"
    And I press "Google-Suche"
    Then I should see "The Vienna PHP User Group is a usergroup which tries to gather"
