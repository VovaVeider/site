# Основные идеи. Обзор проекта.
Этот проект направлен на создание OPENSOURSE конфигурируемого серверного приложения оформленного в виде HTTP REST API для дальнейшего использования в различных приложениях.API должно позволить строить приложения для создания,прохождения тестов, сбора статистики.Также будет представлено клиентское приложение офрмленное в виде веб-сайта использующего функии созданного API.
# Состояние проекта.Текущая реализация.
На данный момент сайт развёрнут на хостинге и может быть доступен по ссылке https://testworld.tw1.ru.

1. User guide для сайта может быть найдено на github wiki проекта (https://github.com/VovaVeider/TestPlatform.Draft_project/wiki/User-and-Admin-Guide-(Russuan-language)).
2. Подробное описание API может быть найдено на github wiki проекта (https://github.com/VovaVeider/TestPlatform.Draft_project/wiki/API-DESCRIPTION-AND-API-METHODS-(Russian-language)).
3. Deploy Guide  - в процессе написания.

На данный момент API реализовано на чистом PHP без использования фреймворков.В качестве БД используется POSTGRES.Сам сайт идущий в комплекте с API написан на HTML, CSS, Vanila JS. Обязательно использование APACHE HTTPD т.к. роутинг построен на .htaccess.  Начальный выбор стека продиктован ограничением по времени и требованиями к проекту -изначально он выполнялся в рамках студенческой учебной работы.Реализована лишь малая часть заплпнированного.Планируется переписать API на JAVA + SPRING BOOT с добавление функционала.

