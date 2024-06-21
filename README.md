<h1 align="center">Laravel ReCaptcha V3</h1>

This package just provide backend validation rule for google recaptcha v3

## Features
- Lightweight
- Simple & easy to use
- Support Laravel version >= 10
- Recaptcha validation rules

## Installation

```bash
composer require jhonoryza/recaptcha-v3
```

publish config file 

```bash
php artisan vendor:publish --tag=recaptcha-v3-config
```

## Usage

add `Recaptcha` rule to validation

```php
<?php

use Illuminate\Http\Request
use Jhonoryza\RecaptchaV3\Recaptcha;

public function store(Request $request) {
 
    $request()->validate([
     'email' => ['required', 'max:100','email'],
     'password' => ['required', 'max:100'],
     'captcha_token'  => [new Recaptcha],
    ])

}
```

update `.env` file, add you own recaptcha from [here](https://www.google.com/recaptcha/about)

```php
GOOGLE_RECAPTCHA_SITE_KEY=
GOOGLE_RECAPTCHA_SECRET_SITE_KEY=
GOOGLE_RECAPTCHA_MIN_SCORE=0.5
GOOGLE_RECAPTCHA_URL="https://www.google.com/recaptcha/api/siteverify"
```

### Security

If you've found a bug regarding security please mail [jardik.oryza@gmail.com](mailto:jardik.oryza@gmail.com) instead of
using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.