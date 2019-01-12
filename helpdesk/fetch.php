<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "root", "helpdesk1.0");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM faq 
  WHERE faq_title LIKE '%".$search."%'
  OR faq_body LIKE '%".$search."%' 
  OR name_of_person_in_charge LIKE '%".$search."%' 
  OR phone_number LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM faq ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>FAQ title</th>
     <th>FAQ body</th>
     <th>Name of person in charge</th>
     <th>Phone number</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["faq_title"].'</td>
    <td>'.$row["faq_body"].'</td>
    <td>'.$row["name_of_person_in_charge"].'</td>
    <td>'.$row["phone_number"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>