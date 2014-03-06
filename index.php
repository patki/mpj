<?php


$titles=array("choosen_category","adtitle","topic_category","description","price","contact_name","email","phoneno","location");

 $query="select * from adposts ";
         $result=mysql_query($query);
         $numrows=mysql_num_rows($result);
         if ($numrows==0) {
       echo "<center><h2 style=color:#FFF>No results found</h2></center>";
          }
         else{
           while($row=mysql_fetch_row($result)){
            
             echo "<legend class=offset1 style=color:#FFF><b>ads posted</b></legend>";
               for($i=0;$i<=7;$i++){
                 echo "<table class=table table-bordered  style=height:30px;width:300px;margin-left:200px;color:#FFF>";
                 echo "<tbody>";
           echo "<tr class=text-left>";
           echo "<td>".$titles[$i]."</td>";
           echo "<td>".$row[$i]."</td>";
           echo "</tr>";
           echo "</tbody>";
           echo "</table> ";
                 }
               echo "<hr></hr>";
             }

            }  



?>