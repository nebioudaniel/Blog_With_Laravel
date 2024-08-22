# Laravel Blog Application

This is a blog application built using Laravel, Tailwind CSS, HTML, and jQuery. The application allows users to view posts, register, log in, create posts, like posts, and manage their posts via a user dashboard.

## Features

- **User Authentication**: Registration, login, and password reset functionalities.
- **CRUD Operations**: Create, read, update, and delete blog posts.
- **User Dashboard**: Manage your posts from a personalized dashboard.
- **Responsive Design**: Styled with Tailwind CSS for a modern and responsive UI.
- **Frontend Interactions**: Enhanced user experience with jQuery.


## Photos 

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP installed on your local machine
- Composer installed
- Laravel framework installed
- Node.js and npm installed
- MySQL database
- A code editor (e.g., VS Code)

## Installation

Follow these steps to set up and run the project locally:

1. **Clone the repository**:
    ```bash
    git clone https://github.com/your-username/your-repo-name.git
    cd your-repo-name
    ```

2. **Install dependencies**:
    ```bash
    composer install
    npm install
    ```

3. **Set up the environment**:
    - Copy the `.env.example` file to `.env`.
    - Update the `.env` file with your database credentials.

4. **Generate application key**:
    ```bash
    php artisan key:generate
    ```

5. **Run migrations**:
    ```bash
    php artisan migrate
    ```

6. **Set up frontend**:
    ```bash
    npm run dev
    ```

7. **Start the development server**:
    ```bash
    php artisan serve
    ```

8. Visit `http://localhost:8000` in your browser to view the application.

## Project Structure

MY project directory should look like this:

my_blog_app/
├── app/
│ ├── Http/
│ │ ├── Controllers/
│ │ │ └── BlogController.php
│ │ └── Middleware/
│ └── Models/
│ └── Post.php
├── config/
├── database/
├── public/
│ ├── css/
│ └── js/
├── resources/
│ ├── views/
│ │ ├── blog/
│ │ │ └── index.blade.php
│ │ ├── auth/
│ │ └── dashboard.blade.php
│ └── css/
├── routes/
│ └── web.php
└── .env

## Usage

- **View Posts**: Browse all posts on the homepage.
- **User Dashboard**: After logging in, access the dashboard to manage your posts.
- **Create Post**: Use the 'Create Post' button in the dashboard to add a new post.
- **Edit/Delete Post**: Edit or delete your posts from the dashboard.

## Deployment

To deploy the application, consider using platforms like Heroku, DigitalOcean, or any VPS provider. Ensure you migrate your database and set up the necessary environment variables in your hosting environment.

## Contributing

If you'd like to contribute, please fork the repository and use a feature branch. Pull requests are warmly welcome.

1. Fork the project
2. Create your feature branch (`git checkout -b feature/feature-name`)
3. Commit your changes (`git commit -m 'Add some feature'`)
4. Push to the branch (`git push origin feature/feature-name`)
5. Open a Pull Request

## License

This project is open-source and available under the [MIT License](LICENSE).

---

### Acknowledgements

This project was created using [Laravel](https://laravel.com/), [Tailwind CSS](https://tailwindcss.com/), and [jQuery](https://jquery.com/).
