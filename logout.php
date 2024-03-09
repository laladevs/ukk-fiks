<?php 
session_start();
session_unset();
session_destroy();
?>
<script>
     window.location.assign('landing-page.php');
    alert('selamat anda berhasil logout');
</script>