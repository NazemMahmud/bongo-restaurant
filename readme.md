# Building Restaurant API and corresponding test cases

I have developed this using Laravel 5.8 and MySQL.

### Prerequisites
To run this, you need to install,

* Git.
* PHP.
* Composer.
* Laravel CLI.
* A webserver ( I have used Apache).

### Install
Clone the git repository on your computer

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to update the composer from the project directory. 

```
$ composer update
```

### Setup

- Generate the application key

  ```$ php artisan key:generate```
  
- In `.env` file, database configuration is given. Create the database. You may take the database name from DB_DATABASE value. Or, you may modify it as your own

- Migrate the application

  ```$ php artisan migrate```

- I have provided the sql file for restaurants table data (.sql). Import that data into restaurants table


### Run the application

  ```$ php artisan serve```
  
## API CHECK
- You can check the API in postman. I have used Laravel resource API. API route Lists are in ```routes\api.php``` files. 
- For postman, APIs will be look like this: 
  1. http://127.0.0.1:8000/api/restaurant-list to get all restaurants order by opening state default.
  2. http://127.0.0.1:8000/api/search-restaurants?searchKey=king to search restaurant by restaurant name
  3. http://127.0.0.1:8000/api/sort-restaurants?sortBy=ratingAverage&orderby=asc to sort restaurant based on column in restaurant table. If you provide empty value for **orderBy** paramter, it will sort in descending order by default.
- Corresponding Controller, Model and Resources files are in ```app\Http\Controllers```, ```app\Http``` , ```app\Http\Resources``` directory respectively. You can check there how this API works. Necessary comments are added above the corresponding methods


 

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Unit Test

- I have added test cases for unit test in ```tests\Unit\RestaurantTest.php``` file. To check, this at first create a sqlite database file,
    
    ```$ touch database/test.sqlite```

- Then, seed the testing data from seeder by running following command: 
    
    ```php artisan migrate --seed --env=testing``` 
- Now, if you run the following command, you can see the test cases output for unit test.
    
    ```./vendor/bin/phpunit```
   
