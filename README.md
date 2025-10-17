# 🎄 Advent Challenge 2025 – CHECK24

This project was developed as part of the Advent Challenge 2025 at [CHECK24](https://www.check24.de).  
Inspired by [Advent of Code](https://adventofcode.com), participants solve a single programming puzzle designed to be completed within 1 to 1.5 hours.

---

## 🧭 Project Goals

- Provide developers with a focused, fun coding challenge  
- Ensure fair competition through automated validation  
- Display a real-time leaderboard  
- Establish a clean technical foundation for future events

---

## 🧰 Tech Stack

| Area                | Technology                                |
|----------------------|--------------------------------------------|
| Backend              | [Laravel](https://laravel.com) (PHP)      |
| Frontend             | [Vue.js](https://vuejs.org/) + JavaScript |
| Database             | [SQLite](https://www.sqlite.org/)         |
| Package Manager      | Composer & npm                            |
| Environment          | Local & production ready                  |

> SQLite is used because it’s lightweight and easy to deploy — ideal for this kind of challenge.

---

## ✨ Features

- Clean and modular Laravel backend  
- Responsive UI with Vue.js and Tailwind CSS  
- Single puzzle with automatic validation  
- 🏆 Real-time leaderboard  
- 🔐 Session-based authentication  
- ⏱ Penalty time for wrong answers  
- 🔓 Part 2 unlocks only after Part 1 is solved

---

## 🚀 How It Works

1. Login or register through the web interface  
2. Read the problem statement (similar to Advent of Code)  
3. Solve the puzzle in any programming language  
4. Submit your solution  
5. Get instant feedback (✅ correct / ❌ incorrect)  
6. The leaderboard updates automatically

---

## 🧪 Quick Start

### Prerequisites
- PHP ≥ 8.2  
- Composer  
- Node.js & npm  
- SQLite

### Installation
```bash
# Clone the repository
git clone https://github.com/USERNAME/advent-challenge-check24.git
cd advent-challenge-check24

# Install dependencies
composer install
npm install

# Copy environment file and configure SQLite
cp .env.example .env

# Generate app key
php artisan key:generate

# Create SQLite database
touch database/database.sqlite

# Run migrations and seeders
php artisan migrate --seed

# Start Laravel backend
php artisan serve

# Start frontend
npm run dev
```

## 📁 Project Structure

```text
advent-challenge-check24/
├── app/Http/Controllers/        # Laravel controllers
├── database/migrations/         # Migrations
├── resources/views/             # Blade templates
├── resources/js/                # Vue.js frontend
├── routes/web.php               # Routes
└── public/                      # Static assets
```

## 🛡️ Rules & Security

- All inputs are validated and sanitized.
- Part 2 remains locked until Part 1 is solved correctly.
- Each wrong answer adds a penalty time to the final score.
- Only results are stored, not the submitted solution code.

## 🪙 License & Credits

Developed for **CHECK24 Advent Challenge 2025**.  
Inspired by [Advent of Code](https://adventofcode.com).  
Made in Düsseldorf, Germany.
