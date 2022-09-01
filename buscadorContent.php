<?php
include('db.php');


$sql = "SELECT * from repository";

$resultado = $conexion->query($sql);


$numero = mysqli_num_rows($resultado);
?>

<div class="container__Tabla">
            <div class="tabla__header">
                <h2>CyberWarrior Resources</h2>
                <a href="create.php"><button>Add Content</button></a>
                <img src="assets/images/cwlogo1.png" class="avatar" srcset="">
                    <table>
                        <thead>
                            <tr>
                                <th>Title Resource</th>
                                <th>Type of Resources</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>URL</th>
                                <th>Language</th>
                                <th>Credits</th>
                             </tr>
                        </thead>
                            <tbody>

<?php
while($encontrados = mysqli_fetch_assoc($resultado)){
?>

                             <tr>
                                <td><?php echo $encontrados['title']?></td>
                                <td><?php echo $encontrados['type']?></td>
                                <td><?php echo $encontrados['category']?></td>
                                <td><?php echo $encontrados['description']?></td>
                                <td><?php echo $encontrados['url']?></td>
                                <td><?php echo $encontrados['language']?></td>
                                <td><?php echo $encontrados['credits']?></td>
                            
                            </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                    </table>
                    <div class="tabla__footer">
                        <p> Resources found: <?php print $numero?>
                    </div>
                </div>
            </div>
       </div>