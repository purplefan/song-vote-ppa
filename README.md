# song-vote-ppa

Ports and adapters implementation in PHP (with a little Symfony 4.1 help)

## More info

[Azimo Labs Medium article](https://medium.com/azimolabs/ports-and-adapters-implementation-in-php-with-a-little-symfony-help-6d4fdbe830ba)

## Requirements
* php 7.1

## Installation

1. `$ git clone git@github.com:purplefan/song-vote-ppa.git` (or `$ git clone https://github.com/purplefan/song-vote-ppa.git`)
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