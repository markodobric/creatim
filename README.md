<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

- Clone the project,
- Create `.env` file from `.env.example`,
- Setup database variables with your localhost connection,
- Run `php artisan migrate`,
- Run `php artisan serve`.

Hopefully, server should be run on `http://localhost:8000`.

## UI

Sorry for my bad UI, but hope it will be enough for the presentation.

## Commands

There are two console commands that you can run:
- `php artisan creatim:create-group {individual_ids}`,
- `php artisan creatim:send-sms 'Hello Creatim' --individual={id}`.

## Test

Run test with `php artisan test`.
