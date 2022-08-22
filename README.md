**How to install**
====================
**MacOS**
====================
1. Make sure that you have git installed locally on your machine.
2. Open Terminal
3. git clone https://github.com/PGGrigorov/Exchange.git
4. cd into the project
5. Install composer: composer install
6. Install Node.js: npm install
7. Copy the .env file: cp .env.example .env
8. Generate encryption key: php artisan key:generate
9. Create an empty data base for the project. I used MySQLWorkbench
10. In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD
11. Migrate the database: php artisan migrate
12. Start the php server: php artisan serve
13. Go to localhost:8000


**Windows**
====================
1. Clone the project: git clone https://github.com/PGGrigorov/Exchange.git
2. Go to the folder application using cd command on your cmd or terminal
3. Run composer install on your cmd or terminal
4. Copy .env.example file to .env on the root folder:
5. In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD
By default, the username is root and you can leave the password field empty. (This is for Xampp)
By default, the username is root and password is also root. (This is for Lamp)
6. Run php artisan key:generate
7. Run php artisan migrate
8. Run php artisan serve
9. Go to localhost:8000


**Before you start**
====================
To make sure that the app is going to work without erros, you have to do the following steps:
1. go to /register and make an account. This will be your main admin account.
2. go to your mysql GUI and change 'is_admin' to '1'. This will make your account an admin. (Making some to admin is being possible only via the mysql GUI for security reasons).
3. go to your account page -> click "Admin Panel". This will take you to the admin panel.
4. click "Load API". This will load the rates api to the database.
5. exit the admin panel by clicking "Exit Admin Panel"

**Changes**
====================
1. Reworked the whole app from the ground up.
2. Cleared the clutter of code by simplifing the code to a minimum. 
3. Used the latest version of Laravel to make sure everything is up to date.

**Cuurently not working**
====================
The chart is currently not working. The issue is that when a chart ( no matter what api I use ) generates, the screan goes blank.
This is a WIP issue.