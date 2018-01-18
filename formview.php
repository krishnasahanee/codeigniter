<html>
<head>
<title>tesdb</title>
</head>
<body>
    <h1>Form Biodata</h1>  
    <?php
        echo form_open('tesform/save', array('name' => 'myform'));    
    ?>
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name1"></input></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone1"></input></td>
            </tr>    
            <tr>
                <td><input type="submit" name="submit" value="submit"></input></td>
            </tr>        
        </table>
    <?php
        echo form_close();
    ?>

 	<a href="<?php echo base_url().'tesform/delete/'?>">View Data</a>
</body>
</html>