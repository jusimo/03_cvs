<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 01 BASIC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/css/styles.css">    
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        
        
        <div class="container">
            <h2>CSV</h2> 

            <?php
            $handle = false;
            $filename = 'articles.csv';
            $folder = './import/';
            if (file_exists($folder.$filename)) {
                $handle = fopen($folder.$filename, "r");
                $columnNames = fgetcsv($handle, 0, ';');
                $rows = [];
                while ($row = fgetcsv($handle, 0, ';')) {
                     $rows[] = $row;    
                }  
            }     
            ?>
            
     
            <table class="table table-hover">
                <thead>
                    <tr>
                       <?php 
                       $i = 0;
                       while ( $i < count($columnNames) ) { 
                       ?>      
                       <th>
                       <?= $columnNames[$i]; ?>
                       </th>
                       <?php 
                       $i ++; 
                       } ?>
                    </tr>
                </thead>
                
    
            <tbody> 
                <?php foreach ( $rows as $data ) : ?> 
                <tr>
                  <?php 
                  
                  $i = 0;
                  while ($i < count($columnNames)) {  ?> 
                     <td><?php echo $data[$i]; ?> </td>
                  <?php $i++; } ?> 
                </tr>

            <?php endforeach; ?>   
           </tbody>
           </table>

            
            
            
            
            
       </div>
        <hr>
        <pre>
            <?php
           //  print_r($rows);
            ?>
        </pre>   
            
            
    </body>
</html>
