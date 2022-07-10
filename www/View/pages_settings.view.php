<!-- <!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Pages_Settings</title>
    <link href="../css/pages_settings.css" rel="stylesheet">
</head>
<body>
    <section class="section1">
        <div class="container_view_pages">
            <article class="benefit">
                <a href="#">    
                    <img src="../data/img/create_pages.svg">
                </a>
                <a href="#">
                    <img src="../data/img/modifie_pages.svg">
                </a>
                <a href="#">
                    <img src="../data/img/settings_pages_log.svg">
                </a>
                <a href ="#">
                    <img src="../data/img/delete_pages.svg">
                </a>
            </article>
        </div>
    </section>
    <section class= "section1">
        <div class="container_view_pages">
            <article class="benefit">
                <a href="#">
                    <img src="../data/img/vos_pages.svg">
                </a>
            </article>    
        </div>
    </section>
</body>
</html> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../css/datatables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/dtb.js"></script>

<table id="table_id" class="display cell-border" >
<!-- <input type="text" id="mySearchText" placeholder="Rechercher..."> -->
    <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
            </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $i < count($tabData) ; $i++) 
    { 
        $tab = array_keys($tabData[$i]);
        echo('<tr>');
        foreach ($tabData[$i] as $key => $value) 
        {
            if(array_key_exists($key,$tab))
                {echo('<td class="userInfos"> '.utf8_encode($value).' </td>');}
        }
        echo('<td class="buttons"> '.'<button  class="modify"><img src="../data/snippets/Edit.svg"></button><button class="delete"><img src="../data/snippets/trash.svg"></button>'.' </td>');
        echo('</tr>');
    }
    ?> 
    </tbody>
</table>

<script type="text/javascript" src="../js/page_settings.js"></script>

<div class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class = "modal--inputs">
        <form id="modifUser" method="post" action="">

        
            <input  name="id" type="hidden" value=""><br>


            <label for="name">Nom</label>
            <input name="name" type="text" value=""><br>

            <input type="submit" value="Confirmer les changements">

        </form>
    </div>
  </div>
</div>

<div class="modalDelete">
  <div class="modal-content">
    <span class="close-btnDelete">&times;</span>
    <div class = "modal--inputs">
        <form id="modifUser" method="post" action="">

        
            <input  name="id" type="hidden" value=""><br>

            <input type="submit" value="Confirmer la suppression">

        </form>
    </div>
  </div>
</div>