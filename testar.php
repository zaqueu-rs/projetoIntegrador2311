    <!--Usada para incorporar código PHP neste aquivo.  -->
    <script>
    function close_window() {
        if (confirm("Fechar aba?")) {
            close();
        }
    }
    </script>
<?php
    require_once 'classes/cadastrarlivro.php';
    
    $l = new livro;
    $l->conectar(); 
    
    echo $l->msgErro
?>
<br> <a href="javascript:close_window();">Fechar</a>
</body>
</html>