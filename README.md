# Disciple.Tools Docker Setup

[Docker](https://www.docker.com/) is a container system that can be used to set up all of the infrastructure needed to run a web site. The below will setup containers locally to run:

* MySQL 5.7 database
* Apache + PHP 7.2 web server

All of this will be running on a Linux virtual machine in order to duplicate as close as possible the production hosting environment.

## Setup Instructions

1. Install Docker on your machine:
   * [MacOS](https://docs.docker.com/docker-for-mac/)
   * [Windows](https://www.docker.com/products/docker#/windows)

1. Run `docker-compose up -d` from the project root directory (or `npm run docker-start`).

   The first time this is run, it will need to download all of the machine images, so it may take a little while.
   
   You should be able to access the site via `http://localhost:8000`

1. Step through Wordpress installation process