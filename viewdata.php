<!DOCTYPE html>
<html>
<head>
	<title>View data from databse</title>
</head>
<body>
<h1 align="center"><u>View Data From Database</u></h1>
<table align="center" border="2">
	<tr>
		<th>First name</th>
		<th>Last name</th>
		<th>Action</th>
	</tr>
	<?php foreach ($qq as $rr) {
			?>
		<tr>
			<td><?php echo $rr['name'] ?></td>
			<td><?php echo $rr['phone'] ?></td>
			<td><a href="<?php echo base_url().'tesform/delete/'.$rr['id'];?>">Delete</a>
			<a href="<?php echo base_url().'tesform/show/'.$rr['id'];?>">Edit</a>
				</td>
		</tr>
	<?php } ?>
	</table>
	<h3><a href="<?php echo base_url().'tesform/index/'?>">Add Data</a></h3>	
</body>
</html>