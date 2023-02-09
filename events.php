<?php include_once 'header.php';
    include_once 'admin.php';
require 'credentials.php';
$conn = mysqli_connect($servername ,$usernameDatabase ,$passwordDatabase );
$db = mysqli_select_db($conn, $dbname) or die('Error ' . mysqli_error());
mysqli_set_charset($conn, "utf8mb4");
echo'<h2>Vytvorenie kategórie</h2>';  
    echo "<table>
    <tr>
    <th>Názov</th>
    <th>Capacita</th>
        
    </tr>";

    
    echo" <tr>
    <form action='reserve.php' method='POST' enctype='multipart/form-data'>
    <td><input name = 'name' type='text'required></td>
    <td><input name = 'capacity' type='number'required></td>
    <td><button type='submit'name='create_category'>Vytvoriť kategoriu</button></td>
     </form>
    </tr>";
    echo "</table>";


echo'<h2>Vytvorenie udalosti</h2>';  
    echo "<table>
    <tr>
    <th>Udalosť</th>
    <th>Informácie</th>
    <th>Email</th>
    <th>Adresa</th>
    <th>Dátum</th>
    <th>Čas</th>
    
    </tr>";

    $sql1 = mysqli_query($conn, "SELECT * FROM category");
    echo" <tr>
    <form action='reserve.php' method='POST' enctype='multipart/form-data'>
    <td id='select'><select name='name'>
    ";
    while($row1 = mysqli_fetch_array($sql1)) {
        $selectContent = <<<EOT





        <option value="{$row1['id']}">{$row1['name']}</option>
       
        EOT; 
        echo"$selectContent";
    }
    echo"
    
    
    </select></td>
    <td><input name = 'info' type='text'required></td>
    <td><input name = 'address' type='text'required></td>
    <td><input name = 'mail' type='mail'required></td>
    <td><input name = 'date' type='date'required></td>
    <td><input name = 'time' type='time'required></td>
    <td><input name = 'img' type='file' accept='image/*'></td>
    <td><button type='submit'name='create_event'>Vytvoriť udalosť</button></td>
     </form>
    </tr>";
    echo "</table>";


$sql = mysqli_query($conn, "SELECT event.id, event.category_id, event.information, event.image, category.name, category.capacity, event.date, event.time_start, event.reservation, event.mail, event.address FROM event INNER JOIN category ON category.id = event.category_id");
echo'<h2>Editácia udalostí</h2>';  
echo "<table>
<tr>
<th>Udalosť</th>
<th>Informácie</th>
<th>Dátum</th>
<th>Email</th>
<th>Čas</th>
<th>Adresa</th>
<th>Obsadené miesta</th>
<th>Maximálna capacita</th>
</tr>";



while($row = mysqli_fetch_array($sql)) {
   
    $categoryId[] = $row['category_id'];
    
 

    $tableContent = <<<EOT





    <tr>
    <form action="reserve.php" method="POST" enctype='multipart/form-data'>
    <td class="number"></td>
    <td><input name = 'info' type='text' value="{$row['information']}"></td>
    <td><input name = 'date' type='date' value="{$row['date']}"></td>
    <td><input name = 'mail' type='mail' value="{$row['mail']}"></td>
    <td><input name = 'time' type='time' value="{$row['time_start']}"></td>
    <td><input name = 'address' type='text' value="{$row['address']}"></td>
    <td>{$row['reservation']}</td>
    <td>{$row['capacity']}</td>
    <td><input name = 'img' type='file' accept='image/*'><input name = 'saved_image' type='hidden' value="{$row['image']}"</td>
    <td><input name = 'id' type='hidden' value="{$row['id']}"><button type='submit'name='save_change_event'>Ulož zmenu</button></td>
    <td><button type='submit'name='delete_event'>Vymaž udalosť</button></td>
    </form>
    </tr>
   
    EOT; 




   
    

    echo"$tableContent"; 
  
}

echo "</table>";



$categoryId_array = json_encode($categoryId);

echo"<script>";
echo "window.categoryId_array =".$categoryId_array ;
echo"</script>";







echo'<h2>Vytvorenie orálna historia</h2>';  
    echo "<table>
    <tr>
    <th>Meno</th>
    <th>Priezvisko</th>
    <th>Informácie</th>
    <th>Dátum</th>
    <th>Čas_1</th>
    <th>Čas_2</th>
    <th>Čas_3</th>
    <th>Obrázok</th>
    
    </tr>";

    echo" <tr>
    <form action='reserve.php' method='POST' enctype='multipart/form-data'>
    <td><input name = 'name' type='text'required></td>
    <td><input name = 'surname' type='text'required></td>
    <td><input name = 'info' type='text'required></td>
    <td><input name = 'date' type='date'required></td>
    <td><input name = 'time_1' type='time'></td>
    <td><input name = 'time_2' type='time'></td>
    <td><input name = 'time_3' type='time'></td>
    <td><input name = 'img' type='file' accept='image/*'></td>
    <td><button type='submit'name='create_oral'>Vytvoriť</button></td>
     </form>
    </tr>";
    echo "</table>";


    echo'<h2>Editácia orálna historia</h2>';  
    echo "<table>
    <tr>
    <th>Meno</th>
    <th>Priezvisko</th>
    <th>Informácie</th>
    <th>Dátum</th>
    <th>Čas_1</th>
    <th>Čas_2</th>
    <th>Čas_3</th>
    <th>Obrázok</th>
    
    </tr>";
    $sql = mysqli_query($conn, "SELECT * FROM pensioners");
    echo" <tr>
    <form action='reserve.php' method='POST' enctype='multipart/form-data'>
     ";
    while($row = mysqli_fetch_array($sql)) {
        $selectContent = <<<EOT





        <tr>
        <form action="reserve.php" method="POST" enctype='multipart/form-data'>
        <td><input name = 'name' type='text' value="{$row['name']}"></td>
        <td><input name = 'surname' type='text' value="{$row['surname']}"></td>
        <td><input name = 'info' type='text' value="{$row['information']}"></td>
        <td><input name = 'date' type='date' value="{$row['date']}"></td>
        <td><input name = 'time_1' type='time' value="{$row['time_reservation_1']}"></td>
        <td><input name = 'time_2' type='time' value="{$row['time_reservation_2']}"></td>
        <td><input name = 'time_3' type='time' value="{$row['time_reservation_3']}"></td>
                <td><input name = 'img' type='file' accept='image/*'><input name = 'saved_img' type='hidden' value="{$row['img']}"></td>
        <td><input name = 'id' type='hidden' value="{$row['id']}"><button type='submit'name='save_change_pensioner'>Ulož zmenu</button></td>
        <td><button type='submit'name='delete_pensioner'>Vymaž udalosť</button></td>
        </form>
        </tr>
       
        EOT; 
        echo"$selectContent";



    }
    echo "</table>";



include_once 'footer.php';?>
</body>
<script>
const category = window.categoryId_array;

var element_old = document.getElementById('select');
var div = document.querySelectorAll('.number');
div.forEach(element => {

    element.innerHTML = element_old.innerHTML;

});
myElement = document.querySelectorAll('select[name="name"]');
for (i = 0; i < category.length; i++) {
    a = i + 1;

    myElement[a].selectedIndex = (category[i]) - 1;
}
</script>
<script src="nahodne-logo-prihlasenie.js"></script>

</html>