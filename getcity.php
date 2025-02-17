<?php
include('include/config.php');
if(!empty($_POST["stateid"])) 
{
    $id=intval($_POST['stateid']);
    $query=mysqli_query($con,"SELECT * FROM city WHERE stateID=$id");
    ?>
    <option value="">Select City</option>
    <?php
    while($row=mysqli_fetch_array($query))
    {
    ?>
        <option value="<?php echo htmlentities($row['cityName']); ?>"><?php echo htmlentities($row['cityName']); ?></option>
    <?php
    }
}
?>