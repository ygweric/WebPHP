
<!-- <ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Dropdown</a>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </li>
</ul> -->


<?php if (have_posts()): ?>
<ul>
<?php while (have_posts()): the_post();?>
  <li><?php the_title();?> </li>
  <?php the_author();?>
  <?php the_time("Y-m-d h:m:s");?>
  <?php endwhile;?>
</ul>

<?php endif;?>