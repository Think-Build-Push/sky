* Requirements
	* PHP 8.3
	* MySQL 8.0.x/MariaDB 11.2.x
	* Apache 2.4 with mod_rewrite enabled or Nginx 1.24.x
* Install packages and flare submodules
	* composer install
	* Flares are only needed if you want to use the admin portal or if you want to use them in _tpl outputs
	* git submodule update --init --recursive # This will update flares in both web roots
* Database
	* Create database
	* Create user
	* Grant user access to database
	* Set password for user
	* Copy phinx.example.php and rename it to phinx.php, then edit it to match your database settings
		* Set collation to utf8mb4_unicode_520_nopad_ci
    	* Set charset to utf8_mb4
		* Set port to 3306
		* Set host to [your_db_host]
		* Set name to [your_db_name]
		* Set user to [your_db_user]
		* Set pass to [your_db_password]
	* Run vendor/bin/phinx migrate
	* Run vendor/bin/phinx seed:run
* Webserver
	* If you want to use the admin portal, you need to setup a vhost for sky/_core/_admin/web/
	* Create a separate vhost for sky/web/
	* An example vhost files for Apache and Nginx are in conf/http
	* Make sure your webserver user can create files in the project directories (for database files and auto_create files)
* Accessing the application
	* A default _co is configured when you run the seeds. Its subdomain is `sky`
	* Add `product_name`, `app_domain` and `system_from_email` in the `_setting` table
	* Admin Portal
		* Creating a unique domain for the admin portal is recommended. This can be two separate domains like sky.skyadmin.localhost or a nested subdomain such as sky.admin.localhost. 
		* You can access the admin portal at http://sky.[your_admin_domain_or_localhost]
	* Application
		* You can access the application at http://sky.[your_domain_or_localhost]/
	* Default superadmin login
		* Username: default@admin
		* Password: test
	* Logging
		* Set LOG_LEVEL in web/index.php and _core/_admin/web/index.php to any level allowable by Monolog, default is `error`. Change to `debug` to get more inforrmation in the logs directory.
		* Logs are stored in the log/ directory.
		* Each controller and object output their log to separate files.

Enjoy!
