Feature: Saying hello world
  In order to test that my application works
  As a developer building an API
  I want to

  @webserver
  Scenario: Calling 'hello world' service
    When I visit '/hello-world/'
    Then I should get 'hello world'
