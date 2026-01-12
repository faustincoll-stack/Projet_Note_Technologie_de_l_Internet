# Projet_Note_Technologie_de_l_Internet : Top Lane Matchup Helper

## About the Project

**Top Lane Matchup Helper** is a web application designed for **League of Legends players** who want to better prepare their **Top Lane matchups**.

The purpose of this website is simple:  
choose the champion you play, choose the champion you face, and instantly get **clear, structured, and useful matchup advice**.

This project was developed as part of an **academic web development project**, with a strong focus on PHP, SQL databases, sessions, and dynamic JavaScript behavior.

---

## Features

### User Accounts
- User registration system
- Secure login & logout
- Session-based authentication

### Personal Dashboard
- Select a **favorite Top Lane champion**
- Favorite champion is stored in the database
- Personalized dashboard experience

### Matchup System
- Select your champion and the enemy champion
- Display detailed matchup information:
  - Matchup overview
  - Win conditions
  - Early game strategy
  - Mid game strategy
  - Late game strategy
  - Gameplay tips
  - Recommended runes & items
  - Quick summary
- Matchups are stored and retrieved from a SQL database
- Many matchups are already saved in the database in the Git repository, but not all of them.

### Champion Autocomplete
- Live search suggestions while typing
- Mouse click or **Enter key** validation
- Prevents invalid champion names
- Shared autocomplete system across pages

### Dynamic Visuals
- Background images change depending on the selected champion
- Clean and readable UI
- Responsive layout

---

## Technologies Used

### Frontend
- HTML5
- CSS3
- Vanilla JavaScript

### Backend
- PHP 8+
- PDO (prepared SQL queries)

### Database
- MySQL / MariaDB
- phpMyAdmin

---

## Database Structure

### `users` table
- `id`
- `username`
- `email`
- `password` (hashed)
- `favorite_top_champion`
- `last_play`
- `last_Ennemie`
- `created_at`

### `matchup_texts` table
- `id`
- `champion_from`
- `champion_to`
- `presentation`
- `win_conditions`
- `early_game`
- `mid_game`
- `late_game`
- `gameplay_tips`
- `runes_items`
- `summary`
- `created_at`

---

## Installation

1. Copy the project into : /xampp/htdocs/
2. Import the SQL database using **phpMyAdmin**
3. Check database credentials in : api/db.php
4. Start Apache and MySQL
5. Open the project in your browser : http://localhost/Projet_Note_Technologie_de_l_Internet

## AI use :

Throughout the development of this project, I made extensive use of artificial intelligence tools such as **ChatGPT** and **Claude**. These tools were used primarily as learning and assistance resources, helping me debug issues, understand complex concepts, and explore different technical solutions. However, I paid close attention to fully understanding every piece of code and every suggestion provided by the AI. I did not blindly copy solutions; instead, I analyzed them, adapted them to my project, and made sure I could explain how and why they worked. This approach allowed me to strengthen my technical skills while maintaining full ownership and understanding of the final implementation.


## Author : Coll Faustin

Created as part of a **Web Technologies course project**.

Main learning objectives:
- PHP & MySQL
- Authentication & sessions
- Form handling
- JavaScript DOM manipulation
- Data validation
- Basic web securit



