<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/validate.min.js'); ?>"></script>

    <script type="text/javascript">
        var base_url = "<?php echo base_url(''); ?>";
        var controller = "<?php echo $this->uri->segment(1, ''); ?>";
        var method = "<?php echo $this->uri->segment(2, ''); ?>";
    </script>

    <script src="<?php echo base_url('js/custom.js'); ?>"></script>

    <script src="<?php echo base_url('js/dataTables.min.js'); ?>"></script>

    <!-- For module pattern JavaScript -->
    <script type="text/javascript">
        $(document).ready(function() {
        // Use php array loop.
        <?php foreach($listeners as $listener): ?>
        <?php print($listener); ?>;
        <?php endforeach ?>
        }); 
    </script>

    
  </body>
</html>