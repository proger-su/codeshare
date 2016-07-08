<form id="header" method="post" action="<?php echo $data['id'] ? '/update/' . $data['id'] : '/update' ?>">
	<div class="left">
		<select id="type" name="type">
			<?php foreach ($data['types'] as $val => $type) { ?>
				<option value="<?php echo $val ?>" <?php echo $val == $data['type'] ? 'selected' : '' ?>><?php echo $type; ?></option>
			<?php } ?>
		</select>
	</div>
	<a href="/" class="center">
		<img src="/img/logo.png" alt="" />
	</a>
	<div class="right">
		<textarea id="code" name="code" class="hidden"><?php echo $data['code'] ? $data['code'] : ''; ?></textarea>
		<button id="update" type="submit">Update</button>
	</div>
</form>

<div id="editor"></div>

<script src="/bower_components/ace-builds/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="/bower_components/jquery/dist/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/app.js" type="text/javascript" charset="utf-8"></script>