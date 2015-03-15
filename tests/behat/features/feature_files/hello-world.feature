Feature: Getting a controller from the DI container
  In order to keep my application well-architected
  As a developer building an API
  I want my controller services to come out of the DI container with all necessary dependencies on them

  @webserver
  Scenario: Calling 'hello world' service
    When I visit '/controllers-as-a-service/'
    Then I should get 'Controller which can only be got from Service Container works.'
