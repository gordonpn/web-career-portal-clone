# COMP 353 Main Project

![PHP 7.4.8](https://badgen.net/badge/PHP/7%2e4%2e8/purple)
![Docker 19.03.12](https://badgen.net/badge/Docker/19%2e03%2e12/blue)
![MySQL 8.0.16](https://badgen.net/badge/MySQL/8%2e0%2e16/yellow)
![syntax-checker](https://github.com/gordonpn/web-career-portal-clone/workflows/syntax-checker/badge.svg)
![code-style](https://github.com/gordonpn/web-career-portal-clone/workflows/code-style/badge.svg)

## Description

### Purpose

Mock an application and job posting board, such as Indeed with the goal of learning database design and interacting with a database from a web user interface.

Basically, there are user accounts, employer accounts and admin accounts. Features are implemented appropriately for each of the account types.

An admin governs the platform, an employer creates job postings, reviews applications, etc. A user applies to jobs, browses for jobs, etc.

### About the code

The database design is normalized to third normal form.

The web application is written with vanilla PHP in MVC (model-view-controller) architectural pattern.

### Demo GIF

![Demo GIF](./docs/demo.gif)

## Development

### Instructions

PHP must be installed.

On Mac: `brew install php`

To use the make commands below, Docker must be installed.

On Mac: <https://docs.docker.com/docker-for-mac/install/>

These instructions are tested and based on \*nix based systems. Some minor modifications may be needed for Windows systems.

### Seeding the database

When the MySQL container started, the directory `sql/init` is automatically seeded and some sample data is automatically populated in to the tables.

#### Start both local server and local database

`make run` to start server and mysql, and stop both automatically on exit with <kbd>Ctrl</kbd> + <kbd>C</kbd>.

**Alternatively** `make start`, will on start both, but not stop the container on exit.

#### Start development server

`php -S localhost:9000` or `make start-server`

#### Start local mysql instance with Docker

`make start-db`

Make sure to **stop** the container when you are done with `make stop-db`

#### exec into the container to run sql

`make db`

## Authors

| Name               | GitHub                          |
| ------------------ | ------------------------------- |
| Arunraj Adlee      | https://github.com/ArunrajAdlee |
| Gordon Pham-Nguyen | https://github.com/gordonpn     |
| Leo Jr Silao       | https://github.com/leojrsilao   |
| Tiffany Zeng       | https://github.com/tiffzeng     |

## License

[MIT License](./LICENSE)
