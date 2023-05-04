
(function ($) {

	//"use strict";

	//var fullHeight = function () {

	//	$('.js-fullheight').css('height', $(window).height());
	//	$(window).resize(function () {
	//		$('.js-fullheight').css('height', $(window).height());
	//	});

	//};
	//fullHeight();

	//$('#sidebarCollapse').on('click', function () {
	//	$('#sidebar').toggleClass('active');
	//});

	$('#menuToggle').on('click', function (event) {
		$('body').toggleClass('open');
	});

})(jQuery);



var btn = $('#button');

$(window).scroll(function () {
	if ($(window).scrollTop() > 300) {
		btn.addClass('show');
	} else {
		btn.removeClass('show');
	}
});

btn.on('click', function (e) {
	e.preventDefault();
	$('html, body').animate({ scrollTop: 0 }, '300');
});



function loginRedirectToDefault() {
	//Đằng nhập thanhg công, đang chuyển đến trang chủ...

	var count = 2;

	setInterval(function () {
		$(".message").html("Đăng nhập thanhg công, đang chuyển đến trang chủ sau " + count + "s...");
		count--;

		if (count < 0) {
			location.href = '/admin/Default.aspx'
		}
	}, 1000);

}

//Reviews
$(document).ready(function () {

	var edit = $('#unreply');
	var reply = $('#reply-cmt');

	$('#to-reply').click(function () {

		$("#unreply").slideUp();
		$("#reply-cmt").fadeIn();
	});
	$('.to-content').click(function () {

		$("#reply-cmt").hide();
		$("#unreply").fadeIn();
	});


	//$('.to-content').click(function () {

	//});

});

/*Excel*/
function exportTableToExcel(tableID, filename = '') {
	var downloadLink;
	var dataType = 'application/vnd.ms-excel';
	var tableSelect = document.getElementById(tableID);
	var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

	// Specify file name
	filename = filename ? filename + '.xls' : 'excel_data.xls';

	// Create download link element
	downloadLink = document.createElement("a");

	document.body.appendChild(downloadLink);

	if (navigator.msSaveOrOpenBlob) {
		var blob = new Blob(['\ufeff', tableHTML], {
			type: dataType
		});
		navigator.msSaveOrOpenBlob(blob, filename);
	} else {
		// Create a link to the file
		downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

		// Setting the file name
		downloadLink.download = filename;

		//triggering the function
		downloadLink.click();
	}
}

