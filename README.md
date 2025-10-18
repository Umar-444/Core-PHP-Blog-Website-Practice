# Core PHP Blog

A clean, modern, and responsive blogging platform built in **Core PHP**. Easily create, manage, and publish articles with category support, image uploads, user authentication, and a modern Bootstrap-powered interface.

---

## ✨ Features

- Beautiful, mobile-friendly public blog with Bootstrap 5 UI
- Admin dashboard for article &amp; category management
- WYSIWYG article creation (title, content, image, categories, publish date)
- Article image upload, shown in articles and lists
- Category badges and management
- Pagination on both public and admin lists
- Contact form with PHPMailer support
- User authentication (login/logout)
- Clean, modular PHP code (no framework)
- Ready to run on XAMPP/Laragon/any LAMP local setup

---

## 📁 Folder & File Structure
```
Core_php_blog/
├── admin/                # Admin dashboard & article/category management
│   ├── index.php         # Admin home/list articles
│   ├── new-article.php   # Add new article form
│   ├── edit-article.php  # Edit article
│   └── ...
├── classes/              # Project PHP classes (Article, Category, Auth, etc.)
├── css/                  # Custom & 3rd-party CSS (Bootstrap is CDN)
│   └── styles.css
├── js/                   # JS scripts (validation, datetimepicker, etc.)
├── include/              # Common includes (header, footer, db, pagination)
├── uploads/              # Uploaded article images (must be writable!)
├── article.php           # Single public article view
├── index.php             # Public blog/article list
├── contact.php           # Contact form
├── login.php, logout.php # Authentication
├── config.php            # Core project config
├── cms.sql               # Database schema
└── README.md             # This file
```

---

## 🚀 Quick Start

1. **Clone this repo:**
   ```sh
   git clone https://github.com/Umar-444/Core_php_blog.git
   ```
2. **Import the database:**
   - Use the provided `cms.sql` file to create your MySQL tables.
3. **Configure DB & SMTP:**
   - Update `/config.php` with your database and SMTP email settings.
4. **Create the uploads folder:**
   - In your project root, create a folder named `uploads` (make it writable: `chmod 777 uploads` on Linux/Mac, or set permissions in Windows).
5. **Run locally:**
   - Place the folder in your local webserver (e.g., `C:/laragon/www/Core_php_blog/` for Laragon)
   - Access via your browser: `http://localhost/Core_php_blog/`
6. **Login to Admin:**
   - Default user: create one directly via DB or `/create_user.php` script if provided.

---

## 🖼️ Image Uploads
- When adding or editing an article, you can upload a featured image.
- Images are saved in `/uploads/` and served automatically in articles and lists.
- Make sure this folder exists and is writable (see Quick Start step 4).

---

## 🤝 Contact & Branding

**Umar FarooQ**  
[LinkedIn](https://linkedin.com/in/umar444)  
[GitHub (@Umar-444)](https://github.com/Umar-444)  
Email: Umarpak995@gmail.com

---

> Feel free to reach out for issues, suggestions, or collaboration! If you use or modify this project, please star and share :)
