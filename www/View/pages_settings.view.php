

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../css/datatables.css">
<link rel="stylesheet" type="text/css" href="../css/page.css">


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/dtb.js"></script>

<a href="/addPage" class="page--addContainer">
  <button class="page--button">
    <img class="page--addbutton"src="../data/snippets/Add.svg">
    <label>Ajouter</label>
  </button>
</a>

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

        
            <input  name="idPage" type="hidden" value=""><br>


            <label for="name">Nom</label>
            <input name="name" type="text" value=""><br>

            <input type="submit" value="Confirmer les changements">

        </form>
    </div>
  </div>
</div>

<div class="deleteModal">
  <div class="modal-content">
    <span class="deleteClose-btn">&times;</span>
    <div class = "modal--inputs">
        <form id="modifUser" method="post" action="">

        
            <input  name="idPage" type="hidden" value=""><br>

            <input type="submit" value="Confirmer la suppression">

        </form>
    </div>
  </div>
</div>