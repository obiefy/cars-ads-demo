## Car Ads API
API demo for car ads project.

## Install and run the project

#### 1. clone Github repo:
`https://github.com/obiefy/cars-ads-demo.git`

#### 2. Install composer dependencies:
`composer install`

#### 3. Prepare database:
`cp .env.example .env`
Then add database connection credentials to `.env` file.

#### 4. Migrate tables and seed data:
`php artisan migrate --seed`

#### 5. Install passport clients:
`php artisan passport:install`

#### 6. Login with user record:

use `user@obay-dev.com` as email, and `123456` as password.

[Find API docs here](https://documenter.getpostman.com/view/2619942/TVetcS4z)
