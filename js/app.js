(function (w, d, $) {
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
		init: function () {
			this.editor.init();
		},
		routeInit: function () {
			if (this.path.length) {
				return;
			}
		},
		editor: {
			core: ace.edit("editor"),
			init: function () {
				this.core.setTheme("ace/theme/monokai");
				this.core.session.setMode("ace/mode/php");
			},
		},
	};

	app.init();

}(window, document, jQuery));