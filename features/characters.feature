Feature: Characters
  In order to keep the people entertained,
  As a magic land ruler,
  I need a monsters and superheroes.

  A character must have:
  - type
  - health
  - strength
  - defense
  - speed
  - luck

  The current super hero has developed two skills so far:
  - rapid strike
  Strike twice while it’s his turn to attack;
  there’s a 10% chance he’ll use this skill every time he attacks

  - magic shield
  Takes only half of the usual damage when an enemy attacks;
  there’s a 20% change he’ll use this skill every time he defends

  Scenario: Show a superhero
    Given I enter Emagia
    Then I should see "Orderus" near "Superheroes"

  Scenario: Read a superhero story
    Given there is no superhero in the forrest
    When I want to read "Orderus" story
    Then I should see:
      | property | level_min | level_max |
      | health   | 70        | 100       |
      | strength | 70        | 80        |
      | defence  | 45        | 55        |
      | speed    | 40        | 50        |
      | luck     | 10        | 30        |