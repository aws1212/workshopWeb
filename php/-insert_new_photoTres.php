
<?php
    
    include("../php/Connect.php");
    mb_internal_encoding('UTF-8');

    $id_repair = $_POST['id_repair'];
    $placa = $_POST['placa'];
 
    if($conn === false){
        echo json_encode("Error de conexion");
    }
    else
    {
            $sqlvd = "SELECT id_reparacion,placa FROM Fotografia_orden WHERE id_reparacion = '$id_repair' AND placa = '$placa'";

            $queryvd=sqlsrv_query($conn,$sqlvd);

            $rowvd=sqlsrv_fetch_array($queryvd);
            
            if($rowvd == null)
            {

                if(move_uploaded_file($_FILES["imagee"]["tmp_name"],"image_photoTres/".$_FILES["imagee"]["name"]))
                {
                    $linkimg_Diurna = "http://localhost/Web_TC/public/php/image_photoTres/".$_FILES["imagee"]["name"];

                    $sqlivs = "INSERT INTO Fotografia_orden(id_reparacion,placa)VALUES('$id_repair','$placa')";
                
                    $queryivd=sqlsrv_query($conn,$sqlivs);
        
                    if($queryivd){

                        $sqllos = "UPDATE Fotografia_orden set foto_tres = '$linkimg_Diurna' WHERE id_reparacion = 
                        '$id_repair' AND placa = '$placa'";
                
                        $queryuvd=sqlsrv_query($conn,$sqllos);
            
                        if($queryuvd)
                        {
                        echo json_encode("Exito");            
                        }else
                        {
                        echo json_encode("Error");
                        }
        
                    }else
                    {
                    echo json_encode("Error");
                    }
                    
                }
                else
                {
                    echo json_encode("Null");
                }
                
            }
            else
            {
                $sqlft = "SELECT foto_tres FROM Fotografia_orden WHERE id_reparacion = '$id_repair' AND placa = '$placa'";

                $queryft = sqlsrv_query($conn,$sqlft);

                $rowft = sqlsrv_fetch_array($queryft);

                if($rowft['foto_tres'] != null)
                {
                     if(move_uploaded_file($_FILES["imagee"]["tmp_name"],"image_photoTres/".$_FILES["imagee"]["name"]))
                        {

                            $linkimg_Diurna = "http://localhost/Web_TC/public/php/image_photoTres/".$_FILES["imagee"]["name"];
                            

                            $sqllos = "UPDATE Fotografia_orden set foto_tres = '$linkimg_Diurna' WHERE id_reparacion = 
                            '$id_repair' AND placa = '$placa'";
                    
                            $queryuvd=sqlsrv_query($conn,$sqllos);
                
                            if($queryuvd)
                            {
                            echo json_encode("Exito");            
                            }else
                            {
                            echo json_encode("Error");
                            }
                        }
                        else
                        {
                            echo json_encode("Null");
                        }
                    
                }
                else
                    {
                    
                        if(move_uploaded_file($_FILES["imagee"]["tmp_name"],"image_photoTres/".$_FILES["imagee"]["name"]))
                        {

                            $linkimg_Diurna = "http://localhost/Web_TC/public/php/image_photoTres/".$_FILES["imagee"]["name"];
                            

                            $sqllos = "UPDATE Fotografia_orden set foto_tres = '$linkimg_Diurna' WHERE id_reparacion = 
                            '$id_repair' AND placa = '$placa'";
                    
                            $queryuvd=sqlsrv_query($conn,$sqllos);
                
                            if($queryuvd)
                            {
                            echo json_encode("Exito");            
                            }else
                            {
                            echo json_encode("Error");
                            }
                        }
                        else
                        {
                            echo json_encode("Null");
                        }
                    
                }

                
                
            }
        }

        
    