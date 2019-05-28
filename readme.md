# Пример использования TDD

> TDD - Test Driven Development

Используя TDD создадим простой класс, который будет парсить markdown (*.md Files)

## 01. В начале...

- создадим файл `composer.json` и добавим зависимость `phpunit`
- установим зависимости, выполнив команду `composer install`
- теперь все готово к началу проекта

Дополнительные материалы:
- https://phpunit.readthedocs.io/en/8.1/installation.html
- https://phpunit.readthedocs.io/ru/latest/writing-tests-for-phpunit.html

## 02. Пишем первый тест

Сначала мы напишем тест `tests/MarkDownParserTest.php`, инстанцирующий класс MarkdownParser. Подождите?! Этого класса не существует! 

Да, не существует, потому что мы пишем тест в первую очередь.

> Идея следущая - подход в разработке будет таким:
> RED - GREEN - REFACTOR 

Сначала мы пишем тест с ожидаемой нас функциональностью и запускаем тест командой `vendor/bin/phpunit tests`. Результат теста будет RED. Потому, что у нас еще нет основного кода.

Создадим класс `src/Example/MarkdownParse.php`. Он пустой, но этого достаточно для прохождения теста. Это следующий шаг - GREEN.

Теперь, когда тесты проходят мы можем перейти к шагу REFACTOR. Постепенно улучшая наш код, зная, что есть тест, который следит за выполнением этой функциональности.
