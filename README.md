# Fleet Management (Bus Booking System)

### ERD Diagram
![ERD Diagram](fleet_management.png)

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/ZeinaZayed4/fleet-management.git
   ```
   
2. Navigate into the project directory:
    ```bash
    cd fleet-management
    ```
   
3. Install dependencies:
   ```bash
   composer install
   ```
   
4. Copy .env.example to .env and update the database credentials:
    ```bash
   cp .env.example .env
   ```
   
5. Generate an application key:
    ```bash
    php artisan key:generate
   ```
   
6. Run migrations and seeders:
    ```bash
    php artisan migrate --seed
    ```
7. Start the development server:
    ```bash
    php artisan serve
    ```
