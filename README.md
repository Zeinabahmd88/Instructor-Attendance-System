# Instructor Attendance System

A web-based Instructor Attendance Management System developed using **Laravel** to automate instructor attendance tracking, reduce paperwork, improve accuracy, and simplify communication between instructors, HR, and university schools.

---

## 📖 Overview

The Instructor Attendance System is designed to replace the traditional paper-based attendance process with a secure and efficient digital platform. The system allows instructors to record attendance electronically while enabling HR and schools to monitor attendance records in real time.

---

## 🚨 Problem Statement

Traditional attendance systems present several challenges:

- Manual attendance records can be lost, stolen, or damaged.
- Collecting attendance sheets from many instructors is time-consuming.
- Manual processes reduce the university's technological advancement.
- Paper-based systems are prone to:
  - Human errors
  - Illegible handwriting
  - Incorrect entries
  - Data manipulation and fraud

---

## 💡 Proposed Solution

The Instructor Attendance System digitizes the entire attendance process by providing separate modules for instructors, HR, and schools.

### Instructor Module

- Secure login
- Mark attendance
- View attendance history
- Submit absence requests
- Upload supporting documents (if required)

### HR Module

- Monitor instructor attendance
- View absent instructors
- Generate attendance reports
- Notify schools about instructor absences

### School Module

- Receive absence notifications
- Review absence requests
- Accept or reject submitted reasons
- Maintain attendance records

---

## ✨ Features

- Instructor Authentication
- Role-Based Access Control
- Attendance Management
- Absence Request System
- Attendance Reports
- Dashboard
- Secure Data Storage
- Responsive User Interface

---

## 🛠️ Built With

- Laravel
- PHP
- MySQL
- Blade Templates
- Bootstrap
- HTML5
- CSS3
- JavaScript

---

## 📂 Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

---

## 🚀 Installation

### 1. Clone the repository

```bash
git clone https://github.com/YOUR_USERNAME/Instructor-Attendance-System.git
```

### 2. Navigate into the project

```bash
cd Instructor-Attendance-System
```

### 3. Install dependencies

```bash
composer install
```

### 4. Copy the environment file

```bash
cp .env.example .env
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Configure your database

Update the `.env` file:

```env
DB_DATABASE=attendance_system
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Run migrations

```bash
php artisan migrate
```

### 8. Start the development server

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
```

---

## 📊 Future Improvements

- QR Code Attendance
- Face Recognition
- Email Notifications
- SMS Notifications
- Mobile Application
- Attendance Analytics
- Export Reports to PDF and Excel

---

## 👩‍💻 Author

**Zeinab Ahmad**

Full Stack Web Developer

---

## 📄 License

This project is developed for educational purposes.
