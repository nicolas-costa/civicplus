## PHP Project with FastRoute and Blade
This is a PHP project that uses FastRoute for routing and Blade for rendering views. The project also uses JavaScript and Composer.

### Built With
* PHP
* Composer
* JavaScript

### Prerequisites
* Docker and Docker Compose

### How to run the project
1. Ensure Docker and Docker Compose are installed on your machine.  
2. Clone the repository to your local machine using git clone.  
3. Navigate to the project folder.  
4. Run docker-compose up -d to start the containers.  
5. Run docker-compose exec php composer install to install the dependencies.
6. The project will be available at http://localhost:8080.  

### Project Structure
* index.php: Main file that sets up routing and execution of actions.
* src/Controllers/: Folder that contains the controllers.
* src/Transformers/: Folder that contains the transformers.
* src/DTOs/: Folder that contains the DTOs.
* src/Services: Houses the services.
* src/Views/: Folder that contains the views.
* src/Repositories: Folder that contains the repositories.
* .gitignore: File that specifies which files and folders should be ignored by Git.

### Notes
* The project does not include a .env file in the .gitignore to facilitate execution. However, in a production environment, it is recommended to add this file to the .gitignore and set up the appropriate environment variables.

### Some points of improvement
* Unit and integration tests.
* Error handling with custom exceptions.
* Logging.
* Better validation of input data.
* Custom php image with xdebug enabled in non-production environments.