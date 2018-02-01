  <footer>
    <nav>
      <?php wp_nav_menu(array( 'theme_location' => 'main' )); ?>
    </nav>
    <h4>Copyright <?php echo bloginfo('name') . " " . date("Y")?>. Created by <a href="http://smallwins.co.uk">Small Wins</a>.</h4>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>
