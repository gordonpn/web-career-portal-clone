# COMP 353 Main Project

## Instructions

PHP must be installed.

On Mac: `brew install php`

To use the make commands below, Docker must be installed.

On Mac: <https://docs.docker.com/docker-for-mac/install/>

### Start development server

`php -S localhost:9000` or `make start-server`

### Start local mysql instance with Docker

`make start-db`

**Make sure to stop the container when you are done** with `make stop-db`

### exec into the container to run sql

`make db`
