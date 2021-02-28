# Jspreadsheet spreadsheet
## Database integration

Persisting the spreadsheet data using a database.

Step 1 - Download this project to a local machine, with docker installed.

Step 2 - On the project root folder: % docker-compose up

Step 3 - In another terminal go to the root folder: % docker-compose exec php bash

Step 4 - On the PHP container terminal: % composer install

Step 5 - In another terminal go to the root folder: % docker-compose exec postgresql bash

// Now create your own tables

Step 6 - Edit your public/index.php to sync with one table.

Step 7 - http://localhost:8081<br><br>
