# Yashio Kenya Tasks

This repo contains the public tasks for the Yashio Internship

## Table of Contents
- [Task 1](#task-1)
- [Task 2](#task-2)

<a id="task-1"></a>
## Task 1
The directory [task_1](./task_1) contains my task 1 project.

### Specifications for the task
- Create a Laravel model named "Task" with attributes: id (primary key), title (string), description (text), due_date (date), and user_id (foreign key).
- Define a relationship between the "User" model and the "Task" model, where a user has many tasks.
- Create a migration to create the "tasks" table with the necessary columns, including the user_id foreign key.
- Write a migration method to update all existing Tasks' descriptions to "N/A" as a default value.
- Write a controller action that retrieves all tasks belonging to a specific user, filters based on due_date in descending order and passes them to a view for display.
- Create a route that maps to the controller action you just created, allowing users to view their tasks.

## Task 2
The directory [task_2](./task_2) contains my task 2 project.

### Specifications for the task

- Use Vuejs for the Frontend
- Use Laravel for the Backend
- Create a minimal blog which contains the following features
    - A page to create a post.
    - A page to view all the posts.
    - A page to view a sigle post.
    - Posts can be tagged.
    - Posts can be searched via the tags.
