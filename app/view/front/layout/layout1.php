<!DOCTYPE html>
<html>
  <?php $this->getThemeElement('layout/partials/head', $__forward) ?>
  <body>
  
    <?php
    if(isset($__forward['nav'])){
      if($__forward['nav']){
        $this->getThemeElement('layout/partials/navbar', $__forward);
      }
    }
    else{
      $this->getThemeElement('layout/partials/navbar', $__forward);
    }
     ?>
     <br>
     <br>
    <?php $this->getThemeContent() ?>

    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <?php $this->getJsFooter(); ?>

    <!-- Load and execute javascript code used only in this page -->
    <script>
      $(document).ready(function(e){
        <?php $this->getJsReady(); ?>
      });
      <?php $this->getJsContent(); ?>
    </script>
  </body>
</html>