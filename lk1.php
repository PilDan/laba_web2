<?php 
    require "db.php"; ?>
<?php
   if( isset($_SESSION['logged_user'])) : 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тупой сайт</title>
    <link rel="stylesheet" href="css/lk.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/main.css">
    <style>
        .btn {
    display: inline-block; /* Строчно-блочный элемент */
    background: #8C959D; /* Серый цвет фона */
    color: #fff; /* Белый цвет текста */
    padding: 1rem 1.5rem; /* Поля вокруг текста */
    text-decoration: none; /* Убираем подчёркивание */
    border-radius: 3px; /* Скругляем уголки */
   }
    </style>
</head>
<body>
    <header id="header" class="header">
     <div class="container">
          <div class="nav">
            <a href="./glav.php">
                <img src="img/Group 217.svg" alt="VlzCinema" width="80" height="80" href="glav.php" class="logo2">
              </a>
              
              <ul class="verh">
                  <li>
                     <a href="film.php" >
                      Фильмы
                     </a>
                  </li>
                   <li>
                      <a href="jur.php" >
                      Журнал
                     </a>
                  </li> 
                  <li>
                     <a href="klient.php" >
                     Клиенты
                     </a>
                  </li>
                  <li>
                     <a href="bibl.php" >
                     Библиотекари
                     </a>
                  </li>
                           
                    <li>
                  <?php
                      if( isset($_SESSION['logged_user'])) : 
                    ?>
                        <a href="/lk2.php">
                        Привет, <?php echo $_SESSION['logged_user']->login; ?>!
                        </a>
                    </li> 
                    <li>
                    <a href="/logout.php">Выход</a>
                    </li>
                    <?php
                    else :
                    ?>
                        <li>
                        <a href="lk.php">
                        Личный кабинет
                        </a>
                    </li>
                    <li>
                        <a href="signup.php">
                         Регистрация
                        </a>
                    </li>
                    <?php
                    endif;
                    ?>
                           
             </ul>
           </div>
      </div>
    </header>

    <section id="sered" class="sered client">
        <div class="fon">
          <div class="fon1">
             <img src="data:image/jpeg;base64,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" class="img" alt="">
             <p class="fio"><p class="fio"><?php echo $_SESSION['logged_user']->name; ?></p><br/> 
          </div>
        <hr class="pol1">
        <table class="table">
            <thead class="t" >
            <tr>
                <th class="table__th">#</th>
                <th class="table__th">Фильм</th>
                <th class="table__th">Дата взятия</th>
                <th class="table__th">Дата сдачи</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="table__td"></td>
                <td class="table__td" ><a href="./film.php" class="btn">Выбрать фильм</a></td>
                <td class="table__td"></td>
                <td class="table__td"></td>
            </tr>
            </tbody>
        </table>
    </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>



    </body>
    <?php
    else : header("Location: http://localhost/glav.php");
?> 
<?php 
endif;
?>