# Ticket Widget — Полная документация

## Описание

Guest Ticket Widget позволяет **неавторизованным Customer** отправлять тикеты через форму с возможностью прикреплять файлы.

Особенности:

- Поля: `name`, `email`, `phone` (формат E.164), `subject`, `text`
- Создание Customer, если он не существует
- Прикрепление нескольких файлов
- Валидация через отдельный `FormRequest`
- Сохранение файлов через `spatie/laravel-medialibrary`
- Развёртывание через iframe
- Стилизация под основную тему проекта
- Лёгкая интеграция с Livewire и API

## 1. Установка и миграции

### Установить зависимости
composer install
npm install && npm run dev

### Миграции и сидеры
php artisan migrate
php artisan db:seed

### Запустить локальный сервер
php artisan serve

## Тестовые данные
Находятся в файлах сидеров в папке database\seeders.
Перечень:

- RolePermissionSeeder;
- UserSeeder;
- CustomerSeeder;
- TicketSeeder;

## Пример вставки виджета.
```
<iframe src="https://your-site.com/widget" width="100%" height="700" frameborder="0"></iframe>
```

## Пример API-запроса.

https://your-site.com/api/widget

{
"_token": "GO3VTbjZDdZcISqcMSgRauc3baJ8aXkzKgkftb2f",
"components": [
{
"snapshot": "{\"data\":{\"name\":\"htjythjyrtr\",\"email\":\"test@test.com\",\"phone\":\"+1234567890123\",\"subject\":\"gewrgfwrfw\",\"text\":\"yhy5hg54eg54\",\"files\":[[[\"livewire-file:R7IBkkZDd3M2HFfAXZBepUMqtNPSvD-metaNjk2RDhCMTBCQzEyREYwQjA3QzRGRTkxMTFCNTBCNzZfc2hhcmVfMC5qcGc=-.jpg\",{\"s\":\"fil\"}]],{\"s\":\"arr\"}]},\"memo\":{\"id\":\"lpXMkzlmnLjoHSI4Kcja\",\"name\":\"ticket-widget\",\"path\":\"widget\",\"method\":\"GET\",\"children\":[],\"scripts\":[],\"assets\":[],\"errors\":[],\"locale\":\"ru\"},\"checksum\":\"cb87731399edcb08d25e88b6e32a77db5b9a87905559c27ac9ecc21fdc3db57d\"}",
"updates": {},
"calls": [
{
"path": "",
"method": "submit",
"params": []
}
]
}
]
}

### Ответ
{
"components": [
{
"snapshot": "{\"data\":{\"name\":null,\"email\":null,\"phone\":null,\"subject\":null,\"text\":null,\"files\":[[],{\"s\":\"arr\"}]},\"memo\":{\"id\":\"lpXMkzlmnLjoHSI4Kcja\",\"name\":\"ticket-widget\",\"path\":\"widget\",\"method\":\"GET\",\"children\":[],\"scripts\":[],\"assets\":[],\"errors\":[],\"locale\":\"ru\"},\"checksum\":\"c58a70c4d66722dd731936b9c45ab7b55ebbcd4c428761b90b087345c6eaae49\"}",
"effects": {
"returns": [
null
],
"html": "<div wire:id=\"lpXMkzlmnLjoHSI4Kcja\" x-data=\"{ open: false }\" class=\"max-w-lg mx-auto\">\n\n    <!-- \u041a\u043d\u043e\u043f\u043a\u0430 \u0440\u0430\u0441\u043a\u0440\u044b\u0442\u0438\u044f -->\n    <button @click=\"open = !open\"\n            class=\"widget-button w-full px-4 py-2 rounded font-semibold transition-colors\">\n        <span x-text=\"open ? '\u0421\u0432\u0435\u0440\u043d\u0443\u0442\u044c \u0444\u043e\u0440\u043c\u0443 \u0442\u0438\u043a\u0435\u0442\u0430' : '\u041e\u0442\u043f\u0440\u0430\u0432\u0438\u0442\u044c \u0442\u0438\u043a\u0435\u0442'\"><\/span>\n    <\/button>\n\n    <!-- \u0424\u043e\u0440\u043c\u0430 -->\n    <div x-show=\"open\" x-transition class=\"widget-form mt-4 p-6\">\n        <h2 class=\"text-xl font-semibold mb-4 text-gray-800\">\u041e\u0442\u043f\u0440\u0430\u0432\u0438\u0442\u044c \u0442\u0438\u043a\u0435\u0442<\/h2>\n\n        <!--[if BLOCK]><![endif]-->            <div class=\"mb-4 text-green-600 font-semibold\">\u0422\u0438\u043a\u0435\u0442 \u0443\u0441\u043f\u0435\u0448\u043d\u043e \u043e\u0442\u043f\u0440\u0430\u0432\u043b\u0435\u043d!<\/div>\n        <!--[if ENDBLOCK]><![endif]-->\n\n        <!--[if ENDBLOCK]><![endif]-->\n\n        <!-- \u041f\u043e\u043b\u044f \u0444\u043e\u0440\u043c\u044b -->\n        <!--[if BLOCK]><![endif]-->            <div class=\"mb-3\">\n                <label class=\"block text-gray-700 mb-1\">\u0418\u043c\u044f<\/label>\n                <input type=\"text\"\n                       wire:model=\"name\"\n                       class=\"border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500\">\n                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->\n            <\/div>\n                    <div class=\"mb-3\">\n                <label class=\"block text-gray-700 mb-1\">Email<\/label>\n                <input type=\"email\"\n                       wire:model=\"email\"\n                       class=\"border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500\">\n                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->\n            <\/div>\n                    <div class=\"mb-3\">\n                <label class=\"block text-gray-700 mb-1\">\u0422\u0435\u043b\u0435\u0444\u043e\u043d (E.164)<\/label>\n                <input type=\"text\"\n                       wire:model=\"phone\"\n                       class=\"border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500\">\n                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->\n            <\/div>\n                    <div class=\"mb-3\">\n                <label class=\"block text-gray-700 mb-1\">\u0422\u0435\u043c\u0430<\/label>\n                <input type=\"text\"\n                       wire:model=\"subject\"\n                       class=\"border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500\">\n                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->\n            <\/div>\n        <!--[if ENDBLOCK]><![endif]-->\n\n        <!-- \u0422\u0435\u043a\u0441\u0442 -->\n        <div class=\"mb-3\">\n            <label class=\"block text-gray-700 mb-1\">\u0422\u0435\u043a\u0441\u0442<\/label>\n            <textarea wire:model=\"text\" class=\"border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500\"><\/textarea>\n            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->\n        <\/div>\n\n        <!-- \u0424\u0430\u0439\u043b\u044b -->\n        <div class=\"mb-3\">\n            <label class=\"block text-gray-700 mb-1\">\u0424\u0430\u0439\u043b\u044b<\/label>\n            <input type=\"file\" wire:model=\"files\" multiple\n                   class=\"border border-gray-300 rounded px-3 py-2 w-full\">\n            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->\n            <div wire:loading wire:target=\"files\" class=\"text-gray-500 mt-1\">\u0417\u0430\u0433\u0440\u0443\u0437\u043a\u0430...<\/div>\n        <\/div>\n\n        <button wire:click=\"submit\"\n                class=\"w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700 transition-colors\">\n            \u041e\u0442\u043f\u0440\u0430\u0432\u0438\u0442\u044c \u0442\u0438\u043a\u0435\u0442\n        <\/button>\n    <\/div>\n\n<\/div>\n",
"partials": []
}
}
],
"assets": []
}