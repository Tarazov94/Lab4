<!DOCTYPE html>
<html>
    <head>
    <title>Видео блог ИТАСа</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles/123.css">
        <script>
            var db = openDatabase('notes', '1.0', 'Заметки', 5 * 1024 * 1024);
            
            db.transaction(function (tx) {
                // tx.executeSql('DROP TABLE IF EXISTS Mess');
            });
            db.transaction(function (tx) {
                tx.executeSql('CREATE TABLE IF NOT EXISTS Mess(id integer primary key autoincrement, message TEXT)');
             });
             function AddNote() {
                var inputMessage = document.getElementById("msg").value;
                db.transaction(function(tx) {
                    tx.executeSql('INSERT INTO Mess (message) VALUES (?)',[inputMessage], null, null);
                });
                  
                
           db.transaction(function(tx) {
            tx.executeSql("SELECT * FROM Mess", [], function(tx, result) {   
            for(var i = 0; i < result.rows.length; i++) {
                if(i+1==result.rows.length){
                    var c = document.getElementById('azx');
                    var d = document.createElement('DIV');
                    var e = document.createElement('p');
                    e.className = 'soo';
                    d.className = 'soob';
                    var txt = document.createTextNode(result.rows.item(i)['message']);
                    e.appendChild(txt);
                    d.appendChild(e);
                    c.appendChild(d);
                    document.getElementById("msg").value = '';
                }
            }
            }, null)});
            } ;  
        db.transaction(function(tx) {
            tx.executeSql("SELECT * FROM Mess", [], function(tx, result) {
                
            for(var i = 0; i < result.rows.length; i++) {
                    var c = document.getElementById('azx');
                    var d = document.createElement('DIV');
                    var e = document.createElement('p');
                    e.className = 'soo';
                    d.className = 'soob';
                    var txt = document.createTextNode(result.rows.item(i)['message']);
                    e.appendChild(txt);
                    d.appendChild(e);
                    c.appendChild(d);
            }
        }, null)});
        </script>
    </head>

<body>
    <header>
        <h1>Видео блог ИТАСа</h1>
    </header>
    
    <nav id="nav1">
        <h2> Меню </h2>
        <ul>
            <li> <a href="http://vk.com">Вконтакте</a></li>
            <li> <a href="http://yandex.ru">Яндекс</a></li>
        </ul>
            

    
    <br>
    
    <nav id="nav2">
            <h2>Войти</h2>
            <form method="GET" action="index.php">
                   E-mail:   <input  type="email" required name="Name_"><br><br>
                   Пароль: <input type="password" required name="Pass_" /><br>
                <input  type="hidden" name="vv_not" value=1/>
                <input class="knop" type="submit" name="go" value="Войти">
            </form>
            <br>
            <?php
            if($_GET["ADD_OK"]==1){
                    echo '<div style="color: red;" >Регистрация прошла успешно</div>';
                }
            ?>
    </nav>
    <div class="zamet">
        <h2 style="position: relative; top: -20px;">Заметки</h2>
        <div id="azx" class="z_okno">
        </div>
        <input id="msg" type="text"  style="position: relative; width: 200px; left: 10px; top: -28px; margin-right: 10px;;" />
        <button style="top: -28px; left: 5px; position: relative;" onclick="AddNote()">Добавить</button>
    </div>
    </nav>
    <section>
        <h2> Первый видео блок </h2>
         <article>
            <h2> Видео 1 </h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/09R8_2nJtjg"  allowfullscreen></iframe>
         </article>
         <article>
            <h2> Видео 2 </h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/OZ_BIp8Yvsk" allowfullscreen></iframe>
         </article>
         
    </section>
    
    <section>
        <h2> Второй видео блок </h2>
         <article>
            <h2> Видео 3 </h2>
            <iframe width="560" height="315" src="http://www.youtube.com/embed/RzFmWjavzYM" allowfullscreen></iframe>
         </article>
         <article>
            <h2> Видео 4 </h2>
            <iframe width="560" height="315" src="http://www.youtube.com/embed/89X2y9nGGzY" allowfullscreen></iframe>
         </article>
         
    </section>
<footer>
        <h1>2015 ИТАС Видео блог</h1>
</footer>
</body>
</html>

