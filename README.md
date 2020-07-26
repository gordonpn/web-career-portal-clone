# COMP 353 Main Project

## Instructions

PHP must be installed.

On Mac: `brew install php`

To use the make commands below, Docker must be installed.

On Mac: <https://docs.docker.com/docker-for-mac/install/>

### Start both local server and local database

`make run` to start server and mysql, and stop both automatically on exit with <kbd>Ctrl</kbd> + <kbd>C</kbd>.

**Alternatively** `make start`, will on start both, but not stop the container on exit.

### Start development server

`php -S localhost:9000` or `make start-server`

### Start local mysql instance with Docker

`make start-db`

Make sure to **stop** the container when you are done with `make stop-db`

### exec into the container to run sql

`make db`
