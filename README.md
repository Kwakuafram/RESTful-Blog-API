# RESTful Blog API

## Introduction
This API provides CRUD (Create, Read, Update, Delete) functionalities for blog posts, with user authentication already implemented.

## Features
- User authentication using Laravel Sanctum.
- CRUD operations for blog posts.
- API routes secured using authentication middleware.

## Requirements
- PHP >= 8.0
- Composer
- Laravel Framework
- MySQL or any supported database

## Installation Steps
1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Configure the `.env` file with database and app settings.
4. Run `php artisan migrate` to create database tables.
5. Seed database if necessary using `php artisan db:seed`.
6. Run `php artisan serve` to start the development server.

## API Endpoints
### Posts
- **GET /api/posts** - Retrieve all posts.
- **GET /api/posts/{id}** - Retrieve a single post.
- **POST /api/posts** - Create a new post (authenticated users only).
- **PUT /api/posts/{id}** - Update a post (authenticated users only).
- **DELETE /api/posts/{id}** - Delete a post (authenticated users only).

## Authentication
- Use Laravel Sanctum for token-based authentication.
- Include the token in the Authorization header (`Bearer {token}`) when accessing protected routes.

## Testing with Postman
1. Register or log in to obtain an authentication token.
2. Use the token in the Authorization header for protected routes.
3. Perform CRUD operations on posts.

## Notes
- Ensure `sanctum` middleware is applied to protect API routes.
- Use environment variables for database and security configurations.

## Conclusion
This API provides a simple yet efficient blog system with secure authentication and full CRUD functionality for posts.

