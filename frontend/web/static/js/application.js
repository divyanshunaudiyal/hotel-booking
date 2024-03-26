
var classes = ['item-blue', 'item-red', 'item-grey', 'item-green', 'item-pink', 'item-default'];
$("ul#tasks li").each(function () {
		if (classes.length === 0)
				return false; // break jQuery each
		var index = Math.floor(Math.random() * classes.length);
		var className = classes[index];
		$(this).addClass(className);
		classes.splice(index, 1);
});


$(function () {
		if ($('#userListName').length > 0) {
				$("#userListName").autocomplete({
						source: JS_BASE_URL + 'user/alluser',
						minLength: 4,
				});
		}
                if ($('#userListRef').length > 0) {
                    $("#userListRef").autocomplete({
                        source: JS_BASE_URL + 'user/userrefferalcode',
                        minLength: 3,
                    });
		}
		$("#userListPan").autocomplete({
				minLength: 0,
				source: 'http://be.pms-aif.local/user/searchpan',
				focus: function (event, ui) {
						$("#userListPan").val(ui.item.label);
						return false;
				},
				select: function (event, ui) {
						$("#userListPan").val(ui.item.label);
						$("#userListPan_id").val(ui.item.value);

						return false;
				}
		})
										.autocomplete("instance")._renderItem = function (ul, item) {
				return $("<li>")
												.append("<a>" + item.label + "</a>")
												.appendTo(ul);
		};
});

