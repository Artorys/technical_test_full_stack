# technical_test_full_stack laravel and VueJS

## Prerequisites

Make sure you have the following prerequisites installed on your system:

- [GIT](https://git-scm.com/) Necessary for clone the project.
- [DOCKER DESKTOP](https://docs.docker.com/compose/install/) Necessary for running the project.

## Installation

### Follow the steps below to install the project:

 - ### 1. in a folder of your choice:
    - #### 1.1 Clone the github repository Using a password-protected SSH key:
        ```
        git clone git@github.com:Artorys/technical_test_full_stack.git
        ```
- ### 2. In the root directory, run the follow commands:
    - #### 1.1 Enter in docker compose dir.
        ```
        cd back-end/api/
        ```
    - #### 1.2 Create the .env file, copy and paste all content of the .env.example in the .ebv and set your environments variables to connect to database in .env file
        ```
        DB_CONNECTION=pgsql
        DB_HOST=pgsql
        DB_PORT=5432
        DB_DATABASE=DB_NAME
        DB_USERNAME=DB_USERNAME
        DB_PASSWORD=DB_PASSWORD
        ```
    - #### 1.3 Install the dependencies before starting the api container, as they will be used for its construction.
        ```
        docker run --rm -v $(pwd):/app composer install
        ```
    - #### 1.4 Install the images and up the containers.
        ```
        vendor/bin/sail up
        ```
        - #### 1.4.1 - if all goes well you will see something like this in your terminal.
            - ##### Front End:
                ```
                    api-front-end_app-1  | 
                    api-front-end_app-1  |   VITE v4.4.3  ready in 1190 ms
                    api-front-end_app-1  | 
                    api-front-end_app-1  | 
                    api-front-end_app-1  |   ➜  Local:   http://localhost:5173/
                    api-front-end_app-1  |   ➜  Network: http://172.21.0.2:5173/
                ```
            - ##### Back End:
                ```
                    api-laravel.test-1   |    INFO  Server running on [http://0.0.0.0:80].  
                    api-laravel.test-1   | 
                    api-laravel.test-1   | 
                    api-laravel.test-1   |   Press Ctrl+C to stop the server
                    api-laravel.test-1   | 
                    api-laravel.test-1   | 
                    api-laravel.test-1   | 2023-07-17 03:51:42,663 INFO success: php entered RUNNING state, process has stayed up for > than 1 seconds (startsecs)
                ```
    - #### 1.5 - During the execution of your containers run and apply the migrations for postgres database.
        ```
        vendor/bin/sail php artisan migrate:fresh
        ```
        - #### 1.5.1 - if all goes well you will see something like this in your terminal.
            ```
            Dropping all tables .............................................................................................. 48ms DONE

            INFO  Preparing database.  

            Creating migration table ......................................................................................... 11ms DONE

            INFO  Running migrations.  

            2019_12_14_000001_create_personal_access_tokens_table ............................................................ 13ms DONE
            2023_07_13_173206_create_appliances_table ......................................................................... 6ms DONE
            ```
## The project can already be used.

## Execution:
 - ## Back End:
    
    - ### developed with [laravel](https://laravel.com/), framework of [PHP](https://www.php.net/).
    - ### the access base URL to connect with back end application is:
        ```
        localhost:80
        ```
    - #### Base Route: /api/appliance
    - #### Content-type: JSON
    - ### The backend consists of a RESTful API, and aims to be a CRUD with the following routes and the following returns:

        - #### GET - List all appliances
            - ##### Route:  /api/appliance/

            - ##### The return of the route:
                - GET /api/appliance/
                ```
                {
                "data": [
                    {
                        "id": 1,
                        "name": "Refrigerator",
                        "description": "Frost free",
                        "brand": "LG",
                        "voltage": "220v"
                    },
                ]
                "links": {
                "first": "http:\/\/localhost\/api\/appliance?page=1",
                "last": "http:\/\/localhost\/api\/appliance?page=2",
                "prev": null,
                "next": "http:\/\/localhost\/api\/appliance?page=2"
                },
                "meta": {
                "current_page": 1,
                "from": 1,
                "last_page": 2,
                "links": [
                    {
                        "url": null,
                        "label": "&laquo; Previous",
                        "active": false
                    },
                    {
                        "url": "http:\/\/localhost\/api\/appliance?page=1",
                        "label": "1",
                        "active": true
                    },
                    {
                        "url": "http:\/\/localhost\/api\/appliance?page=2",
                        "label": "2",
                        "active": false
                    },
                    {
                        "url": "http:\/\/localhost\/api\/appliance?page=2",
                        "label": "Next &raquo;",
                        "active": false
                    }
                ],
                "path": "http:\/\/localhost\/api\/appliance",
                "per_page": 15,
                "to": 15,
                "total": 17
                }
                }
                ```
                - Status code: 200

        - #### GET - List specify appliance
            - ##### Route:  /api/appliance/{id}

            - #### params: 
                - id - entity id to be fetched from the database, integer type - Example: /api/appliance/1
            - ##### The return of the route:

                - GET /api/appliance/1
                ```
                {
                "id": 1,
                "name": "Refrigerator",
                "description": "Frost free",
                "brand": "LG",
                "voltage": "220v"
                }
                ```
                - Status code: 200
        - #### POST - Create the appliance
            - ##### Route:  /api/appliance/
            
            - #### Body:

                - POST /api/appliance/
                ```
                {
                "name": "Refrigerator",
                "description": "Frost free",
                "brand": "LG",
                "voltage": "220v"
                }
                ```
            - ##### The return of the route:

                - POST /api/appliance/
                ```
                {
                "name": "Refrigerator",
                "description": "Frost free",
                "brand": "LG",
                "voltage": "220v"
                "id": 1,
                }
                ```
                - Status code: 201

        - #### PUT - Update
            - ##### Route:  /api/appliance/{id}
            - #### params: 
                - id - entity id to be fetched from the database, integer type - Example: /api/appliance/1
            - #### Body:

                - PUT /api/appliance/1
                ```
                {
                "name": "Microwave",
                "description": "Efficient",
                "brand": "LG",
                "voltage": "110v"
                }
                ```
            - ##### The return of the route:

                - PUT /api/appliance/1
                ```
                {
                "id" : 1,
                "name": "Microwave",
                "description": "Efficient",
                "brand": "LG",
                "voltage": "110v"
                }
                ```
                - Status code: 200
        - #### DELETE - Delete the appliance
            - ##### Route:  /api/appliance/{id}
            - #### params: 
                - id - entity id to be fetched from the database, integer type - Example: /api/appliance/1
            - #### Body:

                - No body content

                - DELETE /api/appliance/1
            - ##### The return of the route:

                - No body content

                - Status code: 204




 - ## Front End
    - ### developed with [VueJS](https://vuejs.org/) and [Typescript](https://www.typescriptlang.org/).
    - ### the access front end application and go to:
        ```
        localhost:5173
        ```
    - #### Base Route: /
    - ### The front end was designed to be a minimalist interface that uses CRUD to manage your appliances.
    - ### how is it used?
    - #### By accessing the base link of the front end application you will be on the lading page:
     ![img](https://live.staticflickr.com/65535/53051653219_00a45ba4b0_b.jpg)

    - #### Click on let's go and access the home page.
    - #### On the home page you can create, update and delete an appliance.
     ![img](https://live.staticflickr.com/65535/53051654484_6d00946642_b.jpg)

    - #### we don't have any appliances to edit or delete, let's create so we can interact.
    - #### click register appliances to create your appliance and display a form.
     ![img](https://live.staticflickr.com/65535/53051465776_66f13e88a9_b.jpg)

    - #### Once created, you can update and delete it, have fun!
     ![img](https://live.staticflickr.com/65535/53051852740_a2f37be3c0_b.jpg)
    
