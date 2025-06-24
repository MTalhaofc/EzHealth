# ✨ Ez Health - Admin Panel ✨

---

The Ez Health Admin Panel is your central command center for managing the entire Ez Health ecosystem. This powerful, web-based dashboard empowers administrators and healthcare staff to efficiently oversee users, appointments, reports, tests, and all critical system operations. Built with a modern tech stack, it guarantees real-time data handling, ironclad security, and a seamless, intuitive user experience.

---

## 🚀 Key Features

---

* ✅ **User Management:** Effortlessly verify, activate, and manage all user accounts.
* 🗓️ **Appointment Scheduling:** Full control over appointment bookings, modifications, and cancellations.
* 📄 **Report Management:** Review, approve, and organize patient reports with ease.
* 🔬 **Test Management:** Oversee and update available medical tests and their details.
* 👩‍💼 **Admin & Staff Control:** Robust tools for managing administrator and healthcare staff roles and permissions.
* 🔒 **Web Login Security:** Secure handling and management of web login credentials.
* 🔄 **Real-time Synchronization:** Instant data sync with the Ez Health mobile application for up-to-date information.
* 📱 **Responsive Design:** A sleek, modern, and adaptive interface that looks great on any device.

---

## 🛠 Tech Stack & Dependencies

---

The Ez Health Admin Panel is crafted with the following cutting-edge technologies:

| Technology | Description | Badge |
| :---------- | :---------- | :----------: |
| **Laravel** | The robust PHP Framework for a scalable and secure backend. | ![Laravel](https://img.shields.io/badge/-Laravel-FF2D20?logo=laravel&logoColor=white) |
| **TailwindCSS** | A utility-first CSS framework for rapid and responsive UI development. | ![TailwindCSS](https://img.shields.io/badge/-TailwindCSS-06B6D4?logo=tailwindcss&logoColor=white) |
| **ViteJS** | Next-generation frontend tooling for blazing-fast development and optimized builds. | ![ViteJS](https://img.shields.io/badge/-ViteJS-646CFF?logo=vite&logoColor=white) |
| **Blade** | Laravel's powerful and expressive templating engine. | ![Blade](https://img.shields.io/badge/-Blade-FF2D20?logo=laravel&logoColor=white) |
| **Font Awesome** | The internet's most popular icon toolkit for stunning icons. | ![FontAwesome](https://img.shields.io/badge/-FontAwesome-528DD7?logo=fontawesome&logoColor=white) |
| **Firebase** | Google's mobile platform for real-time database, authentication, and more. | ![Firebase](https://img.shields.io/badge/-Firebase-FFCA28?logo=firebase&logoColor=white) |

---

## 📸 Screenshots

---

Get a glimpse of the Admin Panel in action:

| Admin Dashboard | User Management | Report Management |
| :-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------: | :-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------: | :-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------: |
| ![Admin Dashboard Screenshot](https://raw.githubusercontent.com/MTalhaofc/EzHealth/refs/heads/main/Screenshot%20from%202025-05-18%2016-16-26.png) | ![User Management Screenshot](https://raw.githubusercontent.com/MTalhaofc/EzHealth/refs/heads/main/Screenshot%20from%202025-05-18%2016-27-48.png) | ![Report Management Screenshot](https://raw.githubusercontent.com/MTalhaofc/EzHealth/refs/heads/main/Screenshot%20from%202025-05-18%2016-19-09.png) |
| A comprehensive overview of key metrics and recent activities. | Effortlessly manage and view user details and statuses. | Streamlined workflow for handling and approving patient reports. |

---

## ⚙️ Installation & Setup

---

Follow these simple steps to get the Ez Health Admin Panel up and running on your local machine:

###  Clone the Repository

```bash
git clone https://github.com/MTalhaofc/ez-health-admin.git
cd ez-health-admin
```
 Configure Environment
```
Copy .env.example to .env

Add your database credentials

Add Firebase service credentials
```
Run Database Migration

```
php artisan migrate
```
 Launch the Application
```
php artisan serve
```

---

### 🔐 Admin Panel Access

```markdown
You can create admin users via database seeder or manually through the database for initial setup.
```

---

### 🖥 System Architecture

```bash
[ Admin ] --> [ Ez Health Admin Panel ] --> [ Firebase + MySQL ]
```

**Backend:** Laravel
**Frontend:** TailwindCSS + Blade + ViteJS
**Real-Time Sync:** Firebase

---

### 📄 License

```markdown
Licensed under the MIT License.
```

---

⚡ **Ez Health - Making healthcare smarter, faster, and more accessible!**

---

### 🌐 Connect With Us

```markdown
Feel free to connect, collaborate, or contribute!
```



