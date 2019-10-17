<div id="content" class="col-sm-9">
  <?php for ($i=0; $i < count($news); $i++) {?>
      <div class="blog1 blog">
        <h4 class="p-name"><a href="news/detail/<?php echo $news[$i]['News']['id']?>"><?php echo $news[$i]['News']['title']?></a></h4>
        <ul class="blog-meta">
          <li><i class="fas fa-clock"></i><span class="dt-published"><?php echo ' '.$news[$i]['News']['date']?></span></li>
          <li><i class="fas fa-comment"></i><span>2</span> Comment</li>
          <li><i class="fa fa-user"></i><span><a rel="author" title="Posts by Admin" href="#"> Admin</a></span></li>
        </ul>
        <p class="p-summary"></p>
        <p><?php echo $news[$i]['News']['short_content'] ?></p>
        <a class="u-url" href="news/detail/<?php echo $news[$i]['News']['id']?>">read more</a> </div>
  <?php }?>
</div>
