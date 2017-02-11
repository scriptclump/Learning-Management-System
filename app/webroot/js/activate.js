$(document).ready(function() {

	$("a.status").unbind("change");
	$("a.status").click(function(){
		var p = this.firstChild;
		if (p.src.match('icon_1.png')) {
			$(p).attr({ src: Website.basePath + "img/icon_0.png", alt: "Activate" });
		} else {
			$(p).attr("src", Website.basePath + "img/icon_1.png");
			$(p).attr("alt","Deactivate");
		};
		$.get(this.href + "?" + new Date().getTime() );
		return false;
	});

	// For adding the short icons on the list.
	$('th a').append('&nbsp;&nbsp;&nbsp;<i class="icon-sort"></i>');
	$('th a.asc i').attr('class', 'icon-sort-down');
	$('th a.desc i').attr('class', 'icon-sort-up');

	// For select all option in admin listing.

	// add multiple select / deselect functionality
    $("#selectall").click(function () {
          $('.del_item').prop('checked', this.checked);
    });

    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $("#selectall").click(function(){
        if($(".del_item").length == $(".del_item:checked").length) {
            $("#selectall").prop("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }
    });

});
