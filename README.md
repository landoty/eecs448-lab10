# Lab 10 - MySQL Blog Post App
Lab 10 encompases all of the skills learned from previous labs. The frontend is created using HTML, CSS, and Javascript and the backend is implemented using PHP and MySQL.

# App Features
### Create User
- A new username is given and entered into the database if it does not already exist
### Create Post
- A username and post content is given and entered into the databse if the user exists
### Admin - View Users
- A table of all existing users is displayed
### Admin - View User Posts
- A dropdown menu of all existing users is displayed and on selection, a single user's posts is displayed in a table
### Admin - Delete Post
- A table of all existing posts is displayed with checkboxes to delete. A single or multiple posts can be deleted at a time

# DB Schema
|   Users   |   Posts  |
|-----------|----------|
|  user_id* | post_id* |
|           | content  |
|           | author_id|