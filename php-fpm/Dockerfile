FROM php:8.2-fpm

# каждый run - это новый слой
# обновляет список доступных пакетов из репозиториев, указанных в файлах конфигурации /etc/apt/sources.list и /etc/apt/sources.list.d/
# В данном случае, apt-get install будет выполняться только после успешного выполнения apt-get update.
# Это предотвращает попытку установить пакеты, о которых apt-get не имеет информации.
# y: Опция -y (или --yes) автоматически отвечает "yes" на все запросы, требующие подтверждения установки.

#libpq-dev: Заголовочные файлы и библиотеки, необходимые для разработки приложений на C/C++, использующих PostgreSQL (клиентская библиотека). PHP-расширение pgsql (для работы с PostgreSQL) требует наличия libpq-dev.
#wget: Утилита для скачивания файлов из сети (по протоколам HTTP, HTTPS, FTP и др.). Может понадобиться для скачивания каких-либо дополнительных ресурсов во время сборки образа.
#zlib1g-dev: Заголовочные файлы и библиотеки для работы с библиотекой zlib (сжатие данных). PHP-расширения, связанные с обработкой сжатых данных (например, zlib), требуют zlib1g-dev.
#libzip-dev: Заголовочные файлы и библиотеки для работы с библиотекой libzip (для создания и распаковки ZIP-архивов). PHP-расширение zip требует libzip-dev.
#openssl: (Вероятно, означает libssl-dev) Заголовочные файлы и библиотеки для работы с OpenSSL (библиотекой криптографии). Многие PHP-расширения, связанные с безопасностью и шифрованием (включая openssl), требуют libssl-dev. Название openssl без префикса lib немного нетипично, но, скорее всего, apt-get установит пакет libssl-dev, который предоставляет необходимые файлы.
#libpng-dev: Заголовочные файлы и библиотеки для работы с библиотекой libpng (для работы с изображениями в формате PNG). PHP-расширение gd (для обработки изображений) может использовать libpng.
#libicu-dev: Заголовочные файлы и библиотеки для работы с ICU (International Components for Unicode). PHP-расширение intl (для интернационализации) требует libicu-dev. Мы видели это в предыдущем примере.
#libfreetype6-dev: Заголовочные файлы и библиотеки для работы с FreeType (библиотекой для рендеринга шрифтов). PHP-расширение gd (для обработки изображений) может использовать FreeType для работы с текстом на изображениях.
#libjpeg-dev: Заголовочные файлы и библиотеки для работы с библиотекой libjpeg (для работы с изображениями в формате JPEG). PHP-расширение gd (для обработки изображений) может использовать libjpeg.

RUN apt-get update  &&  apt-get install -y \
    libpq-dev \
    wget \
    zlib1g-dev \
    libzip-dev \
    openssl \
    libpng-dev \
    libicu-dev \
    libfreetype6-dev \
    libjpeg-dev \
    nano
RUN pecl install  xdebug \
    && docker-php-ext-enable xdebug

# docker-php-ext-configure – это вспомогательный скрипт, предоставляемый официальными образами PHP для Docker
#intl – это расширение PHP, которое предоставляет поддержку интернационализации (i18n), то есть позволяет разрабатывать приложения, поддерживающие различные языки, локали и форматы данных (даты, время, числа, валюты и т. д.). Оно предоставляет классы и функции для работы с:
#Форматированием дат и времени (DateFormatter)
#Форматированием чисел и валют (NumberFormatter)
#Сравнением строк с учетом локали (Collator)
#Кодировками символов
#И многим другим.
RUN docker-php-ext-configure intl
# GD is a PHP extension that provides image processing capabilities, such as creating and manipulating images (e.g., JPEG, PNG, GIF).
RUN docker-php-ext-configure gd \
    --with-jpeg=/usr/include/ \
    --with-freetype=/usr/include/

RUN docker-php-ext-install pdo pdo_mysql gd intl

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY config/docker-php-ext-enable.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# **Добавляем строку для копирования php.ini**
RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

#создаем папку для логов
RUN mkdir -p /var/log/php-fpm && chown www-data:www-data /var/log/php-fpm
#задаём рабочую папку приложения, и все инструкции в Dockerfile будут выполняться относительно неё
# /www: Это путь к директории внутри контейнера Docker. Это абсолютный путь, начинающийся от корневого каталога (/).
#Если директория /www не существует, она будет создана при запуске Dockerfile.
WORKDIR /www

#RUN pecl install xdebug-3.2.0 && docker-php-ext-enable xdebug


