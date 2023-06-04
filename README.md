### Prerequisites:
1. PHP Version 8.2
2. Node Js Version 16

### Setup (run the following commands):
1. Copy `.env.example` to `.env` and provide your database credentials
2. `npm install`
3. `composer install`
4. `php artisan key:generate`
5. `php artisan migrate --seed`

#### Setup sh file (for linux or wsl)
After setting up your `.env` file you can use the `.setup.sh` file to setup the application.  
Make the file executable by running `chmod u+x setup.sh` from the root directory.  
Then `./setup.sh` in your command line.

### Admin User
Default Administrator:  
username: administrator  
password: p^Nd@S

### Note
By Default 11 users will be created by the seeder.  
1 administrator and 10 authenticated.  
Register to create your own account.
