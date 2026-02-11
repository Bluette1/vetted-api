# GitHub Issues Draft — Vetted Backend

These are suggested issues to create in the repository to track the backend development.

---

## 1. Project Initialization & Authentication [Foundation]
**Description:**
- Initialize Laravel 11 project.
- Configure PostgreSQL database.
- Install and configure Laravel Sanctum for API token-based auth.
- Implement endpoints: `POST /register`, `POST /login`, `POST /logout`, `GET /user`.
- Set up Base Controller for standardized JSON responses.

**Acceptance Criteria:**
- User can register and receive a token.
- User can login and retrieve their profile.
- Unauthenticated requests to protected routes return 401.

---

## 2. Implement Pet Management & Weight History
**Description:**
- Create `Pet` model and migration (name, species, breed, dob, notes, avatar_url).
- Create `WeightHistory` model to track pet weights over time.
- Implement CRUD endpoints for `/pets`.
- Add validation for pet data.

**Acceptance Criteria:**
- User can create, view, update, and delete their pets.
- Weight history is automatically updated when a pet's current weight is changed (or via separate endpoint).

---

## 3. Health Records System with File Uploads
**Description:**
- Create `HealthRecord` model (type, title, description, date, document_url).
- Implement CRUD endpoints for `/pets/{pet}/health-records`.
- Set up Laravel Storage (local/S3) for document/image uploads.

**Acceptance Criteria:**
- User can add a vaccination/medication record with an attached PDF or image.
- Records are filtered by `pet_id`.

---

## 4. Smart Reminders & Background Scheduling
**Description:**
- Create `Reminder` model (title, type, date, time, recurring, completed, snoozed).
- Implement CRUD for `/pets/{pet}/reminders`.
- Set up Laravel Scheduler and Queue workers.
- Logic for snoozing and marking as recurring.

**Acceptance Criteria:**
- Reminders can be created for specific dates/times.
- Logic exists to handle recurring flags.

---

## 5. Wellness Tracking & Chart Data Endpoints
**Description:**
- Create `WellnessEntry` model (appetite, energy, mood, bathroom, activity, notes).
- Implement `POST /pets/{pet}/wellness` for daily check-ins.
- Implement `GET /pets/{pet}/trends` to return aggregated data for frontend charts.

**Acceptance Criteria:**
- Only one wellness entry per pet per day.
- Trends endpoint returns formatted data (e.g., last 7 days averages).

---

## 6. Rule-Based Insight Engine
**Description:**
- Create `Insight` model.
- Implement a service that runs after wellness entries or periodically to generate insights.
- Example rules: "Appetite has been low for 3 days", "No walk recorded this week".
- Implement `GET /pets/{pet}/insights`.

**Acceptance Criteria:**
- Insights are generated based on patterns, not just static data.
- Insights include the required "not a diagnosis" disclaimer.

---

## 7. Secure Vet Sharing Links
**Description:**
- Implement logic to generate unique, secure alphanumeric tokens for pet sharing.
- Create `GET /share/{token}` endpoint that returns a read-only summary (JSON).
- Ensure no authentication is required for this specific endpoint, but data is strictly limited.

**Acceptance Criteria:**
- User can "Generate Share Link".
- Anyone with the link can view the pet's profile, health records, and recent wellness trends.

---

## 8. Training Goals & Habit Completion
**Description:**
- Create `TrainingGoal` and `GoalCompletion` models.
- Implement endpoints to add habits and track daily "done" status.

**Acceptance Criteria:**
- User can track progress on training (e.g., "Leash Training") with simple checkboxes.
