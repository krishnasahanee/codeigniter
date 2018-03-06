control
<?php
include_once("model.php");

$obj=new model;



//country data view

$cou=$obj->select('country',$cc);



//join all tables
$tbl=array('reg','country');
$st=array('*');
$wh=array('reg.country'=>'country.cid');
$hm=$obj->select_join($tbl,$st,$wh,$cc);



//insert register form
if(isset($_REQUEST['sib']))
{
	$u=$_REQUEST['unm'];
	$p=$_REQUEST['pass'];
	$g=$_REQUEST['gen'];
	$h=$_REQUEST['hh'];
	$hh=implode(",",$h);
	$c=$_REQUEST['cou'];

	$data=array("uname"=>$u,"pass"=>$p,"gender"=>$g,"hobby"=>$hh,"country"=>$c);

	$obj->insert('reg',$data,$cc);

}



	//login code here.........
	if(isset($_REQUEST['log_sub']))
	{
		$u=$_REQUEST['unm'];
		$p=$_REQUEST['pass'];

		$data=array("uname"=>$u,"pass"=>$p);
		$qq=$obj->select_where('reg',$data,$cc);
		$no=$qq->num_rows;
		if($no>0)
		{
			header("location:home.php");
		}
		else
		{
			echo "wrong username and password ...!!";
		}
	}



	//delete code here

	if(isset($_REQUEST['del']))
	{
		$id=$_REQUEST['del'];
		$data=array("rid"=>$id);

		$obj->delete('reg',$data,$cc);
		header("location:home.php");
	}





	?>

	home
	<?php
include_once("control.php");


?>
<html>
	<head>
		<title>home</title>
	</head>
	<body>
		<h1 align="center">Homepage</h1>

		<table border="1" align="center">
			<tr>
				<td>#</td>
				<td>uname</td>
				<td>pass</td>
				<td>Gender</td>
				<td>Hobby</td>
				<td>Country</td>
				<td>status</td>
				<td>Action</td>
			</tr>
			<?php
				$i=1;
				foreach($hm as $h)
				{
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $h->uname; ?></td>
				<td><?php echo $h->pass; ?></td>
				<td><?php echo $h->gender; ?></td>
				<td><?php echo $h->hobby; ?></td>
				<td><?php echo $h->cname; ?></td>
				<td><?php echo $h->status; ?></td>
				<td><a href="home.php?del=<?php echo $h->rid; ?>">Delete</a></td>
			</tr>
			<?php
				$i++;
				}
			?>
		</table>

	</body>
</html>
index
<?php
include_once("control.php");


?>
<html>
	<head>
		<title>reg</title>
	</head>
	<body>
		<h1 align="center">Register Form</h1>
        <h3 align="right"><a href="login.php">Login Here...</a></h3>
		
		<form method="post" id="frm">
			<table border="1" align="center">
				<tr>
					<td>Username :</td>
					<td><input type="text" name="unm" ></td>
				</tr> 
				<tr>
					<td>Password :</td>
					<td><input type="password" name="pass" ></td>
				</tr>
				<tr>
					<td>Gender :</td>
					<td><input type="radio" name="gen" value="Male" >Male
					<input type="radio" name="gen" value="Female">Female</td>
				</tr>
				<tr>
					<td>Hobby :</td>
					<td><input type="checkbox" name="hh[]" value="Cricket">Cricket
					<input type="checkbox" name="hh[]" value="Chess">Chess</td>
				</tr>
                <tr>
                	<td>Country :</td>
                    <td><select name="cou" >
                  	<?php
                  	foreach($cou as $c)
                  	{
                  	?>
                  		<option value="<?php echo $c->cid; ?>"><?php echo $c->cname; ?></option>
                  	<?php
                  		
                  	}

                  	?>
                    </select></td>
                </tr>
				<tr> 
					<td colspan="2" align="center"><input type="submit" name="sib" value="Submit"></td>
				</tr>
			</table>
		</form>
        
	</body>
</html>
login
<?php
include_once("control.php");

?>
<html>
	<head>
		<title>reg</title>
	</head>
	<body>
		<h1 align="center">Login Form</h1>
        <h3 align="right"><a href="index.php">Register Here...</a></h3>
		
		<form method="post" id="frm">
			<table border="1" align="center">
				<tr>
					<td>Username :</td>
					<td><input type="text" name="unm" ></td>
				</tr>
				<tr>
					<td>Password :</td>
					<td><input type="password" name="pass" ></td>
				</tr>
				<tr> 
					<td colspan="2" align="center"><input type="submit" name="log_sub" value="Submit"></td>
				</tr>
			</table>
		</form>
        
	</body>
</html>
model
<?php
include_once("db.php");

$cn=new connection;

$cc=$cn->connect();

class model
{
	public function select($tbl,$cc)
	{
		$sel="select * from $tbl";
		$qq=$cc->query($sel);
		while($ff=$qq->fetch_object())
		{
			$rr[]=$ff;
		}
		return $rr;
	}

	public function insert($tbl,$data,$cc)
	{
		$k=array_keys($data);
		$kk=implode(",",$k);
		$v=array_values($data);
		$vv=implode("','",$v);
	
		$ins="insert into $tbl($kk) values('$vv')";
		$cc->query($ins);
	}

	public function select_where($tbl,$data,$cc)
	{
		$sel="select * from $tbl where ";
		foreach($data as $dk=>$dv)
		{
			$sel.=" ".$dk."='".$dv."' and ";
		}
		$sel.=" 1=1 ";

		$qq=$cc->query($sel);
		return $qq;

	}

	public function select_join($tbl,$st,$wh,$cc)
	{
		$s=implode(",",$st);
		$tb=implode(",",$tbl);
		$sel="select $s from $tb where ";
		foreach($wh as $wk=>$wv)
		{
			$sel.=" ".$wk."=".$wv." and ";
		}		
		$sel.=" 1=1 ";
		$qq=$cc->query($sel);
		while($ff=$qq->fetch_object())
		{
			$rr[]=$ff;
		}
		return $rr;
	}

	public function delete($tbl,$data,$cc)
	{
		$dl="delete from $tbl where ";
		foreach($data as $dk=>$dv)
		{
			$dl.=" ".$dk."='".$dv."' and ";
		}
		
		$dl.=" 1=1 ";

		$cc->query($dl);

	}



}


?>
db
<?php
class connection
{
	public function connect()
	{
		$con=new mysqli("localhost","root","","user");
		return $con;
	}
}

?>



