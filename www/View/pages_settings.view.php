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
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/dtb.js"></script>

<table id="table_id" class="display cell-border" >
    <thead>
            <tr>
                <th>Nom</th>
            </tr>
    </thead>
    <tbody>
    <?php
    // for ($i=0; $i < count($tabData) ; $i++) 
    // { 
    //     $tab = array_keys($tabData[$i]);
    //     echo('<tr>');
    //     foreach ($tabData[$i] as $key => $value) 
    //     {
    //         if(array_key_exists($key,$tab))
    //             {echo('<td> '.utf8_encode($value).' </td>');}
    //     }
    //     echo('</tr>');
    // }
    ?> 
    </tbody>
</table>