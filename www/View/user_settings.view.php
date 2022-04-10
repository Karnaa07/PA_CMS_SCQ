<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../css/datatables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/dtb.js"></script>

<table id="table_id" class="display cell-border" >
    <thead>
            <tr>
                <th>Email</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Actions</th>

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
                {echo('<td> '.utf8_encode($value).' </td>');}
        }
        echo('<td class="buttons"> '.'<button><img src="../data/snippets/Eye.svg"></button><button><img src="../data/snippets/Edit.svg"></button><button><img src="../data/snippets/trash.svg"></button>'.' </td>');
        echo('</tr>');
    }
    ?> 
    </tbody>
</table>




