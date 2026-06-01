# MovieMax Application

Application built with **Laravel**, **Livewire**, **Tailwind CSS**, and **Docker**. The application integrates with The Movie Database (TMDB) API to provide movie information and recommendations.

## Prerequisites

Before getting started, ensure you have the following installed:

* Docker
* Docker Compose
* A TMDB API Key

## Getting Started

Follow the steps below to set up the application locally.

### 1. Clone the Repository

```bash
git clone https://github.com/Busani-396/moviemax.git
cd moviemax
```

### 2. Configure Environment Variables

Copy the example environment file:

```bash
cp .env.example .env
```

Update the `.env` file and add your TMDB API key:

```env
MOVIE_API_KEY=your_api_key_here
```

### 3. Build and Start Docker Containers

```bash
docker-compose up -d --build
```

### 4. Install Application Dependencies

Install PHP and frontend dependencies:

```bash
docker-compose exec app composer install
docker-compose exec app npm install
```

### 5. Generate Application Key

```bash
docker-compose exec app php artisan key:generate
```

### 6. Run Database Migrations and Seeders

```bash
docker-compose exec app php artisan migrate --seed
```

If you need to reset the database and reseed it:

```bash
docker-compose exec app php artisan migrate:fresh --seed
```

## Running the Application

### Start the Laravel Development Server

```bash
docker-compose exec app php artisan serve --host=0.0.0.0 --port=8000
```

### Start the Vite Development Server

```bash
docker-compose exec app npm run dev
```

## Accessing the Application

Once the services are running, open your browser and navigate to:

```text
http://localhost:8000
```

## Technology Stack

* Laravel
* Livewire
* Tailwind CSS
* Docker
* MySQL
* TMDB API

## Notes

* Ensure your TMDB API key is valid before running the application.
* Docker containers must be running before executing Artisan, Composer, or NPM commands.
* The application uses seeded data for initial setup and testing.


## If you make changes to your .env file or notice cached issues, run:
* docker-compose exec app php artisan config:clear
* docker-compose exec app php artisan cache:clear


### Local Development Setup (Without Docker)

1. ## Prerequisites

    PHP: Version 8.2 or higher.  

    Composer: The PHP dependency manager.  

    Node.js & NPM: For compiling frontend assets.  

    MySQL: A database server installed and running locally.  

2. ## Installation

    Clone the repository: git clone [https://github.com/Busani-396/moviemax.git](https://github.com/Busani-396/moviemax.git).  

    Navigate into the directory: cd moviemax.  

    Install PHP dependencies: composer install.  

    Install frontend dependencies: npm install.  

3. ## Environment Configuration

    Copy the example environment file: cp .env.example .env.  

    Generate the application key: php artisan key:generate.  

    Update your .env file with your local database credentials and TMDB API key:

**4. Running the Application**
*   Run database migrations and seeders: `php artisan migrate --seed`
*   Compile frontend assets: `npm run dev`
*   Start the local server: `php artisan serve`