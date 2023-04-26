# Smart Tech

Directory MAMP/htdocs/Smart-Tech/public

Admin:
username: sarah93
password: sarah12345

## Beschreibung

Smart Tech ist eine Blog-Seite für Smartphones und Zubehör wo man Artikel lesen und seine Meinung durch einen Post oder Kommentar äußern kann.
Die Webseite beinhaltet Home, Contact, About, Login und Register für die Nutzer die nicht eingeloggt sind.
Für die eingeloggte Nutzer steht die Communitybereich zur verfügung, da könnten sie ihre Artikel lesen, kommentieren und liken.
Auserdem können sie ihren eigenen Artikel Bzw. Post erstellen, bearbeiten und löschen.

### der Struktur des Projektes

Das Projekt wurde mit Bootstrap, PHP und MySQL erstellt. Die Datenbank ist in der Datei "smarttech.sql" zu finden.
dafür wurde die OOP-Programmierung und das Entwurfsmuster MVC (Model-View-Controller) verwendet.

MVC dient dazu, die einzelnen Komponenten einer Anwendung zu trennen und so eine klare Trennung zwischen der Logik und der Darstellung zu erreichen.

das Projekt besteht aus 3 Hauptordner: app (Enthält die Controller, Models und Views) für die Entwiclungsphase , public (Enthält die CSS, JS und Bilder) für die Produktionsphase und vendor (Enthält die Frameworks unteranderem composer).

- app

  - Controllers
    - HomeController
    - PostController
    - UserController
    - LoginController
    - RegisterController
    - ContactController
    - AboutController
  - Models
    - Post
    - User
    - Comment
  - Views
    - Home
    - Post
    - Login
    - Register
    - Contact
    - About

- public

  - css
    - style.css
  - index.php
  - .htaccess

- vendor

  - composer
    - autoload.php

- composer.json
- composer.phar
- Readme.md

### Funktionalitäten

in Models befinden sich die Datenbankverbindung, die Datenbankabfragen und die Klassen die den großen Logik haben.
also den Zugriff auf die Datenbanktabellen habe ich in Models erstellt und die Meisten Tabellen haben eine eigene Model-Klasse, die Anfragen auf die entsprechende Tabelle steuert.
außerdem hat jede Model-Klasse eine eigene Methode, die die Datenbankabfrage ausführt und die Daten zurückgibt.

in der User-Klasse gibt es die Eigenschaften für den User und die Methoden, die die Datenbankabfragen ausführen und die Daten zurückgeben.
zum Beispiel gibt es die Methode 'register' die die Daten in der Datenbank speichert und die Methode 'login' die die Daten aus der Datenbank abfragt und die Daten zurückgibt.
zusätzlich gibt es die getter und setter Methoden für die Eigenschaften.

in Views befinden sich das HTML das in den Seiten dargestellt werden.
view dient dazu, die Logik und die Darstellung zu trennen und die Logik in den Controller zu verschieben.
in views gibt es unterordner für partials, die wiederum die Header und Footer enthalten. somit wird die Wiederverwendung von Code ermöglicht.

in Controller befinden sich Klassen, die die Logik implementieren.

in RegisterController wird anhand der Request-Klasse überprüft ob die Request-Methode POST ist. wenn ja, wird es Mithilfe der FormValidation-Klasse überprüft, ob das Formular ausgefüllt wurde und ob die Passwörter übereinstimmen.
wenn ja, wird die Methode 'register' der User-Klasse aufgerufen und die Daten werden in der Datenbank gespeichert.

```php
public function index(Request $request)
    {
        $db = new Database;

        if ($request->getmethod() === 'POST') {
            $formInput = $request->getInput();
            $validation = new FormValidation($formInput, $this->db);

            $validation->setRules([
                'firstName' => 'required|min:2|max:32',
                'lastName' => 'required|min:2|max:32',
                'email' => 'required|email|available:users',
                'gender' => 'required',
                'city' => 'required|min:2|max:32',
                'country' => 'required|in:holland, germeny, austria, france, italy, spain, switzerland',
                'username' => 'required|min:2|max:32|available:users',
                'password' => 'required|min:6',
                'passwordConfirmation' => 'required|matches:password',
                'termOfService' => 'required'
            ]);

            $validation->validate();

            if ($validation->fails()) {
                $this->view->render('register', [
                    'errors' => $validation->getErrors()
                ]);
                return;
            }



            $this->user->register($formInput);
            Session::flash('message', 'You are registered successfully and can now login.');
            $this->redirectTo('/login');
        }
    }
```

