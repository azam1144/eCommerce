
## Online Shopping E-commerce Platform 

This is Laravel application, database is Mysql, frontend is Laravel blade templating engine.

This project have following modules

- Product listing page.
- Product view page.
- Laravel seeder to seed categories, products, product images etc.
- Checkout per product functionality.
- Checkout page - Billing & Shipping information.
- Payment Gateway - Paytabs.
- User Authentications system also integrated.
- User authorize before order completions.
- Order listing Page.
- Transactions related information are saved Database.
  
You can setup the project by following steps

- Install Xampp or any other package for local development.
- Install laravel [link](https://laravel.com/) 

And now perform following step regarding this application.

- Git clone the repository.
- Composer install
- Update .env file - just copy the .env.example file.
- Create Database - its name should be same as you have provide in .env file.
- Now run migration (php artisan migrate).
- Run seeders (php artisan db:seed).
- If you have run migration & seed command successfully, congratulations.
- Run the Laravel server - php artisan serve.
