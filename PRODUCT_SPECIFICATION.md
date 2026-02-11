# **Product Specification — Vetted**

*(Pet wellness & health tracking app)*

---

## 1. Product Overview

**Product name:** Vetted
**Platform:** Mobile-first (iOS & Android), API-backed
**Purpose:**
Help pet owners proactively understand and manage their pet’s health and wellbeing through calm tracking, reminders, and pattern-based insights — without medical diagnosis.

**Target users:**

* Primary: Pet owners (cats & dogs)
* Secondary: Veterinarians (read-only access to shared pet summaries)

---

## 2. Core Value Proposition

Vetted focuses on **patterns over events**.
Instead of just storing medical records, it helps pet owners notice *early signals* and maintain consistent care routines in a calm, humane way.

---

## 3. MVP Feature Scope

### 3.1 Authentication & Accounts

* Email/password authentication
* Password reset
* One user can manage multiple pets
* Basic profile settings

---

### 3.2 Pet Profiles

Each pet profile includes:

* Name
* Species (cat/dog)
* Breed (free text)
* Date of birth or age
* Weight (with history)
* Notes (allergies, conditions)

---

### 3.3 Health Records

Manual entry only (MVP):

* Vaccinations
* Medications
* Vet visits
* Health notes
* Document uploads (images or PDFs)

Display:

* Chronological timeline
* Simple filters by record type

---

### 3.4 Smart Reminders

* Vaccination reminders
* Medication schedules
* Custom reminders
* Push notifications
* Email fallback

Users can:

* Snooze reminders
* Mark reminders as done
* Edit schedules

---

### 3.5 Wellness & Behaviour Tracking (Differentiator)

Optional daily check-ins per pet:

* Appetite (low / normal / high)
* Energy level
* Mood
* Bathroom habits
* Activity (walks / play)

Display:

* Simple trend charts
* Weekly summaries

---

### 3.6 Pattern-Based Insights (Non-diagnostic)

Rule-based insights only (no AI diagnosis):
Examples:

* Repeated low appetite
* Missed medications
* Sudden weight changes
* Reduced activity trends

All insights include a disclaimer:

> “This is not a diagnosis. Consider monitoring or consulting a vet.”

Tone:

* Calm
* Supportive
* Non-alarming

---

### 3.7 Training & Habit Tracking

Lightweight habit system:

* Select a goal (e.g. leash walking, toilet routine)
* Daily completion checkboxes
* Optional notes

No videos or courses in MVP.

---

### 3.8 Vet Sharing

* Generate a secure, read-only pet summary
* Share via link or QR code
* Includes:

  * Pet profile
  * Health records
  * Recent wellness trends

No vet login required.

---

## 4. UX & Tone Guidelines

* Calm, humane language
* No fear-based alerts
* No guilt-driven copy
* Emphasis on encouragement and consistency

Example tone:

> “You’re doing well. Here’s what to keep an eye on.”

---

## 5. Non-Goals (Explicitly Out of Scope for MVP)

* Telehealth video calls
* Payments or subscriptions
* Vet clinic dashboards
* Wearable integrations
* Social feeds or community
* Marketplace for services
* AI diagnosis or medical advice

---

## 6. Technical Assumptions

**Backend:** Laravel (API-only)
**Database:** PostgreSQL or MySQL
**Auth:** Token-based (e.g. Sanctum)
**Notifications:** Push + email
**Storage:** Cloud object storage for uploads

Frontend assumed to consume REST API.

---

## 7. MVP Success Criteria

The MVP is considered successful if:

* Users log in 3+ times per week
* At least 50% enable reminders
* Users actively enter wellness data
* Shared vet summaries are used in real appointments

---

## 8. Future (Post-MVP, Not Implemented)

* Vet accounts & dashboards
* Telehealth integration
* Subscriptions
* AI-assisted insights
* Marketplace & services
* Wearable integrations

