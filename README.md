#### 
Requirements [
Php>= 5.6*
MySql
]

_Для развертывания сайта скопируйте все содержимое этой директории в 
директорию в которой работает ваш сервер. Все запросы поступающие в эту
директорию будут обрабатываться файлом .htacces и перенаправляться 
в папку webroot. В папке webroot будет запущен index.php который 
являеться точкой входа в приложение.

Создайте базу данных с именем `dream` и импортируйте туда dream.sql находящийся
в этой корневой директории. Если Вы желаете импортировать данные в БД с другим 
именем то смените имя database_name в Config\db.yml. Также в этом файле Вам 
следует указать отсальные параметры. 
Пример
        database_host: localhost
        database_user: root
        database_name: dream
        database_password:
        
Стартовый роут для запуска сайта '/'.
Перед Вами будет форма для входа. Введите логин и пароль:

login: admin@admin
pass: 123qwe

В приложении реализован паттерн проектирования MVC.
Контроллер обрабатывает запрос, при необходимости получает либо передает данные в БД
с помощью Модели. Модель использует сущность при получении данных из БД.

Реализованы CRUD методы. Удаление происходит с использыванием AJAX.
Остальные действия с перезагрузкой страницы и редиректом.
Использованы стили Bootstrap4, библиотека jQuery.