﻿var updateJFilerValue = function () {
	var indexSrcs = [];
	$(".jFiler-item-inner").each(function () {
		var numberElem = $(this).find(".jFiler-item-assets .number");
		var src = numberElem.data("url");
		var index = numberElem.val();
		index = parseInt(index) || 999;

		indexSrcs.push({ index: index, src: src });
	})

	indexSrcs.sort(function (a, b) {
		return (a.index > b.index) ? 1 : ((b.index > a.index) ? -1 : 0);
	});

	var result = "";
	for (i = 0; i < indexSrcs.length; i++) {
		result += indexSrcs[i].src + ";";
	}

	$(".urls-file-multi-upload").val(result);
};

$(document).ready(function () {
	$(".icon-jfi-trash.jFiler-item-trash-action").click(function () {
		if(confirm("Bạn có chắc muốn xóa hình ảnh này?"))
			$(this).closest(".jFiler-item").remove();
	});

	$(".file-multi-upload").filer({
		limit: null,
		maxSize: null,
		extensions: null,
		changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Kéo và thả hình ảnh vào đây</h3> <span style="display:inline-block; margin: 15px 0">hoặc</span></div><a class="jFiler-input-choose-btn blue">Click để chọn những hình ảnh phù hợp</a></div></div>',
		showThumbs: true,
		theme: "dragdropbox",
		templates: {
			box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
			item: '<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-left">\
										<li><input class="number hide" type="text" placeholder="Số thứ tự sắp xếp"/></li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',
			itemAppend: '<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',
			progressBar: '<div class="bar"></div>',
			itemAppendToEnd: false,
			canvasImage: true,
			removeConfirmation: true,
			_selectors: {
				list: '.jFiler-items-list',
				item: '.jFiler-item',
				progressBar: '.bar',
				remove: '.jFiler-item-trash-action'
			}
		},
		dragDrop: {
			dragEnter: null,
			dragLeave: null,
			drop: null,
			dragContainer: null,
		},
		uploadFile: {
			url: "/Admin/plugins/jQuery.filer.1.3.0/asp/Handler.ashx?folder=" + $(".file-multi-upload.image-list").data("folder"),
			data: null,
			type: 'POST',
			enctype: 'multipart/form-data',
			synchron: true,
			beforeSend: function(){},
			success: function (data, itemEl, listEl, boxEl, newInputEl, inputEl, id) {
				var parent = itemEl.find(".jFiler-jProgressBar").parent(),
					new_file_name = data,
					filerKit = inputEl.prop("jFiler");

				filerKit.files_list[id].name = new_file_name;

				itemEl.find(".jFiler-jProgressBar").fadeOut("slow", function(){
					$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i></div>").hide().appendTo(parent).fadeIn("slow");
				});

				itemEl.find(".number").data("url", new_file_name);
				itemEl.find(".number").delay(1000).fadeIn("slow");
			},
			error: function(el){
				var parent = el.find(".jFiler-jProgressBar").parent();
				el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
					$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i></div>").hide().appendTo(parent).fadeIn("slow");
				});
			},
			statusCode: null,
			onProgress: null,
			onComplete: null
		},
		files: null,
		addMore: false,
		allowDuplicates: true,
		clipBoardPaste: true,
		excludeName: null,
		beforeRender: null,
		afterRender: null,
		beforeShow: null,
		beforeSelect: null,
		onSelect: null,
        afterShow: null,
        onRemove: function (item, listEl, parentEl, newInputEl, inputEl) {
			//var filerKit = inputEl.prop("jFiler"),
			//	  file_name = filerKit.files_list[id].name;
            //    alert(file_name);
			//$.post("", {
			//	file: file_name
			//});
		},
		onEmpty: null,
		options: null,
		dialogs: {
			alert: function(text) {
				return alert(text);
			},
			confirm: function (text, callback) {
				confirm(text) ? callback() : null;
			}
		},
		captions: {
			button: "Choose Files",
			feedback: "Choose files To Upload",
			feedback2: "files were chosen",
			drop: "Drop file here to Upload",
			removeConfirmation: "Bạn có chắc muốn xóa hình ảnh này?",
			errors: {
				filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
				filesType: "Only Images are allowed to be uploaded.",
				filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
				filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
			}
		}
	});
})
