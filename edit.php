<?php 
    foreach($qq as $kk):
    $id=$kk['id'];
    $name=$kk['name'];
    $phone=$kk['phone'];      
    endforeach;
?>
<html>
<head>
<title>tesdb</title>
</head>
<body>
    <h1>Update Biodata</h1> 
    <?php
        echo form_open('tesform/update', array('name' => 'myform'));    
    ?>
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name1" value="<?php echo $name; ?>"></input></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone1" value="<?php echo $phone; ?>"></input></td>
            </tr>    
            <tr>
                <td><input type="submit" name="update" value="Update"></input></td>
            </tr>        
        </table>
        <input type="hidden" name="id1" value="<?php echo $id?>"/>
    <?php
        echo form_close();
    ?>

</body>
</html>