in Helpers Ordner befinden sich Klassen, die uns bei der Entwicklung helfen. Zum beispiel die Session-klasse hat die Methoden für die Session zu starten, zu beenden und die Session-Daten zu löschen.
in CSRF-Klasse wird die CSRF-Token in der Session gespeichert.
in Str Klasse gibt es die Methoden für camleCase, snakeCase und CSRF-Token generieren.

in BaseController wird die Datenbankverbindung hergestellt und die Überprüfung ob der User eingeloggt ist. So können alle Controller darauf zugreifen weil es eine Elternklasse ist.
noch wird die Methode 'index' abstract definiert, damit die Subklassen die Methode implementieren müssen.

in App-Klasse wird die Klassen 'Request' und 'Router' instanziiert und die getter Methoden für 'Router' aufgerufen. also wird die URL in der Router-Klasse anhand der 'parseUrl' Methode aufgerufen und die entsprechende Controller-Methode wird aufgerufen.

in Request-Klasse wird die Request-Methode und die Request-URI abgefragt und die getter Methoden für die Eigenschaften aufgerufen.

password wird mit der Methode 'password_hash' gehasht und in der Datenbank gespeichert.

die Datei .htaccess wird verwendet um die URL zu verschönern. also wird die URL ohne index.php aufgerufen.

um die klassen zu laden, habe ich die composer.json Datei erstellt, die composer runtergeladen und die autoload.php Datei in der index.php Datei eingebunden.

```json
{
  "autoload": {
    "psr-4": {
      "App\\": "app/"
    }
  }
}
```

### Datenbank

die Datenbankverbindung wird mit PDO wegen der Vermeidung von SQL-Injections hergestellt und die Datenbankabfragen werden mit PDOStatement ausgeführt.

die Datenbank besteht aus 5 Tabellen: users, posts, post_images, post_comments, posts_likes, login_attempts, roles und users_roles.

da ein User mehrere Posts und Comments haben kann, wurde in der posts-Tabelle und der post_comments-Tabelle die user_id Spalte als Forgien-key gesetzt.
in der Tabellen die, die post_id und/oder user_id Spalte beinhalten, wurde ein Forgien-key gesetzt. somit wird auf die post-Tabelle, user-Tabelle, Login_Attempts-Tabelle und Users_Roles-Tabelle die id Spalte referenziert.

die user-Tabelle hat 1:n Beziehung mit der post-Tabelle, Post_Comments-Tabelle, Login_Attempts-Tabellen und Users_Roles-Tabelle.
die post-Tabelle hat 1:n Beziehung mit der post_images-Tabelle und Post_Comments-Tabelle.

created_at, commented_at und posted_at Spalten wurden hinzugefügt, um die Zeit zu speichern, wann die Daten in der Datenbank gespeichert wurden und wann die Daten in der Datenbank aktualisiert wurden.

Users-Tabelle hat die Spalten: id, username, email, gender, first_name, last_name und password.

| id  | username | email       | gender | first_name | last_name | password |
| --- | -------- | ----------- | ------ | ---------- | --------- | -------- |
| 8   | maximax  | max@test.te | male   | max        | gross     | $2y$10$z |

Post-Tabelle hat die Spalten: id, user_id, title, slug, body and posted_at.

| id  | user_id | title       | slug        | body                      | posted_at |
| --- | ------- | ----------- | ----------- | ------------------------- | --------- |
| 3   | 8       | lorem ipsum | lorem-ipsum | lorem ipsum dolorsit amet | 123541231 |

Post_Images-Tabelle hat die Spalten: id, post_id, filename und created_at.

| id  | post_id | filename                  | created_at |
| --- | ------- | ------------------------- | ---------- |
| 3   | 8       | lorem ipsum dolorsit amet | 1235412314 |

Post_Comments-Tabelle hat die Spalten: id, post_id, user_id, body und commented_at.

| id  | user_id | post_id | body                      | commented_at |
| --- | ------- | ------- | ------------------------- | ------------ |
| 3   | 8       | 6       | lorem ipsum dolorsit amet | 123541231645 |

Post_Likes-Tabelle hat die Spalten: id, post_id und user_id.

| id  | user_id | post_id |
| --- | ------- | ------- |
| 3   | 8       | 6       |

Login_Attempts-Tabelle hat die Spalten: id, user_id und attempts.

| id  | user_id | attempts |
| --- | ------- | -------- |
| 3   | 8       | 3        |

Roles-Tabelle hat die Spalten: id und name.

| id  | name  |
| --- | ----- |
| 3   | admin |

Users_Roles-Tabelle hat die Spalten: id, user_id und role_id.

| id  | user_id | role_id |
| --- | ------- | ------- |
| 3   | 7       | 3       |

![der Struktur der Datenbank-Tabellen](/public/images/database.png)
