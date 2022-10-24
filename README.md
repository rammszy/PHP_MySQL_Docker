# **Webserver Linked To Database Containerization**

The main goal of the project is the displaying of "hello world, (name) - retrieved from a database, on webserver landing page. This is done with the help of PHP (designed for the webserver), coupled with MySQL (for the database) that has been containerized with the help of docker-compose.

## **Prerequisites:**
1. [Docker and Docker Compose (Application containers engine).](https://www.docker.com/)
2. IDE, e.g. [Visual Studio Code.](https://code.visualstudio.com/)

## **Blocks of the Project:**

1. [Webserver](https://en.wikipedia.org/wiki/Web_server) [(PHP).](https://www.php.net/)
   *A popular general-purpose scripting language that is especially suited to web development. Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.* 
2. [Database](https://en.wikipedia.org/wiki/Database) [(MySQL).](https://www.mysql.com/)
   *MySQL is the world's most popular open source database. MySQL is a widely used relational database management system (RDBMS). MySQL is free and open-source. MySQL is ideal for both small and large applications.*
3. [Container (Docker).](https://www.docker.com/resources/what-container/)
   *A container is a standard unit of software that packages up code and all its dependencies so the application runs quickly and reliably from one computing environment to another.*

## **Folders and Files:**
Two (02) main folders **(PHP & Database)** and two (02) sub folders inside PHP **(src & MySQL)**.

- PHP Folder Files- Dockerfile, Docker-compose, index (inside **src**), Details (inside **MySQL**).
- Database Folder File - Dockerfile.

## **Project Build and Run - Step by Step Process** (Refer to the below how to **build** and **run** the project):

1.  Create/code the **index.py** file.
      Build on **.php**, where the webserver coding is done which displays the statement **hello world**, which in turn is connected to the database, thus selecting the cell , in this project as the **name** and displaying the statement as **hello world, (name)**.
    
    **Coding Instructions:**
    
    1. Details of database name, user name, password and table needs to be mentioned for the connection and authentication to happen.
    2. Specific commands need to be given for the selection of the table and cell details within the table. 

2.  [Create/code the **Dockerfile** **(Image for PHP)**.](https://docs.docker.com/engine/reference/builder/)
      *A Dockerfile is a text document that contains all the commands a user could call on the command line to assemble an image. Using docker build users can create an automated build that executes several command-line instructions in succession.*
    
    [**Coding Instructions:**](https://hub.docker.com/_/php)
    
    *The docker build command builds an image from a Dockerfile and a context. The build’s context is the set of files at a specified location PATH or URL. The PATH is a directory on your local filesystem.*
            
          FROM php:7.4-cli
          COPY . /usr/src/myapp
          WORKDIR /usr/src/myapp
          CMD [ "php", "./your-script.php" ]  

3.  [Run the code for the **Dockerfile** **(Image for PHP)**.](https://hub.docker.com/_/php)
       
           docker build -t my-php-app .     
           
4. [Create/code the **Dockerfile** **(Image for MySQL)**.](https://docs.docker.com/engine/reference/builder/)
      *A Dockerfile is a text document that contains all the commands a user could call on the command line to assemble an image. Using docker build users can create an automated build that executes several command-line instructions in succession.*
    
    [**Coding Instructions:**](https://hub.docker.com/_/mysql)
    
    *The docker build command builds an image from a Dockerfile and a context. The build’s context is the set of files at a specified location PATH or URL. The PATH is a directory on your local filesystem.*
            
          FROM php:8.0-apache
          RUN docker-php-ext-install mysqli

5.  [Create/code the **Docker-compose.yml** file.](https://docs.docker.com/compose/compose-file/)
     *The Compose file is a YAML file defining services, networks, and volumes for a Docker application. The Compose specification allows one to define a platform-agnostic container based application. Such an application is designed as a set of containers which have to both run together with adequate shared resources and communication channels.*
    
    **Coding Instructions:**   
 
    1. *Compose specification is a platform-neutral way to define multi-container applications.*
    2. *Compose Specification is extended to support an OPTIONAL build subsection on services.*
    3. *When service definition do include both Image attribute and a Build section, Compose implementation can’t guarantee a pulled image is strictly equivalent to building the same image from sources.*
    4. *The build element define configuration options that are applied by Compose implementations to build Docker image from source. build can be specified either as a string containing a path to the build context or a detailed structure.*
          
                services:
                          webapp:
                build: ./dir

6.  [Run the code for the **Docker-compose.yml** file.](https://docs.docker.com/engine/reference/commandline/compose_run/)

            docker-compose run      
            
7.  Access the MySQL database through by typing localhost:**port** assigned in the browser url box.
8.  [Create tables on the MySQL database.](https://www.ipower.com/help/article/creating-mysql-tables-in-phpmyadmin)
9.  [Export created table file from the MySQL database.](https://help.dreamhost.com/hc/en-us/articles/214395738-phpMyAdmin-How-to-backup-or-export-a-database-or-table)
10. [Stop and remove containers, networks of the **Docker-compose.yml**.](https://docs.docker.com/engine/reference/commandline/compose_down/)

            docker-compose down               
11.  Copy the exported file from MySQL and save it in the PHP Subfolder **MySQL**.
12.  Start the containers by [running the code for the **Docker-compose.yml** file.](https://docs.docker.com/engine/reference/commandline/compose_run/)

            docker-compose run    

13.  Access the webserver through typing localhost:**port** assigned in the browser url box to view **"hello world, (name).**

## **Docker Tips:**
   In this section are presented several Docker useful commands.

   1. To display all deployed containers, remember that functions are Docker containers, the IMAGE field is the function name and version, while the CONTAINER ID is the ID of the function. In this view is also possible to see the listening port for the function in the field PORTS, fun the command;
         
                docker ps -a
   
   2. If you get the error: **Fatal error: Uncaught Error: Call to undefined function mysqli_connect() in /var/www/html/index.php:3 Stack trace: #0 {main} thrown in /var/www/html/index.php on line 3**, then open the interactive terminal with your docker container that's running the www service and run the command;
   
                docker-php-ext-install mysqli && docker-php-ext-enable mysqli && apachectl restart

## [**Docker Security:**](https://docs.docker.com/engine/security/)

[**Risk and Mitigate:**](https://www.tigera.io/learn/guides/container-security-best-practices/docker-security/#:~:text=Security%20aspects%20include%20base%20images,for%20container%20orchestration%20at%20scale.)

1. **Unrestricted Traffic and Unsafe Communication:**
   - **Risk:** Some Docker versions allow all network traffic on the same host by default, which can result in unintentional exposure of data to the wrong containers.
   - **Mitigate:** Link the desired containers to restrict container access and reduce the attack surface, enabling only necessary and desired communication.

2. **Vulnerable and Malicious Container Images:**
   - **Risk:** Docker Hub is open to everyone, so you should make sure you trust the publisher when you deploy a new repo.
   - **Mitigate:** Avoid untested or untrusted builds to prevent the introduction of vulnerabilities and malicious code.

3. **Unrestricted Access:**
   - **Risk:** Attackers can often gain access to multiple containers once they’ve gained a foothold in the host.
   - **Mitigate:** Apply the principle of least privilege and eliminate root access where possible. 

4. **Host Kernel Vulnerabilities:**
   - **Risk:** The kernel is exposed to the host and all containers.
   - **Mitigate:** Ensure host operating systems are up to date and vigilantly apply security updates

5. **Breaking Out of Containers:**
   - **Risk:** While container breakouts are rare, they are not impossible.
   - **Mitigate:** Never grant root access on the host to a container process.

[**Best Practices:**](https://www.tigera.io/learn/guides/container-security-best-practices/docker-security/#:~:text=Security%20aspects%20include%20base%20images,for%20container%20orchestration%20at%20scale.)
1. **Avoid Root Permissions:** Docker containers don’t run as root by default, so you don’t have to change the default configuration, but you should avoid giving root permissions. 
2. **Use Secure Container Registries:** Avoid letting anyone download or upload container images from your registry.
3. **Limit Resource Usage:** Resource quotas help keep the Docker environment efficient by preventing a single container from consuming too many system resources.
4. **Scan Your Images:** Keep your Docker images secure with regular vulnerability scans.
5. **Build Your Networks and APIs for Security:** This communication allows containers to run properly but also requires proper monitoring and security policies.
6. **Docker Container Monitoring:** Container monitoring tools can help you gain visibility and achieve observability over containerized workloads.

## **Note:**
  1.  All the files used to build this project are saved in this Git repository.
  2. Once the container is made down, the data on MySQL database through localhost:**port** is lost, to fix this, once inside the database, [import](https://help.one.com/hc/en-us/articles/115005588189-How-do-I-import-a-database-to-phpMyAdmin-) the previously exported file to the database.
