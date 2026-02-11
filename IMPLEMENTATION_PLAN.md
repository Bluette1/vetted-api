# Vetted Backend Implementation Plan

This plan outlines the steps to build the Laravel-based API backend for the **Vetted** application.

## Phase 1: Project Setup & Auth (Foundation)
1. **Initialize Laravel Project**: Set up a fresh Laravel installation with PostgreSQL.
2. **Authentication**: 
   - Configure Laravel Sanctum.
   - Implement Register, Login, Logout, and `/user` endpoints.
   - Add avatar upload support using Laravel MediaLibrary or simple storage.
3. **API Response Standardization**: Create Base Controller and JSON Response helpers for consistent API structure.

## Phase 2: Core Data Management (Pets & Records)
1. **Pets Module**:
   - Migrations, Models, and Controllers for Pets.
   - Implement Weight tracking (WeightHistory model).
   - Validation logic for pet creation.
2. **Health Records**:
   - Migrations and CRUD for HealthRecords.
   - Implement document upload functionality for records.

## Phase 3: Reminders & Notifications
1. **Reminder Engine**:
   - Migrations and CRUD for Reminders.
   - Logic for recurring reminders (e.g., using scheduled tasks).
2. **Notification System**:
   - Integrate with a service for Push Notifications (e.g., Firebase).
   - Set up Mailers for email fallbacks.
   - Background jobs for processing reminders.

## Phase 4: Wellness Tracking & Insights
1. **Wellness Tracking**:
   - Migrations and CRUD for WellnessEntries.
   - Logic to prevent duplicate daily entries per pet.
2. **Insight Engine**:
   - Implement rule-based logic (e.g., "Alert if appetite < 3 for 3 consecutive days").
   - Create Insight model and generator service.
3. **Training & Habits**:
   - Implement Training Goals and Daily completion tracking.

## Phase 5: Sharing & Vet Features
1. **Secure Sharing**:
   - Logic to generate unique, expiring, or permanent sharing tokens.
   - Implementation of the semi-public `GET /share/{token}` endpoint.
   - Ensure the shared view is read-only and limited in scope.

## Phase 6: Finalization & Integration
1. **API Documentation**: Finalize OpenAPI/Swagger specs (using Scribe or L5-Swagger).
2. **Frontend Integration**: Update the frontend `api.ts` to point to the real backend.
3. **Deployment**: Set up CI/CD pipeline and deploy to a staging environment.

## Technology Stack Recommendations
- **Framework**: Laravel 11.x
- **Auth**: Laravel Sanctum
- **Database**: PostgreSQL
- **Caching/Queues**: Redis
- **Storage**: AWS S3 or DigitalOcean Spaces
- **Testing**: Pest or PHPUnit
