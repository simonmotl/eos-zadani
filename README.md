# JSON REST API - documentation

## Introduction
This repository contains simple API for member administration made in PHP with Laravel framework. It means creating, reading, updating and deleting data about members from database. Program uses simple SQlite database and JSON for exchanging data. In this documentation are informations about important parts like models, migrations and resource controller made for creating this API.

## Models
There are three models. The main model is Member which has five attributes including name, surname, email, date_of_birth and ID. There is constant for each attribute for more code clarity. There is also defined relationship with model MemberTag BelongsToMany because every member can have multiple member tags. The same relationship is defined in MemberTag model because every tag can be assigned to multiple people. This model has only ID and name attributes. So there is M:N relationship between Member and MemberTag. That is why was created third model AssignedTo which contains foreign keys of Member and MemberTag that connects them. These models where created as tables in database using migrations.

## Seeder 
For purpose of this API, data were inserted into MemberTag table by using database seeder MemberTagSeeder. There are five MemberTags that have names from IT area.

## Resource Controller
The most important part of this API is MemberController that performs operations with database. To handle requirements from controller there was created a Route.

### GET method
It has basic endpoints like index and show for reading from database. Index writes out all the members in database and show writes out one member based on member ID as input parameter. If inserted parameter is not in the database, program will throw exception with error message and returns code 404. There is also optional parameter, if it's "showMemberTags" program will write out members/member with all assigned tags.

### POST method
The store function serves for inserting data. It uses validator for checking incoming data. All input items have to have the right type and every each of them has to be filled except member_tags_ids array that is optional beacause Member can exist without MemberTag. Validator also checks if email is valid and unique and if date is in correct format. For assigning membertags there is function attach() that creates new item in AssignedTo table. If input data violates some of the validator rules, program returns error message and code 401. If validation passes, the new member with his attributes is returned.

### PUT method
The update function is almost same as store. The main difference is that input items are just optional and instead of using function attach(), there is function sync() that updates AssignedTo table.

### DELETE method
The destroy function basically finds and writes out the member based on input value - member id. If it's not in the database, program returns error message and 404 code.
