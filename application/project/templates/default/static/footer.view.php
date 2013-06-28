
<br />

<h3><?=lang('status') . ' ' . lang('system')?></h3>

<div class="progress progress-striped active">
  <div class="bar" style="width: 55%"></div>
</div>

</div>

<hr>

<div class="container">
    <footer class="copyright">

	    <!-- Languages -->		
		    <div class="btn-group">
		    <button class="btn btn-small"><?=lang('language')?></button>
		    <button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
		    <span class="caret"></span>
		    </button>
		    <ul class="dropdown-menu">
		    	<li><a href="<?=URL.'language/arabic/direction/rtl'?>"><?=lang('language_arabic')?></a></li>
		    	<li><a href="<?=URL.'language/english/direction/ltr'?>"><?=lang('language_english')?></a></li>
		    </ul>
		    </div>
	    <!-- Languages -->		

	    <!-- Templates -->		
			<div class="btn-group">
		    <button class="btn btn-small"><?=lang('template')?></button>
		    <button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
		    <span class="caret"></span>
		    </button>
		    <ul class="dropdown-menu">
		    	<li><a href="<?=URL.'template/default'?>"><?=lang('default')?></a></li>
		    </ul>
		    </div>
	    <!-- Templates -->		

		<?=lang('site_copyright')?>
    </footer>
</div>

</body>
</html>