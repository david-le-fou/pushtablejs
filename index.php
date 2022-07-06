<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>push table</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prenom </th>
            <th>Tel</th>
            <th></th>
        </tr>
        <tr id="insert">
            <td>
                <input type="text" id ="nom"name ="nom">
            </td>
            <td>
                <input type="text" id ="prenom" name ="prenom">
            </td>
            <td><input type="text" name="tel" id="tel"></td>
            <td><button id="ajout_table">ajout</button></td>
        </tr>
    </table>
    <form action="<?php $_SERVER['PHP_SEFL'];?>" method="post">
        <input type="hidden" id="val_table" name="val_table" value="null">
        <button type="submit">Afficher</button>
    </form>
    <script>
        var list_insert =[];
        var champ = ["nom","prenom","tel"];
        var close = 0;
        $("#ajout_table").click(function(){
            
            var data_one = {};
            var vue_data_table = " ";
            champ.forEach(e => {
                data_one [e] = $("#"+e).val();
                vue_data_table +=  "<td>"+$("#"+e).val()+"</td>";
            });
            vue_data_table += "<td><button id='close_"+close+"' onClick='_close("+close+")'>&#x2715</button></td>";
            list_insert.push(data_one);
            var json_data = JSON.stringify(list_insert);
            var data = btoa(json_data);//base 64
            $("#val_table").val(data);
            $("#insert").before("<tr id='ligne_"+close+"'>"+vue_data_table+"</tr>");
            close++;
        })
        function _close(id){
            $("#ligne_"+id).remove();
            delete list_insert[id];
            var json_data = JSON.stringify(list_insert);
            var data = btoa(json_data);//base 64
            $("#val_table").val(data);
        }
    </script>
    <?php 
    $data = @$_POST["val_table"];
    $data = json_decode(base64_decode($data));
    var_dump($data??'');
    ?>
</body>
</html>