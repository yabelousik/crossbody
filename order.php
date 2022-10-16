<?php require('send_lead.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>La sua richiesta è accettata</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="nofollow" />
    <link rel="stylesheet" type="text/css" href="style.css" media="all">
    <style>
        body { margin-top: 50px }
    </style>
</head>

<body>
<?php if($obj->id) { ?>
    <h1>La sua richiesta è accettata</h1>

    <p>
        Grazie per il vostro ordine!<br>
        Il nostro operatore Vi contatterà al più presto. Si prega di accendere il telefono di contatto.
    </p>

    <table style="margin: auto">

 
        <tr>
            <th>Nome</th>
            <td><?= @$data_post['name']; ?></td>
        </tr>


        <tr>
            <th>Telefono per la comunicazione</th>
            <td><?= @$data_post['phone']; ?></td>
        </tr>


    </table>

<?php }
else {
    echo 'Ошибка!';
}
?>

</body>
</html>