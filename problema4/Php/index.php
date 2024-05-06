<?php
include "encabezado.inc.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>JAVA-GET</h4>
                <form action="http://localhost:8080/JavaWA/NewServlet" method="get">
                    <label>CI</label>
                    <input type="text" name="ci" class="form-control mb-3">
                    <label>Nota</label>
                    <input type="number" name="nota" class="form-control mb-3">
                    <input type="submit" class="btn btn-dark" value="Enviar a JAVA">
                </form>
            </div>
            <div class="col-md-4 offset-md-2">
                <h4>NET-POST</h4>
                <form action="http://localhost:53816/Default.aspx" method="post">
                    <label>CI</label>
                    <input type="text" name="ci" class="form-control mb-3">
                    <label>Nota</label>
                    <input type="number" name="nota" class="form-control mb-3">
                    <input type="submit" class="btn btn-dark" value="Enviar a NET">
                </form>
            </div>
        </div>
    </div>
<?php
include "pie.inc.php";
?>