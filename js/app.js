(function (w, d, ace, $) {
	Array.prototype.clean = function (deleteValue) {
		for (var i = 0; i < this.length; i++)
		{
			if (this[i] == deleteValue)
			{
				this.splice(i, 1);
				i--;
			}
		}
		return this;
	};

	var app = {
		path: w.location.pathname.split('/').clean(''),
		url: {
			update: '/update',
		},
		init: function () {
			this.editor.init();
		},
		editor: {
			$code: $('#code'),
			$type: $('#type'),
			core: ace.edit("editor"),
			init: function () {
				this.render();
				
				this.core.getSession().on('change', function (e) {
					app.editor.$code.val(app.editor.core.getValue());
				});
				
				this.$type.on('change', function(){
					app.editor.core.session.setMode(app.editor.$type.val());
				});
				
			},
			render: function () {
				this.core.setFontSize(16);
				this.core.setTheme("ace/theme/monokai");
				this.core.session.setMode(this.$type.val());
				this.core.setValue(this.$code.val(), 1);
			},
		},
	};

	app.init();

}(window, document, ace, jQuery));