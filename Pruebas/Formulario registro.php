<!doctype html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Documento sin título</title>    
    <p>""</P>
    <style>
      h1{
        text-align:center;
        color:#090153;
        border-bottom:dotted #090153;
        width:50%;
        margin:auto;	
      }
      table{
        border:1px solid #02020#000000;
        padding:25px 70px;
        margin-top:50px;
      }
      body{
        background-color:#979798};
      }
    </style>
  </head>
  <body>
    
  <h1>Registro de Artículos</h1>
    <form name="form1" method="get" action="insertar_registro.php">
      <table border="0" align="center">
        <tr>
          <td>Nombre</td>
          <td><label for="Nombre"></label>
          <input type="text" name="Nombre" id="Nombre"></td>
        </tr>
        <tr>
          <td>Referencia</td>
          <td><label for="Referencia"></label>
          <input type="text" name="Referencia" id="Referencia"></td>
        </tr>
        <tr>
          <td>Serial</td>
          <td><label for="Serial"></label>
          <input type="text" name="Serial" id="Serial"></td>
        </tr>
        <tr>
          <td>Cantidad</td>
          <td><label for="Cantidad"></label>
          <input type="text" name="Cantidad" id="Cantidad"></td>
        </tr>
        <tr>
          <td>Observaciones</td>
          <td><label for="Observaciones"></label>
          <input type="text" name="Observaciones" id="Observaciones"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center"><input type="submit" name="enviar" id="enviar" value="Enviar"></td>
          <td align="center"><input type="reset" name="Borrar" id="Borrar" value="Borrar"></td>
        </tr>
      </table>
    </form>
  </body>
</html>