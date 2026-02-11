# Vetted — Backend API Specification

This document outlines the RESTful API endpoints for the **Vetted** pet wellness application. The backend is built with **Laravel** using **Sanctum** for token-based authentication.

## 1. Authentication

### Base URL: `/api`

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `POST` | `/register` | Create a new account | No |
| `POST` | `/login` | Authenticate and get token | No |
| `POST` | `/logout` | Revoke current token | Yes |
| `GET` | `/user` | Get authenticated user info | Yes |

---

## 2. Pet Management

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `GET` | `/pets` | List all pets for the user | Yes |
| `POST` | `/pets` | Create a new pet profile | Yes |
| `GET` | `/pets/{id}` | Get specific pet details | Yes |
| `PUT` | `/pets/{id}` | Update pet profile | Yes |
| `DELETE` | `/pets/{id}` | Remove a pet profile | Yes |

---

## 3. Health Records

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `GET` | `/pets/{pet}/health-records` | List health records for a pet | Yes |
| `POST` | `/pets/{pet}/health-records` | Add a health record | Yes |
| `GET` | `/health-records/{id}` | Get record details | Yes |
| `PUT` | `/health-records/{id}` | Update record | Yes |
| `DELETE` | `/health-records/{id}` | Delete record | Yes |

---

## 4. Reminders

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `GET` | `/pets/{pet}/reminders` | List reminders for a pet | Yes |
| `POST` | `/pets/{pet}/reminders` | Create a reminder | Yes |
| `PUT` | `/reminders/{id}` | Update reminder (complete/snooze) | Yes |
| `DELETE` | `/reminders/{id}` | Delete reminder | Yes |

---

## 5. Wellness & Tracking

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `GET` | `/pets/{pet}/wellness` | List wellness entries | Yes |
| `POST` | `/pets/{pet}/wellness` | Add a daily check-in | Yes |
| `GET` | `/pets/{pet}/trends` | Get trend data for charts | Yes |

---

## 6. Training & Habits

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `GET` | `/pets/{pet}/training-goals` | List training goals | Yes |
| `POST` | `/pets/{pet}/training-goals` | Add a training goal | Yes |
| `PUT` | `/training-goals/{id}` | Update goal or mark completion | Yes |
| `DELETE` | `/training-goals/{id}` | Delete goal | Yes |

---

## 7. Insights

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `GET` | `/pets/{pet}/insights` | Get rule-based insights | Yes |

---

## 8. Vet Sharing (Secure Links)

| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| `POST` | `/pets/{pet}/share` | Generate a secure sharing token | Yes |
| `GET` | `/share/{token}` | Public view of pet summary | No |

---

# Data Models (Schema)

### User
- `id` (UUID)
- `name`
- `email`
- `password`
- `avatar_url`

### Pet
- `id` (UUID)
- `user_id` (FK)
- `name`
- `species` (enum: cat/dog)
- `breed`
- `dob` (date)
- `notes` (text)
- `avatar_url`

### WeightHistory (Polymorphic or Related)
- `pet_id`
- `weight` (decimal)
- `recorded_at` (datetime)

### HealthRecord
- `id` (UUID)
- `pet_id` (FK)
- `type` (enum)
- `title`
- `description`
- `date`
- `document_url`

### Reminder
- `id` (UUID)
- `pet_id` (FK)
- `title`
- `type` (enum)
- `date`
- `time`
- `recurring` (boolean)
- `completed` (boolean)
- `snoozed` (boolean)

### WellnessEntry
- `id` (UUID)
- `pet_id` (FK)
- `date` (date)
- `appetite` (int 1-5)
- `energy` (int 1-5)
- `mood` (int 1-5)
- `bathroom` (int 1-5)
- `activity` (int 1-5)
- `notes` (text)

### TrainingGoal
- `id` (UUID)
- `pet_id` (FK)
- `title`

### GoalCompletion
- `training_goal_id` (FK)
- `date` (date)
- `done` (boolean)
- `notes` (text)

### Insight
- `id` (UUID)
- `pet_id` (FK)
- `message` (text)
- `type` (enum: info, alert)
- `icon` (string)
- `date` (datetime)
