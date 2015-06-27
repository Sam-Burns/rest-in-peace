Feature: Getting an appropriate status code with the response
  In order to know whether my request worked or not
  As a developer building an API
  I want my HTTP responses to have configurable status codes

  @webserver
  Scenario: Getting a 404
    When I visit '/resource-that-doesnt-exist/'
    Then I should get 'Not found'
    And the status code of the HTTP response should be 404
