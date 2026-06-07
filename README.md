# Workaholic 🟢

**Workaholic** is a job portal web application built with PHP that connects job seekers with companies in a seamless, transparent, and professional way.

---

## 🌟 Overview

Workaholic is a multi-sided platform designed to serve both job seekers and employers. It provides a single unified system for job listings, company profiles, applicant profiles, and a company admin dashboard — all in one place.

---

## ✨ Features

### For Job Seekers
- Create and manage a personal profile with photo upload
- Browse and filter job listings by category, type, location, and salary
- View detailed company profiles before applying
- Apply to jobs with a multi-step application form
- Save favorite job listings
- Track application history

### For Companies
- Register and manage a company admin account
- Build a public-facing company profile with logo, description, and candidate criteria
- Post and manage job listings with full details (type, salary, experience, etc.)
- View and manage incoming applications from the admin dashboard
- Google OAuth login support

### General
- Google OAuth authentication for both job seekers and companies
- Real-time stats (active jobs, registered accounts, companies)
- User testimonials with a persistent database-backed slideshow
- WhatsApp customer service integration for career consultation
- Fully responsive design

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|------------|
| Backend | PHP (procedural) |
| Database | MySQL |
| Frontend | HTML, CSS, Vanilla JavaScript |
| Auth | PHP Sessions + Google OAuth |
| Hosting | Apache / any PHP-compatible server |

---

## 📁 Project Structure

```
/
├── index.php                  # Main application (SPA)
├── koneksi.php                # Database connection
├── login.php                  # User login
├── register.php               # User registration
├── logout.php                 # Session logout
├── company_login.php          # Company login
├── company_register.php       # Company registration
├── company_session.php        # Company session handler
├── list_jobs.php              # Fetch job listings
├── list_companies.php         # Fetch company listings
├── tambah_lowongan.php        # Add new job posting
├── update_lowongan.php        # Edit job posting
├── delete_lowongan.php        # Delete job posting
├── lamar.php                  # Submit job application
├── list_applications.php      # Fetch applications
├── get_profile.php            # Fetch user profile
├── update_profile.php         # Update user profile
├── update_company_profile.php # Update company profile
├── upload_profile_photo.php   # Upload user photo
├── upload_company_logo.php    # Upload company logo
├── save_job.php               # Save a job listing
├── remove_saved_job.php       # Remove saved job
├── list_saved_jobs.php        # Fetch saved jobs
├── submit_testimonial.php     # Submit user testimonial
├── load_testimonials.php      # Load testimonials from DB
├── about_stats.php            # Live site statistics
├── google_auth.php            # Google OAuth (users)
├── company_google_auth.php    # Google OAuth (companies)
└── lupa_password.php          # Password recovery
```

---

## 🗄️ Database Tables

| Table | Description |
|-------|-------------|
| `users` | Registered job seekers |
| `perusahaan` | Registered companies |
| `lowongan` | Job listings |
| `lamaran` | Job applications |
| `saved_jobs` | Saved job listings per user |
| `career_feedback` | User testimonials and feedback |

---

## 🚀 Getting Started

1. Clone this repository
2. Import the database schema into MySQL
3. Configure `koneksi.php` with your database credentials
4. Set up Google OAuth credentials and update the auth files
5. Deploy to any PHP-compatible web server (Apache/Nginx)
6. Open `index.php` in your browser

---

## 📬 Contact

For career consultation or business inquiries, reach us via WhatsApp at **+62 882-3803-7218**. ( Dhani )

---

*Built with ❤️ using PHP & vanilla JavaScript.*
