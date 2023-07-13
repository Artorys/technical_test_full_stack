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
    - #### 1.2 Install the dependencies before starting the api container, as they will be Used for its construction.
        ```
        docker run --rm -v $(pwd):/app composer install
        ```
    - #### 1.3 Install the images and up the containers.
        ```
        vendor/bin/sail up
        ```
    - #### 1.4 Run and apply the migrations for postgres database.
        ```
        docker exec -it api-back-end_api-1 php artisan migrate
        ```
