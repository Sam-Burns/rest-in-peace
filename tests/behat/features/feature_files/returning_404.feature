Feature: Receiving a 404
  In order to understand when a URL is not available
  As a developer writing API consumer code
  I want to get a 404 result when appropriate

  @webserver
  Scenario: Hitting a URL which doesn't exist
    When I visit '/url-not-in-config-file/'
    Then I should get a response containing 'not found'
    And the response status code should have been '404'
