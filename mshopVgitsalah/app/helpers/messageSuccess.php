  
<?php if (isset($_SESSION['message'])): ?>
   <script>swal("<?php echo$_SESSION['message'] ?>", "Press ok to continue", "<?php echo $_SESSION['type'] ?>");
</script>
    <?php 
      unset($_SESSION['message']);
      unset($_SESSION['type']);
    ?>

  <?php endif; ?>