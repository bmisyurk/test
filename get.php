<?php

if (empty($_GET['w']) or empty($_GET['h']) or empty($_GET['r'])) {
    echo 'Заполните все поля';
}
else
    include 'after.php';
?>
<script type="text/javascript">
    function load() {
        var w = parseInt('<?php echo $width?>');
        var h = parseInt('<?php echo $height?>');
        var r = parseInt('<?php echo $radius?>');
        if (isNaN(w) || isNaN(h) || isNaN(r)) {
            document.write("Введите числовые значения!");
        } else if (r > w / 2 || r > h / 2) {
            document.write("Радиус превышает допустимые значения!");
        }
    }
</script>

