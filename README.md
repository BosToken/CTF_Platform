<p align="center"><img src="./public/img/title.png" width="300"></p>

## What is Legicomp

Legium Competition or abbreviated as LEGICOMP is a work program that provides a forum for competent Kaliber members to take part in competitions. LEGICOMP functions to facilitate all competitors' needs for competitions such as academic training, space, etc.


## What is this platform made for?

This platform was created to support and simplify the LEGICOMP work program.

## Features on the platform

Features available on this platform include:

- CTF platform
- Team management
- Competition management
- Reporting training results

## Project requirement

To develop this system you need:

- PHP 8.1 <=
- Composer 2.2 <=
- Node 12 <=

## Setup and installation

Follow these steps to install this system

### Clone repository

Do a clone to create a local repository.

```
git clone https://github.com/BosToken/CTF_Platform.git
```

### Package install

Do this command to install the package.

```
composer install
```
```
npm install 
```

### Environment Configuration

Setup the configuration by copying the `.env.example` file and changing the file name to `.env`. adjust the configuration on your system.

### Database migration

After setup and configuration, migrate the database and data by executing the command.

```
php artisan migrate:fresh --seed
```

### Running the system

After that, run the system by executing the command.

```
php artisan serve
```

```
npm run dev
```

## Contributing

To make a contribution, please pay attention to the contribution provisions of the organization 😉. If you are willing to follow our rules, you can contact.

[@BosToken](https://github.com/BosToken) [@Mightinity](https://github.com/Mightinity)

Enjoy Code !!