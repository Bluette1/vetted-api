# 🐾 Vetted

> Calm insights. Thoughtful care.
> A modern pet wellness and health tracking app for proactive pet owners.

---

## 📖 Overview

**Vetted** is a mobile-first pet wellness application designed to help pet owners track health records, monitor behavioural patterns, and receive supportive, non-alarming insights about their pets.

Unlike traditional pet record apps that focus only on storing medical events, Vetted emphasizes:

* 📊 Pattern recognition over isolated events
* 🧠 Proactive wellness tracking
* 🩺 Easy vet-ready summaries
* 💛 Calm, humane user experience

The goal is simple: help pet owners make better care decisions with clarity and confidence.

---

## 🎯 Problem

Most pet health apps:

* Act as passive record storage
* Are opened only during vet visits
* Provide reminders but no meaningful insights
* Feel clinical or transactional

Pet owners often miss subtle early signals in behaviour or appetite because trends are hard to track manually.

---

## 💡 Solution

Vetted combines:

* Structured health records
* Daily wellness tracking
* Rule-based early signal detection
* Smart reminders
* Vet-ready summaries

All presented in a supportive, non-diagnostic tone.

---

## 🚀 MVP Features

### 👤 User Accounts

* Email/password authentication
* Multiple pets per user
* Profile management

### 🐕 Pet Profiles

* Species (cat/dog)
* Breed
* Age or DOB
* Weight tracking
* Medical notes

### 🩺 Health Records

* Vaccinations
* Medications
* Vet visits
* Document uploads
* Chronological timeline view

### 🔔 Smart Reminders

* Vaccination reminders
* Medication schedules
* Custom reminders
* Push notifications + email fallback

### 📊 Wellness & Behaviour Tracking

Optional daily check-ins:

* Appetite
* Energy level
* Mood
* Bathroom habits
* Activity

Includes:

* Trend visualizations
* Weekly summaries

### 🧠 Pattern-Based Insights

Rule-based alerts such as:

* Repeated low appetite
* Missed medication
* Sudden weight shifts
* Reduced activity trends

All insights are non-diagnostic and include appropriate disclaimers.

### 🧑‍⚕️ Vet Sharing

* Secure read-only summary links
* QR code sharing
* Includes records + wellness trends
* No vet account required

---

## 🛠 Tech Stack (Planned)

### Backend

* Laravel (API-only)
* PostgreSQL / MySQL
* Laravel Sanctum (auth)
* Queues for reminders
* Cloud object storage for uploads

### Frontend

* React Native (planned)
  *(or alternative cross-platform solution)*

### Notifications

* Push notifications
* Email fallback

---

## 🧱 Architecture (High-Level)

```
Mobile App
    ↓
Laravel API
    ├── Authentication
    ├── Pet & Health Records
    ├── Wellness Tracking
    ├── Reminder Scheduler
    ├── Insight Engine (rule-based)
    └── Secure Sharing
```

---

## 🔒 Design Principles

* Calm, humane language
* No fear-based alerts
* No guilt-driven UX
* No medical diagnosis
* Privacy-first data handling

---

## 📈 Success Metrics (MVP)

* Users log in 3+ times per week
* 50%+ enable reminders
* Regular wellness data entry
* Vet summaries used in real appointments

---

## 🚧 Out of Scope (MVP)

* Telehealth video
* Payments/subscriptions
* Marketplace features
* Wearable integrations
* AI diagnosis
* Social/community feeds

---

## 🔮 Future Roadmap

* Vet dashboards
* Subscription tiers
* AI-assisted pattern analysis
* Telehealth integrations
* Breed-specific wellness guidance
* Wearable sync

---

## 🧠 Why This Project?

Vetted explores how thoughtful UX and structured data can help pet owners make better care decisions — without overwhelming them.

This project combines:

* Preventive health thinking
* Calm product design
* API-first architecture
* Scalable backend planning

---

## 📜 License

TBD

