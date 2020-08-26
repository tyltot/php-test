# General

This is a small PHP project intended to spin up an apache server with PHP running on it. There's a few test PHP routes, but the primary purpose was to demonstrate a Postgres connection. The assumption is that the server should be run via docker and the database is hosted on your local machine.

## Installation

1. Install docker
	* https://docs.docker.com/docker-for-mac/install/
	* Get stable version
	* Navigate to applications and click Docker.app to start
	* Allow prompts, enter password, etc.
	* Should see docker logo in the menu bar, (takes a while to start & fairly cpu intensive)
2. Download this repo, (if not already done) and navigate to it
3. Once docker is finished, you can execute the following command in 'Terminal' to startup the server
    * Start Terminal (generally Applications/Terminal.app)
    * Navigate to this directory (usually something like `cd ~/Workspaces/php-project`)
	* `docker-compose up --build --force-recreate && docker-compose down`
	* The above will spit out a lot of details, but should eventually get to something like:
```
Successfully built b99e192dd46f
Successfully tagged php-project_php-apache:latest
Creating php-project_php-apache_1 ... done
Attaching to php-project_php-apache_1
php-apache_1  | AH00558: apache2: Could not reliably determine the server's fully qualified domain name, using 172.25.0.2. Set the 'ServerName' directive globally to suppress this message
php-apache_1  | AH00558: apache2: Could not reliably determine the server's fully qualified domain name, using 172.25.0.2. Set the 'ServerName' directive globally to suppress this message
php-apache_1  | [Wed Aug 26 04:21:13.901794 2020] [mpm_prefork:notice] [pid 1] AH00163: Apache/2.4.38 (Debian) PHP/7.4.9 configured -- resuming normal operations
php-apache_1  | [Wed Aug 26 04:21:13.902063 2020] [core:notice] [pid 1] AH00094: Command line: 'apache2 -D FOREGROUND'
```
4. The server is now live @ http://localhost. Any changes made to the `.php` files in the `/html` directory will reflect in the browser after they are saved. Current available paths are:
	* http://localhost (this connects to the pg database and runs a basic query, corresponding to `html/index.php`)
	* http://localhost/hello.php (good ole hello world, corresponding to `html/hello.php`)
	* http://localhost/pg_connect.php (test the postgres connection, corresponding to `html/pg_connect.php`)
	* http://localhost/phpinfo.php (craps out the php info, corresponding to `html/phpinfo.php`)
5. After all is said and done, you should be able to `Ctl-C` to kill the server

## Misc
Helpful docker commands:
```
$ docker ps 
	> this shows all running processes in docker
$ docker kill <containerId>
	> kills a running containier
$ docker images
	> this shows all images in docker
$ docker rmi <imageId>
	> removes an image
```

Thanks to following links for getting this sorted out:
* https://www.centlinux.com/2020/03/configure-lamp-stack-in-docker-containers.html?m=1&fbclid=IwAR0821JqxyQSa6i29W2MpK-b8laKKpWiszaNo8MLGzfKpqVtCZJyIGGpv5c
* https://onesoftwaretester.wordpress.com/2018/05/22/docker-a-dockerfile-to-fix-the-call-to-undefined-function-pg_connect-error-when-using-php-with-postgres/
* https://stackoverflow.com/questions/31249112/allow-docker-container-to-connect-to-a-local-host-postgres-database?fbclid=IwAR3PYO_nb-Dx4jA4TmO42OwOAEtueJRlahFAHXDBHVw5nRqqmk2w6e5nXSE
* https://kb.objectrocket.com/postgresql/connect-to-a-postgresql-database-using-php-and-pg_connect-747