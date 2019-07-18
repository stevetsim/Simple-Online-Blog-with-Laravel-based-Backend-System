# Online Blog with backend system
It is a simple online blog written in **Laravel** that include all basic function as a blog, such as login, blog management as well as comment management function

---

## Installation
1. Run ``` Composer update ``` command in root directory
2. Modify the database infomation at ```.env``` file

        DB_HOST = your DB host
        DB_PORT = your DB Port
        DB_DATABASE = DB Schema Name
        DB_USERNAME = your login name
        DB_PASSWORD = your login password

3. Run ``` php artisan migrate ``` to complete the database migration process
4. ```CD``` into public & run ```php -S 0.0.0.0:80``` to host a local web server
5. The URL of public site should be ```127.0.0.1``` & the admin panel should be ```127.0.0.1/admin```
6. Have fun and Enjoy the system

