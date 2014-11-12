<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to greedygame bookmark view</title>

</head>
<body>
		
		<div class="centered" align="left" style="position:absolute; left: 30px; top: 100px;">
		
        <form  method = "post" >
            
             To add new bookmark: type: url,tag1,tag2,tag3.<br/>
             To search: type: tag in field and click.<br/>

            Input: <input type = "text" name = "name"> 
                    <input type = "submit" name = "submit"> 
        </form>
		<?php 
				if(isset($_POST['submit']))  {
					$str = $_POST['name'];
            
	
					$c1 = 0;
					$c2 = 0;
					$j = 0;
					for($i = 0; $i < strlen($str); $i++)  {
						$c2++;
						if($str[$i] == ',')  {
							$arr[$j++] = substr($str,$c1,$c2-1);
							$c1 = $c1+$c2;
							$c2 = 0;
						}
					}
					
					$arr[$j++] = substr($str,$c1,$c2);
					
					$n = $j;
					
					for($i = 0; $i < $n; $i++)  {
						//echo $arr[$i].'<br/>';
					}
					
					$res = count($arr);
					//echo $res."<br/>";
					if($res == 1)  {
						$sq3 = $dt3;
						$rs = mysql_query($sq3);
						$flag = 0;
						while($row = mysql_fetch_array($rs))  {
							if($row['Tag'] == $str)  {
								echo $row['Site']."<br/>";
								$flag = 1;
							}
						}
						if($flag == 0)  {
							echo "Not found"."<br/>";
						}
					} else if($res > 1)  {
						for($i = 1; $i < $n; $i++)  {
							$sq4 = "INSERT INTO bookmark(tag, site) VALUES ('$arr[$i]','$arr[0]')";
							$rs = mysql_query($sq4);
						}
						echo "Record added"."<br/>";
					} else {
						echo "Wrong Formate"."<br/>";
					}	
				}
		?>
		
        </div>
      
		<div class="centered" align="center" style="position:absolute; width: 300px; left: 500px; top: 100px;">
                    <form action = "application/views/bookmark_view2.php" method = "post" >
                        All Tag
                                
                    </form>
         
                <?php
					$sq1 = $dt1;
					$rs = mysql_query($sq1);
					while($row = mysql_fetch_array($rs))  {
						echo $row['Tag'].", ";
					}
					?>
        
         
        </div>
		
		<div class="centered" align="right" style="position:absolute; left: 1000px; top: 100px;">
                    <form action = "application/views/bookmark_view3.php" method = "post" >
                        All site's
                            
                    </form>
				<?php 
					$sq1 = $dt2;
					$rs = mysql_query($sq1);
					while($row = mysql_fetch_array($rs))  {
                       //echo $row['Site']." -> ".$row['Tag']."<br/>";
                    echo $row['Site']."<br/>";
					}
				?>	
 
        </div>
</body>

</html>