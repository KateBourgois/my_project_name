# README
Download en installeer `XAMPP (for Windows)` in de directory `C:\xampp`:
(https://www.apachefriends.org/xampp-files/7.0.13/xampp-win32-7.0.13-0-VC14-installer.exe)

Download en installeer `Composer` : https://getcomposer.org/Composer-Setup.exe
Download `Symfony` : http://symfony.com/download

# Om `Symfony` te instaleren, gebruik XAMPP Shell comand line:

>Installatie voor `Windows`:
```sh
  - cd C:\xampp\htdocs
 -  php -r "file_put_contents('symfony', file_get_contents('https://symfony.com/installer'));"
 - php symfony new my_project
```
# (`NIET` gewoon kopiëren `'my_project'` bestanden naar  C:\xampp\htdocs) !

>iNDIEN symfony volgende fout geeft "certificate issue":
> Kopiër 'cacert.pem' naar `C:\xampp\htdocs`
> Open XAMPP `Control Panel> Apache> Config> php.ini`  verander/of voeg een regel: 
`curl.cainfo = "C:\xampp\htdocs\cacert.pem"`

# Na Symfony de folder 'my_project' gemaakt heeft:

 -  Unzip het bestand dat ik gestuurd heb op uw bureaublad.


> Kopiër  de folder `'FOS'` van  `\Desktop\my_project\src\` naar `C:\xampp\my_project\src`
 - Ga naar `\Desktop\my_project\app\config\ `:
> Kopiër de bestanden:
>`security.yml`
>`routing.yml`
>`parameters.yml`
>`config.yml`
 van  `\Desktop\my_project\app\config\ ` naar `C:\xampp\my_project\app\config\`

 - Ga naar `\Desktop\my_project\app\ `:
> Kopiër het bestand `'AppKernel.php'` van  `\Desktop\my_project\app\ ` naar `C:\xampp\my_project\app\`
 - Ga naar `\Desktop\my_project\src\AppBundle\`:
>Kopiër de folder:
> `'Entity'` van `\Desktop\my_project\src\AppBundle\` naar `C:\xampp\htdocs\my_project\src\AppBundle\`


 -  Open XAMPP `Control Panel> MySQL> Admin> ` en creëer een databank `'securitas'`

 - Voer (Run) volgende opdrachten uit, gebruik `XAMPP Shell comand line`: 
```sh
cd C:\xampp\htdocs\my_project
php bin/console doctrine:schema:update --force
```
- Ga naar `\Desktop\my_project\web\`:
> Kopiër de folders `'css'` en `'img'` van  `\Desktop\my_project\web\` naar `C:\xampp\htdocs\my_project\web`

- Ga naar `\Desktop\my_project\app\Resources\views`:
> Kopiër de bestanden:
>`registreren.html.twig`
>`inloggen.html.twig`
>`game.html.twig`
van `\Desktop\my_project\app\Resources\views` naar `C:\xampp\htdocs\my_project\app\Resources\views`

- Ga naar `\Desktop\my_project\src\AppBundle\Controller\`:
> Kopiër bestanden:
>`InloggenController.php`
>`GameController.php`
>`RegistrerenController.php`
>van `\Desktop\my_project\src\AppBundle\Controller\` naar `C:\xampp\htdocs\my_project\src\AppBundle\Controller\`

#  Je bent helemaal klaar. Open URL: http://localhost/my_project/web/app_dev.php/registreren

- Bestanden die ik gecreëerd heb voor de test:
web/css/main.css
{# app/Resources/views/registreren.html.twig #}
{# app/Resources/views/inloggen.html.twig #}
{# app/Resources/views/game.html.twig #}
// src/AppBundle/Entity/TaskDB.php
// src/AppBundle/Controller/InloggenController.php
// src/AppBundle/Controller/GameController.php
// src/AppBundle/Controller/RegistrerenController.php

# Aan het wiel draaien, hoe werkt het:

> 10 Willekeurige resultaten, gebaseerd op de gegeven winnende parameters, worden gegenereerd.
> Als 7 van 10 willekeurige resultaten gelijk zijn  "1x reis naar Las Vegas" - dan wint de gebruiker "1x reis naar Las Vegas".
> Als 6 van 10 willekeurige resultaten gelijk zijn  "10x vouchers van 200 euro" - dan wint de gebruiker "10x vouchers van 200 euro".
> Als 5 van 10 willekeurige resultaten gelijk zijn  "100x vouchers van 100 euro" - dan wint de gebruiker "100x vouchers van 100 euro".
> Als 3 van 10 willekeurige resultaten gelijk zijn  "1000x vouchers van 10 euro" - dan wint de gebruiker "1000x vouchers van 10 euro".



