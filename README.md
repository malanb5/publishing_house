# Publishing house project(Laravel 5.6/php 7.2.0/Vue.js 2)
version 0.1.1

## Run app

```
make start;
```
And run migration after container start
```
make refresh;
```

## Code Style

PhpStorm Settings : Open your Settings (Ctrl + Alt + S) and go to Editor > Code Style section.
Click on the Scheme wrench on the right and select Import Scheme > Intellij IDEA code style XML.
Chose /config/codestyles/Laravel.xml

## Docker

All useful commands to work with docker listed in makefile

## Mysql

- Port: 3306
- Login: user
- Password: 123321
- DB: forge

## Features

- REST response spec http://jsonapi.org/format/
- Queues with priority and processed jobs log in db
- Mailhog https://hub.docker.com/r/mailhog/mailhog/
- Carbon https://carbon.nesbot.com/#gettingstarted

- Vue-cookie
- Vue-fontawesome
- axios
- bootstrap

## Tests

To run type:
```
make test;
```

- In memory database tests

