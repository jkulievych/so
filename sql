Zadania do wykonania
instalacja serwera bazy danych MySQL
  sudo apt-get install mysql-server

sprawdzenie konfiguracji serwera, czy dane są przechowywane w katalogu /var/lib/mysql - jest to domyślna lokalizacja (plik konfiguracyjny w /etc)
sprawdzenie statusu serwera - czy jest uruchomiony?
    sudo service mysql status

zmiana sposobu autentykacji dla użytkownika root z auth_socket na mysql_native_password oraz zmiana hasła na “secret” (link)
    mysql -u root -p
    
    ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'secret';
    FLUSH PRIVILEGES;


utworzenie nowej bazy danych o nazwie “epi”
    CREATE DATABASE epi;

utworzenie konta dla użytkownika “user1” z hasłem “user1” z dostępem do bazy “epi” (wszystkie prawa modyfikacji bazy)
od wersji MySQL 8 należy osobno utworzyć użytkownika i osobno nadać mu uprawnienia: https://stackoverflow.com/a/50197630 - tu na przykładzie użytkownika root
    CREATE USER 'user1'@'localhost' IDENTIFIED BY 'user1';
    GRANT ALL PRIVILEGES ON epi.* TO 'user1'@'localhost';
    FLUSH PRIVILEGES;

usunięcie bazy test, jeśli istnieje
    DROP DATABASE IF EXISTS test;

<---------------------------------------------------------------------------->
Warunki powodzenia
po restarcie systemu serwer bazodanowy działa
    sudo service mysql status

użytkownik “root” oraz “user1” nie mogą zalogować się bez podania hasła
    mysql -u root

logując się jako użytkownik “root” można utworzyć nową bazę danych
    mysql -u root -p
    CREATE DATABASE IF NOT EXISTS nowa_baza;

logując się jako użytkownik “user1” do bazy “epi” można utworzyć nową tabelę oraz można przeglądać zawartość tabeli
    mysql -u user1 -p
    USE epi;
    CREATE TABLE IF NOT EXISTS nowa_tabela (id INT AUTO_INCREMENT PRIMARY KEY, nazwa VARCHAR(255));

logując się jako użytkownik “user1” nie można tworzyć nowej bazy danych
    CREATE DATABASE IF NOT EXISTS nowa_baza;
