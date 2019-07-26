[![Build Status](https://travis-ci.org/xRubin/unapi-kontur.svg?branch=master)](https://travis-ci.org/xRubin/unapi-kontur)
# Unapi Kontur
Модуль для работы с сервисами [СКБ Контур](https://kontur.ru)

Являтся частью библиотеки [Unapi](https://github.com/xRubin/unapi)

### Подключение к Api сервиса контур.призма
```php
use unapi\kontur\prism\api\Service;

$service = new Service();
```

### Аутентификация
Для получения ключей доступа требуется заключить договор.

```php
use unapi\kontur\prism\api\Credentials;

$credentials = new Credentials('example@example.com', 'password', '31e94610-021a-42e2-b71d-3cf8250e4571', '4d529cb4-757f-be41-834f-c35af2d7e1d1');
$service->auth($credentials);
```

### Статистика по API ключу

```php
use unapi\kontur\prism\api\responses;

/** @var responses\ApiKeysResponseInterface $result */
$result = $service->auth($credentials)->then(function (Credentials $credentials) use ($service) {
    return $service->getApiKeys($credentials);
})->wait();
```

### Получение текущего аутентифицированного пользователя

```php
use unapi\kontur\prism\api\responses;

/** @var responses\AuthUserResponseInterface $result */
$result = $service->auth($credentials)->then(function (Credentials $credentials) use ($service) {
    return $service->getAuthUser($credentials);
})->wait();
```