.htaccess: file che modifica le regole di accesso al server
	   trasforma la query string in uri (invece di index.php/?id=3 -> /id/3)

Tutte le richieste entrano nel file index.php
Qua viene settato (momentaneamente) l'id dell'utente (per permettere il testing)
Esplode la stringa della query string e include il file a seconda della risorsa/azione richiesta

Il file db.php connette semplicemente il database con mysqli

I file all'interno di controller hanno un dispatcher che smista le richieste ai vari model a seconda
del metodo HTTP utilizzato.

I file in models gestiscono i dati