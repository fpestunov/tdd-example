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

## 03. Пишем второй тест 

Для начала нам надо получить данные из файловой системы для парсинга.

Добавляем тест `tests/FileLoaderTest.php` и инстанцируем класс FileLoader. Запустим тест `vendor/bin/phpunit tests`. RED.

Создаем класс `src/Example/FileLoader.php`. Запустим тест `vendor/bin/phpunit tests`. GREEN.

Рефакторить пока не будем.

## 04. Пишем метод чтения файла и тест

На необходимо обеспечить доступ к содержимому файла используя метод `get()` и передавая путь к файлу, как параметр.

Код будет проще поддерживать и разрабатывать, когда мы вначале определяем, как мы будем его использовать еще до того, как его реализуем.

Также создадим в папке тестовый файл, который будет читать тестовый метод.

Запускаем тест. RED.

Реализуем метод `get()` в классе `FileLoader`. Запускаем тест. Отлично - GREEN!

## 05. Рефакторинг метода чтения файла и тест

В цепочке RED - GREEN - REFACTOR назрела необходимость рефакторинга. REFACTOR.

Тест загрузки файла работает по идеальному сценарию. Но мир не идеальный. Что будет, если передать в метод `get()` файл, которого не существует?!

Давайте напишем тест, который будет проверять этот сценарий. Запускаем тест. RED.

Добавляем в метод условие на существование файла. Запускаем тест. GREEN.

## 06. Приступаем к разработке парсера

Каждый элемент синтаксиса надо парсить индивидуально. Начнем с жирного текста. Текст обернутый в две (\*\*) должен конвертироваться в жирный HTML текст.

Сначала напишем тест. Запускаем тест. RED.

Добавим метод `parseBold()` в `src/Example/MarkdownParser.php`. Напишем регулярное выражение заменяющее `**double-stared**` следующим текстом `<strong>tags</strong>`. Запускаем тест. GREEN.

Напишем следующий тест - парсинг ссылок. Запускаем тест. RED.

Добавим метод `parseLinks()` в `src/Example/MarkdownParser.php`. Запускаем тест. GREEN.

И добавим еще один тест - парсинг картинок и пройдем по тому же пути. Тест > Метод > Рефакторинг.

## 06. Тест, который тестирует все методы вместе

Напишем тест, который будет тестировать парсинг целого документа. Запускаем тест. RED.

Напишем метод `parse()` в `src/Example/MarkdownParser.php`. Запускаем тест. RED.

Ошибка?! Потому что парсинг картинок похож на парсинг ссылок. Если бы мы не использовали TDD и не сделали общий тест, то эта проблема могла вылезти в неподходящий момент.

Рефакторим метод `parse()`. Сначала парсим картинки, а потом парсим ссылки. Запускаем тест. GREEN.

Хмм. Не идеально. Если добавится еще один парсер? Перепишем метод `parse()`. Добавим массив методов, которые будет запускать парсер. Запускаем тест. GREEN.
