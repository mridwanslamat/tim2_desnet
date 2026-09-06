<p align="center">
  <img src="public/img/desnet.jpg" alt="Desnet logo" height="70">
</p>

<h1 align="center">UAT Document Generator</h1>

<p align="center">
  A web app for managing client projects and auto-generating User Acceptance Testing (UAT) documents,
  built during a Web Development Internship at PT DES Teknologi Informasi (Desnet).
</p>

<p align="center">
  <img src="https://img.shields.io/badge/CodeIgniter-4-EF4223?logo=codeigniter&logoColor=white">
  <img src="https://img.shields.io/badge/MySQL-database-4479A1?logo=mysql&logoColor=white">
  <img src="https://img.shields.io/badge/Dompdf-PDF%20export-red">
</p>

---

## About

Before this project, Desnet's project managers tracked UAT sign-off manually. This app centralizes that workflow: admins assign projects to project managers, project managers log the features to be tested, record validation status from both Desnet and the client side, and generate a formatted UAT document as a PDF, all from one dashboard.

Two role-based views are supported:
- **Admin** create projects, assign a project manager, review project history
- **Project Manager** manage assigned projects, add/edit features under test, track validation status, and generate the final UAT PDF

## Features

- 🔐 Role-based login (Admin / Project Manager) with session-based auth
- 📁 Project creation and assignment
- ✅ Feature-level UAT tracking, with separate validation status for Desnet and the client
- 📄 One-click UAT document generation to PDF (via Dompdf)
- 🔍 Searchable project history with status filtering (On Progress / Finished)
- 📊 Dashboard stats — total projects and finished-project counts per user

## Screenshots

| Add new project | Update project |
|---|---|
| ![Add project](public/img/addnewproject.png) | ![Update project](public/img/updateproject.png) |

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | CodeIgniter 4 (PHP) |
| Database | MySQL |
| Styling | Tailwind CSS |
| PDF generation | Dompdf |

## Getting Started

### Prerequisites
- PHP 8.1+
- Composer
- MySQL

## Project Structure

```
app/
 ├─ Controllers/
 │   ├─ AuthController.php             # Login / session handling
 │   ├─ AdminController.php            # Admin dashboard, project assignment, history
 │   └─ ProjectManagerController.php   # PM dashboard, feature management, UAT PDF export
 ├─ Models/
 │   ├─ UserModel.php
 │   ├─ ProjectModel.php
 │   ├─ ProjectManagementModel.php
 │   ├─ FeatureUATModel.php
 │   └─ HistoryModel.php
 └─ Views/
     ├─ admin/
     ├─ projectmanager/
     └─ auth/
```

## Author

**Muhammad Ridwan Slamat**
Web Development Intern, PT DES Teknologi Informasi (Jan–Feb 2025)
[LinkedIn](https://linkedin.com/in/ridwanslamat/) · [mridwans466@gmail.com](mailto:mridwans466@gmail.com)

---
<sub>Built on the CodeIgniter 4 framework.</sub>
