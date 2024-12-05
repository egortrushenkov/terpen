# Пустой шаблон для старта нового проекта

обработчик форм пожизненно
```
    /ajax/php/submit-handler.php
```

## Кастомные компоненты

всегда имеют шаблон custom

- меню
- хлебные крошки
- пагинация 

## Классы
- Kit
- KitHL

## Модуль студии KIT
подключение
```php
    <?use Bitrix\Main\Config\Option;?>
```
вызов
```php
    <?=Option::get("stdkit.settings", "main_phone");?>
```
Дефолтные поля:
- main_phone
- email

Настройка табов внутри, закомментирована

подробнее https://stdkitlab.ru/stdkit/kit_sasha23rus/src/branch/modules

## init.php
подклчен autoload
- printr()
- makeWebp()
- t_me()
- getYoutubeThumbnail()
