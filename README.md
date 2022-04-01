## 16 - Challenge - PHP Forms

**NOTE:** _this project is using fancy url (PATH/company/generated-id/alert) / (PATH/start) and etc.._

## To run this challenge first you need to set up a few things..

#### First of all you need to create database, then from `src/database/SQL` you need to run the SQL queries into your created database.
##### After settign up the database, open constants.php and fill the PATH with your location of the project, fill DB_NAME with the same name as you created the database, then fill the DB_USERNAME and DB_PASSWORD with your database credentials. 

### **IMPORTANT:** 
If you're using *Windows* you need to change your Router (in any file) to start with segment (3):
`Router::get(2)` needs to be changed into `Router::get(3)` and so on. Also old segment 3 becomes 4 and so on in any file, you need to do that to execute the code successfully..

If you're using *Ubuntu* you don't need to change anything, or if you're facing problem (only 404 page loads) then you also need to change the Router like in Windows..

For example:

```
define("PATH", "http://localhost/brainster_challenges/");
define("DB_NAME", "brainster_challenge");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
```

### File with with extension .txt will be created in main folder, where all the errors will be stored.
