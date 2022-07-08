<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../css/datatables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/dtb.js"></script>

<table id="table_id" class="display cell-border" >
<!-- <input type="text" id="mySearchText" placeholder="Rechercher..."> -->
    <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Categorie</th>
                <!-- <th>Statut</th> -->
                <th>Date</th>
                <th>Actions</th>
            </tr>
    </thead>
    <tbody>
    <?php
     var_dump($article);
     var_dump("__________________________");
    for ($i=0; $i < count($article) ; $i++) 
    { 
        $tab = array_keys($article[$i]);
        echo('<tr>');
        foreach ($article[$i] as $key => $value) 
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

<script type="text/javascript" src="../js/user_settings.js"></script>

<div class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class = "modal--inputs">
        <form id="modifUser" method="post" action="">

        
            <input  name="id" type="hidden" value=""><br>


            <label for="Utilisateur">Titre</label>
            <input name="Utilisateur" type="text" value=""><br>

            <label for="Titre">Description</label>
            <input name="Titre" type="text" value=""><br>

            <label for="Description">Categorie</label>
            <input name="Description" type="text" value=""><br>

            <label for="Categorie">Date</label>
            <input name="Categorie" type="text" value=""><br>

            <input type="submit" value="Confirmer les changements">

        </form>
    </div>
  </div>
</div>

