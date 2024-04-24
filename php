Zadania do wykonania:
1. zainstalować interpreter PHP z wsparciem dla Apache oraz MySQL

		sudo apt update
		sudo apt install php libapache2-mod-php

		sudo apt install php-mysql

2. skonfigurować serwer WWW, tak by pliki z rozszerzeniem .php były interpretowane jako programy PHP również na stronach domowych użytkowników (plik /etc/apache2/mods-available/php7.4.conf)

		sudo nano /etc/apache2/mods-available/php7.4.conf

		<FilesMatch ".+\.ph(p[3457]?|t|tml)$">
    SetHandler application/x-httpd-php
    </FilesMatch>

		sudo a2enmod php7.4
		sudo service apache2 restart

3. upewnić się, że pliki PHP są interpretowane przez serwer

		sudo service apache2 restart

4. proszę utworzyć plik test.php wykonujący polecenie PHP phpinfo() w katalogu public_html i uruchomić przez przeglądarkę
test.php z następującą zawartością:

		<?php
		phpinfo();
		?>

5. utworzyć nową bazę danych o nazwie phpbb dla forum phpBB, nadać prawa do niej użytkownikowi user1 (hasło: user1)

			sudo mysql -u root -p     <secret>

			CREATE DATABASE phpbb;
			CREATE USER 'user1'@'localhost' IDENTIFIED BY 'user1';
			GRANT ALL PRIVILEGES ON phpbb.* TO 'user1'@'localhost';
			FLUSH PRIVILEGES;


6. zainstalować forum jako nowy użytkownik w systemie o nazwie user (należy dodać do systemu operacyjnego nowego użytkownika o nazwie user)
				
				sudo adduser user

7. ściągnąć forum dyskusyjne phpBB
				
				cd ~user
				wget https://www.phpbb.com/files/release/phpBB-3.3.5.zip
				unzip phpBB-3.3.5.zip

8. usunąć plik .htaccess w katalogu phpBB3
				
				rm ~/phpBB3/.htaccess

8.5 docelowym adresem forum ma być http://adres_maszyny_wirtualnej/~user/phpBB3 
				
				cd ~/phpBB3

				Otwórz forum w przeglądarce, na przykład pod adresem http://adres_maszyny_wirtualnej/~user/phpBB3, aby rozpocząć proces instalacji i konfiguracji.

9. nadać uprawnienia zapisu do pliku konfiguracyjnego config.php
				
				chmod 666 ~/phpBB3/config.php

10. skonfigurować forum tak, aby korzystało z utworzonej bazy
11. dodać/skonfigurować użytkownika uprzywilejowanego (admin, hasło: admin1) i zwykłego (user, hasło: user123) do forum
12. zmienić ustawienia forum tak, by posty domyślnie pojawiały się bez akceptacji administratora

				Skonfigurowanie forum do korzystania z utworzonej bazy danych:

Podczas procesu instalacji forum phpBB, w odpowiednich krokach będziesz musiał podać dane dostępowe do bazy danych. Użyj nazwy użytkownika, hasła i nazwy bazy danych, które wcześniej utworzyłeś.
Dodanie użytkowników:

Zaloguj się do panelu administracyjnego forum phpBB.
Przejdź do sekcji zarządzania użytkownikami.
Dodaj nowego użytkownika "admin" z hasłem "admin1" i nadaj mu odpowiednie uprawnienia administracyjne.
Dodaj nowego użytkownika "user" z hasłem "user123" i nadaj mu odpowiednie uprawnienia.
Zmiana ustawień dotyczących postów:

Zaloguj się do panelu administracyjnego forum phpBB.
Przejdź do sekcji zarządzania ustawieniami forum.
Znajdź odpowiednie opcje dotyczące moderacji postów lub ustawień zatwierdzania postów i zmień je tak, aby posty domyślnie pojawiały się bez konieczności akceptacji przez administratora.


				
Warunki powodzenia:

1. zalogować się pod adresem http://adres_maszyny_wirtualnej/~user/phpBB3 jako użytkownik uprzywilejowany i utworzyć nowe forum
2. zalogować się jako użytkownik zwykły i dodać nowego posta w utworzonym forum



http://20.224.67.199/~user/phpBB3/

				admin
				admin1
