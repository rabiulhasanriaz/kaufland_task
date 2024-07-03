# Goal
* We would like to see a command-line program that should process a local XML file (feed.xml)
  and push the data of that XML file to a DB of your choice (e.g., SQLite)
  You are free to use any library or framework you need or feel comfortable with. You have a
  free choice of tools. Please use PHP!
# Specifications
* The program should be easily extendable, e.g., we could use different data storage to
  read data from or to push data to. This should be configurable.
* Errors should be written to a logfile
* The application should be tested. 

# Implement
# Used Framework and database
* "php": ">=8.1"
* Symfony 6.4
* Database: Mysql
* Using lampp/xampp for local environment.
* phpunit for testing
# Run the application
* `` symfony server:start ``
# Generate the migration and update the database schema
* ``` php bin/console make:migration ```
* `` php bin/console doctrine:migrations:migrate ``
# Command
`` php bin/console app:process-xml ``
Run this command will process xml file and store data into Mysql Database

# Test Coverage
* Generate Test Coverage Report in text & Html, use following command:
`` XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-text `` &
`` XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-html=coverage ``

# N.B: I have attach my "kaufland.sql" file, either you can import this with existing table or make new migration.

