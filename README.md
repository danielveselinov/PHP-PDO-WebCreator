**NOTE:** _this project is using fancy url (PATH/company/generated-id/alert) / (PATH/start) and etc.._

## To run this project first you need to set up a few things..

#### First of all you need to create database, then from `src/database/` you need to run the SQL queries into your created database.
##### After settign up the database, open constants.php and fill the PATH with your location of the project, fill DB_NAME with the same name as you created the database, then fill the DB_USERNAME and DB_PASSWORD with your database credentials. 

For example:

```
define("PATH", "http://localhost/projectPath");
define("DB_NAME", "database_name");
define("DB_USERNAME", "guest");
define("DB_PASSWORD", "guest123");
```

### File with with extension .txt will be created in main folder, where all the errors will be stored.
