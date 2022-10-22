# **Webserver Linked To Database Containerization**

The main goal of the project is the displaying of "hello world, (name) - reretrieved from a database, on webserver landing page. This is done with the help of PHP (designed for the webserver), coupled with MySQL (for the database) that has been containerized with the help of docker-compose.

## **Prerequisites:**
1. Docker and Docker Compose (Application containers engine).
2. IDE, e.g. Visual Studio Code.

## **Blocks of the Project:**

1. Webserver (PHP).
2. Database (MySQL).
3. Container (Docker).

## **Folders and Files:**

  **Folders** - Two (02) main folders **(PHP & Database)** and two (02) sub folders inside PHP **(src & MySQL)**.

- PHP Folder Files- Dockerfile, Docker-compose, index (inside **src**), Details (inside **MySQL**).
- Database Folder File - Dockerfile.

## **Building of the Project:**

  **1. Webserver (PHP):**
  - **Index File:**
    Build on **.php**, where the webserver coding is done which displays the statement **hello world**, which in turn is connected to the database, thus selecting the cell , in this project as the **name** and displaying the statement as **hello world, (name)**.
    
    **Coding Instructions:**
    
    1. Details of database name, user name, password and table needs to be mentioned for the connection and authentication to happen.
    2. Specific commends to be be given for the selection of the table and cell details within the table.
    
  - **[Dockerfile:](https://docs.docker.com/engine/reference/builder/)**
    *A Dockerfile is a text document that contains all the commands a user could call on the command line to assemble an image. Using docker build users can create an automated build that executes several command-line instructions in succession.*
    
    **Coding Instructions:**
    
    *The docker build command builds an image from a Dockerfile and a context. The build’s context is the set of files at a specified location PATH or URL. The PATH is a directory on your local filesystem.*
    
    1. *Use the -f flag with docker build to point to a Dockerfile anywhere in your file system and specify a repository and tag at which to save the new image if the build succeeds:.*
    
                docker build -t shykes/myapp .
                
 - **[Docker-Compose File:](https://docs.docker.com/compose/compose-file/)**
 *The Compose file is a YAML file defining services, networks, and volumes for a Docker application. The Compose specification allows one to define a platform-agnostic container based application. Such an application is designed as a set of containers which have to both run together with adequate shared resources and communication channels.*
    
    **Coding Instructions:**   
 
    1. *Compose specification is a platform-neutral way to define multi-container applications.*
    2. *Compose Specification is extended to support an OPTIONAL build subsection on services.*
    3. *When service definition do include both Image attribute and a Build section, Compose implementation can’t guarantee a pulled image is strictly equivalent to building the same image from sources.*
    4. *The build element define configuration options that are applied by Compose implementations to build Docker image from source. build can be specified either as a string containing a path to the build context or a detailed structure.*
          
                services:
                          webapp:
                build: ./dir
    
    
    
    

    
    
    
