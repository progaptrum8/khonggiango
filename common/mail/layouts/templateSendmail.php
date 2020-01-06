<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <table id="Table_01" border="0" cellpadding="0" cellspacing="0" style="font-family:arial; font-size:14px;">
            <tbody>      
                <tr>
                    <?php if(count($data) > 0) {?>
                        <td>
                            <h4>Profile Name: <?=$data[0]['fullname']." (ID: ".$data[0]['id'].")"?></h4>
                            <h4>User Name: <?=$data[0]['username']?></h4>
                            <h4>Profile Type: <?=$data[0]['profileType']?></h4>
                        </td>
                    <?php 
                    }
                    ?>
                </tr>  
                <tr>
                    <td>
                       <?php
                        echo $content;                   
                       ?>
                    </td>
                </tr>
            </tbody>
        </table>   
    </body>
</html>