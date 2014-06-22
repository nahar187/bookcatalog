BookCatalog
==========
An online book catalog.

### Installation ###
* copy bookcatalog directory to your webservers webroot folder.
* create a database named `book-catalog` (Used mysql)
* Find the bookcatalog.sql file in {project_root}/database folder.Execute it against `book-catalog` database.
* Open browser and type `http://localhost/bookcatalog` (you can also configure it in your favorite way)

### Functionalites ###
* normal user can see the list of books and book details.
* Admin user can create/edit/update/delete books.
* To CRUD books, login as admin user. You find it right corner of top page. (you can also type `http://localhost/bookcatalog/admin/books`)
* To login as admin user use username 'admin' and password 'pass'.

### Run unit tests ###
* Move to {project_root}/app/Console and type following command.<br>
`./cake test app`
* Follow the shell instruction to run specific tests.
