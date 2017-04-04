<?php
require "functions/functions.php";
class Venue extends coursemgt
{
  public function deletevenue()
  {
    if (isset($_POST['delete']))
     {

      $id = $_POST['venue_id'];
      $this->delete(venue,venue_id,$id);
      echo "<meta http-equiv='refresh' content='0; url=venue.php'/>";
     }
  }


  public function viewvenue()
  {
    foreach($this->viewintable('venue') as $data)
        {
          ?>
       
           <tr>
           <td><?php echo $data['venue_id']?></td>
           <td><?php echo $data['venue']?></td>
           <td><?php echo $data['capacity']?></td>
           <form action='' method='POST'>
           <input type='hidden' class='form-control' name='venue_id' value="<?php echo $data['venue_id']?>">
         <td><button type='submit' class='btn btn-danger' name='delete'/>DELETE</button></td>
          </form>

           </tr>
           <?php
       }
  }


  public function addvenue()
  {
    if(isset($_POST['add']))
{
 
  $venue=htmlspecialchars($_POST['venue']);
  $capacity=htmlspecialchars($_POST['capacity']);
  
  $valid=true;

  if(empty($_POST['venue']))
  {
    $valid=false;

  }
 
  if ($valid)
  {
   $sql="INSERT INTO venue(venue,capacity) values('$venue','$capacity')";
   $query=$this->calldb()->query($sql);
    
  }
  else
  {
    echo "Some fields are empty";
  }
  
}
  }
}

$Venue= new Venue;
?>