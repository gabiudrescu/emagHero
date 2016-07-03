Feature: Entering the ever-green forests of Emagia
  In order to gain my token of goodwill,
  As a super hero,
  I need to enter the ever-green forests and fight monsters.

  Background:
    Given there is a super hero called "Orderus" with the following properties:
      | property | level_min | level_max |
      | health   | 70        | 100       |
      | strength | 70        | 80        |
      | defence  | 45        | 55        |
      | speed    | 40        | 50        |
      | luck     | 10        | 30        |
    And "Orderus" has the following skills:
      | skill | description |
    And there is a monster called "Returus" with the following properties:
      | property | level_min | level_max |
      | health   | 60        | 90        |
      | strength | 60        | 90        |
      | defence  | 40        | 60        |
      | speed    | 40        | 60        |
      | luck     | 25        | 40        |

  Scenario: The super hero enters the ever-green forests
    Given I am "Orderus", the superhero
    When I enter the forests
    Then I should meet a "Returus" monster

  Scenario: Engaging in a fight with a slower monster will allow the super hero to have the first hit
    Given I am "Orderus", the superhero
    And my current mood is:
      | property | level |
      | health   | 70    |
      | strength | 70    |
      | defence  | 45    |
      | speed    | 50    |
      | luck     | 10    |
    And I enter the forest
    And I met "Returus"
    And his current mood is:
      | property | level |
      | health   | 60    |
      | strength | 60    |
      | defence  | 40    |
      | speed    | 40    |
      | luck     | 25    |
    When we engage in a fight
    Then the first hit should be from "Orderus"
    # because it has a better speed than Returus
    And it should do a damage of "30"
    And "Returus" should now have "health" at level "30"
    And I should be available for another battle