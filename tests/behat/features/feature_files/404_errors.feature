Feature: Getting a 404 error
  In order to know when something doesn't exist
  As a user querying an API
  I want to get a 404 error when appropriate

  @wip
  Scenario: Querying a service that doesn't exist
    When I send a GET request to '/service-that-doesnt-exist/'
    Then I should get status code '404'
