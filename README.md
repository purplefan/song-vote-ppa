# song-vote-ppa

Ports and adapters implementation in PHP (with a little Symfony 4.1 help)

## Requirements
* composer
* php 7.1

## Installation

1. clone the repo
2. `$ php composer.phar install`

## Run
```bash
$ php bin/console server:run
```
Endpoints:
```
http://127.0.0.1:8000/songs/list
http://127.0.0.1:8000/vote/{songId}/{score} eg. http://127.0.0.1:8000/vote/1/9
http://127.0.0.1:8000/votes/list

```