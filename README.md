<h1>🖥️ AFT Websites Content Management System 🖥️</h1>

## Steps to Run the App Locally

### 1. Clone the Repository
```bash
git clone https://github.com/ahftechteam/website_be.git
```
```bash
cd website_be
```
### 2. Install Dependencies
```bash
composer install
```
```bash
cp .env.example .env
```
```bash
php artisan key:generate
```
### 3. Create the Database table and run
```bash
php artisan migrate:fresh --seed
```
A user with an
email=admin@gmail.com
password=12345678      will be available

### 4. Start the queue for the notification
```bash
php artisan queue:work 
```
### 4. Generate the api documentation 
```bash
php artisan scribe:generate 
```


