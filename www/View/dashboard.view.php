<link href="../css/dashboard.css" rel="stylesheet">


<section class="wrapper">
        <section class="bar-stat two">
            <div class="utilisateurs-stat">
               
            </div>
            <div class="utilisateurs-stat">
               
            </div>
            <div class="utilisateurs-stat">
               
            </div>
        </section>
    <!-- <div class="two"></div>
    <div class="three"></div>
    <div class="four">Quatre</div>
    <div class="five">Cinq</div>
    <div class="six">Six</div> -->
</section>
<label>
    <?php 
    // var_dump($_SESSION['firstname']); 
    // $_COOKIE["Connected"]
    if(isset($_COOKIE['token'])){
        echo('Voici votre dashboard ');
    }
    ?>
</label>
