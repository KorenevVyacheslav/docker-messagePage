## <p align='center'>Web - приложение через docker</p>

## <p align='center'> Работа с сообщениями </p>

Формулировка задания:

Необходимо реализовать следующую функциональность:

1. Пользователь просматривает список сообщений. Элемент списка отображается
   следующим образом: заголовок сообщения и краткое содержание. Постраничный вывод
   сообщений.
2. Пользователь просматривает сообщение со списком комментариев.
3. Пользователь добавляет сообщение. Сообщение состоит из:
   + заголовок;
   + автор;
   + краткое содержание;
   + полное содержание.
4. Пользователь редактирует сообщение.
5. Пользователь добавляет комментарий.

*(число сообщений на странице: 3)*

![alt text](printscreen.png)

## Используемые технологии

* Composer

* PHP 8.2

* JS

* Bootstrap 5

* Фронт: Ajax-запросы

* MySQL 8.0


## Как открыть/запустить

Клонировать https://github.com/KorenevVyacheslav/docker-messagePage в папку c вашими доменами. 
Выполнить команду:

  `docker compose up -d`

В браузере выполнить строку запроса http://localhost:84

