<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

## About Mosque Gifts Shop System

This project is designed to manage the selling process in a charity shop within a mosque's Quran memorization competition. Students use points earned during the competition to purchase gifts. The system handles barcodes for student identification, and a mobile app is used to scan these barcodes to fetch student data and process purchases.

The dashboard is built using FilamentPHP and provides a user-friendly interface for managing students, shop items, and transactions.

## Key Features

- **Point-based Selling System**: The shop allows students to use earned points to make purchases.
- **Barcode Integration**: Unique barcodes identify students, which can be scanned using a mobile app.
- **API for Barcode Data**: The system fetches student information via an API when barcodes are scanned.
- **Admin Dashboard**: Built with FilamentPHP, the dashboard provides an interface for managing inventory, students, and sales.

## Installation

### Requirements

- PHP 8.0+
- Composer
- MySQL
- Node.js and npm

### Steps

1. **Clone the Repository**

    ```bash
    git clone https://github.com/Mohamad-Alyafi/Mosque-Gifts-Shop.git
    cd Mosque-Gifts-Shop
    ```

2. **Install PHP Dependencies**

    ```bash
    composer install
    ```

3. **Install JavaScript Dependencies**

    ```bash
    npm install
    ```

4. **Configure Environment**  
   Copy `.env.example` to `.env` and set the required environment variables.

    ```bash
    cp .env.example .env
    ```

5. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

6. **Migrate the Database**

    ```bash
    php artisan migrate
    ```

7. **Run the Application**

    ```bash
    php artisan serve
    ```

## API Usage

The system offers an API to fetch student data using their unique barcode.

- `GET /api/student/{barcode}`: Retrieves student data by barcode.

## FilamentPHP Dashboard

Access the admin dashboard to manage shop items, students, and sales:

- **URL**: `/admin`

## Contributing

Anyone is welcome to clone the project and contribute by adding features or improving existing ones. To contribute:

1. Fork the repository.
2. Create a new branch for your feature (`git checkout -b feature/YourFeature`).
3. Commit your changes (`git commit -m 'Add YourFeature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Open a pull request.

Feel free to reach out to me at mohamad.n.alyafi@gmail.com if you face any issues while running the project or want to discuss feature ideas.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
