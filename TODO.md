# TODO: Add User Authentication to LavaLust PHP MVC Project

## Database Changes
- [x] Add 'users' table to database_setup.sql with fields: id, email, password, role, created_at

## Create Auth Library
- [x] Create scheme/libraries/Auth.php with login, logout, is_logged_in, get_user, has_role methods

## Create Auth Model
- [x] Create app/models/AuthModel.php for users table operations

## Create Auth Controller
- [x] Create app/controllers/AuthController.php with login, register, logout methods

## Update Routes
- [x] Add auth routes to app/config/routes.php
- [x] Protect existing CRUD routes with auth checks

## Modify UserController
- [x] Add authentication checks in UserController methods

## Create Auth Views
- [x] Create app/views/login.php
- [x] Create app/views/register.php

## Update Existing Views
- [x] Update app/views/show.php for auth display
- [x] Update app/views/home.php for navigation

## Testing
- [ ] Run database_setup.sql to create the users table
- [ ] Start the PHP server and test login/register functionality
- [ ] Verify that CRUD routes are protected and redirect to login when not authenticated
- [ ] Test role-based access (admin vs user permissions if implemented)
