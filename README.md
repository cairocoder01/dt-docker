# Disciple.Tools Docker Setup

[Docker](https://www.docker.com/) is a container system that can be used to set up all of the infrastructure needed to run a web site. The below will setup containers locally to run:

* MySQL 5.7 database
* Apache + PHP 7.2 web server

All of this will be running on a Linux virtual machine in order to duplicate as close as possible the production hosting environment.

## Setup Instructions

1. Install Docker on your machine:
   * [MacOS](https://docs.docker.com/docker-for-mac/)
   * [Windows](https://www.docker.com/products/docker#/windows)

1. To set up a self-signed SSL certificate, follow the instructions [here](https://medium.com/@nh3500/how-to-create-self-assigned-ssl-for-local-docker-based-lamp-dev-environment-on-macos-sierra-ab606a27ba8a)
   1. Site will be available on [https://local.disciple.tools](https://local.disciple.tools) (if you add the needed hosts file mapping) or [https://localhost:44300](https://localhost:44300)

1. Run `docker-compose up -d` from the project root directory (or `npm run docker-start`).

   The first time this is run, it will need to download all of the machine images, so it may take a little while.
   
   You should be able to access the site via [https://local.disciple.tools](https://local.disciple.tools) (if you add the needed hosts file mapping) or [https://localhost:44300](https://localhost:44300)

1. Step through Wordpress installation process

1. Install Theme: https://github.com/DiscipleTools/disciple-tools-theme

1. Install plugins
   1. https://github.com/DiscipleTools/disciple-tools-demo-content
   1. https://github.com/WP-API/Basic-Auth
   1. https://wordpress.org/plugins/jwt-authentication-for-wp-rest-api/
      1. Follow directions on plugin page to add auth header config to .htaccess
      1. Follow directions on plugin page to add 2 values to wp-config.php

1. Enable debugging
   1. Edit wp-config.php to add the following values:
      ```php
      define( 'WP_DEBUG', true ); // Enable WP_DEBUG mode
      define( 'WP_DEBUG_LOG', true ); // Enable Debug logging to the /wp-content/debug.log file     
      ```
      
## Multi-site Setup

See [https://www.wpbeginner.com/glossary/multisite/](https://www.wpbeginner.com/glossary/multisite/)

1. Add the following to `wp-config.php`
   ```php
   /* Multisite */
   define('WP_ALLOW_MULTISITE', true);
   ```
1. Go to `Tools -> Network Setup` and follow on-screen directions, adding the necessary code to `.htaccess` and `wp-config.php`
1. After changes, login again and return to wp-admin.
1. A new My Sites item appears in the top menu. Go to `My Sites -> Network Admin -> Dashboard`
// 1. Copy `disciple-tools-multisite.php` into `wp-content/plugins/disciple-tools-multisite` 
1. Add all of the sites as you desire.
   1. For each site you add, add the needed entry to your local hosts file (e.g. `127.0.0.1   site1.local.disciple.tools`)
   