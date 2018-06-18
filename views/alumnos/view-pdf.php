<html>
   <head>
    <title>ICATCAM</title>
     </head> 
    <body>
        <div align="center">
            GOBIERNO DEL ESTADO DE CAMPECHE
            <Br></Br>INSTITUTO DE CAPACITACIÓN PARA EL TRABAJO DEL ESTADO DE CAMPECHE
             <Br></Br>ICAT 2 PLANTEL ESCÁRCEGA
             <Br></Br>CLAVE 04EIC0006A
             <Br></Br>RELACIÓN DE RECIBOS DE COBRO
        </div>
   <p class="pull-right"><?= date(' d/m/y') ?></p>
  
   
<table width="1111" height="49" border="1" cellspacing="0">
  <tr>
    <td width="30">No.</td>
    <td width="70">RECIBO</td>
    <td width="182">NOMBRE DEL ALUMNO</td>
    <td width="204">ESPECIALIDAD / CURSO</td>
    <td width="190">COMUNIDAD / HORARIO</td>
    <td width="177">INSTRUCTOR</td>
    <td width="102">IMPORTE</td>
  </tr>
</table>  
   
   
<?php

$conn = pg_pconnect('host=localhost' .'port=8080' .'dbname=icat'.'user=postgres'.'password=1163138b');
if (!$conn) {
  //  pg_pconnect('host=' . PGHOST . ' port=' . PGPORT . ' dbname=' . PGDATABASE . ' user=' . PGUSER . ' password=' . PGPASSWORD);
  echo "Ocurrió un error.\n";
  exit;
}

$result = pg_query($conn, "SELECT cicloid, taller FROM talleres");
if (!$result) {
  echo "Ocurrió un error.\n";
  exit;
}

while ($row = pg_fetch_row($result)) {
  echo "Author: $row[0]  E-mail: $row[1]";
  echo "<br />\n";
}
 
?>

    </body>
    
    
    
    
</html>
