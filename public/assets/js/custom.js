"use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.table-responsive').on('show.bs.dropdown', function () {
    $('.table-responsive').css( "overflow", "inherit" );
});

$('.table-responsive').on('hide.bs.dropdown', function () {
    $('.table-responsive').css( "overflow", "auto" );
});

function toast(title, type = "") {
    toastr.options = {
        timeOut: 4000,
        closeButton: true,
        debug: true,
        progressBar: true,
    };
    if (type === "success") {
        toastr.success("", title);
    } else if(type === "info") {
        toastr.info("", title);
    } else if(type === "warning") {
        toastr.warning("", title);
    } else if(type === "error") {
        toastr.error("", title);
    } else {
        toastr.info("", title);
    }

    // toastr.error('Are you the 6 fingered man?',  'Inconceivable!', {timeOut: 15000});
    // Swal.fire({
    //     toast: true,
    //     title: title,
    //     text: '',
    //     type: type,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timer: 4000
    // });
}

function validationErrors(errors) {
    let txt = '';
    let err = Object.values(errors);
    err.forEach((error) => {
        let messages = error;
        messages.forEach((message) => {
            txt += `${message} <br>`;
        });
    });
    toast(txt, 'error')
}

function open_modal(url) {
    // $.blockUI();
    $.ajax({
        url: url,
        type: "GET",
        data: {},
        dataType: "json",
        cache: false,
        success: function (res) {
            $("#global-modal-title").html(res.title);
            $("#global-modal-body").html(res.html);
            // if ($("#global-modal-body").find('.select2')) {
            //     $("#global-modal-body").find('.select2').select2({
            //         theme: "bootstrap-5",
            //         dropdownParent: $('#global-modal')
            //     });
            // }
            $("#global-modal").modal("show");
            // select2_focus_on_open("#global-modal select.select2");
            // $.unblockUI();
        },
        error: function(xhr, error, thrown) {
            if(xhr.status === 401) {
                toast("The session has been expired", "error");
                setTimeout(function(){
                    window.location.href = "/";
                },3000);
            }
            else{
                toast('Server error loading dialog', 'error');
            }
        }
    });
}

function hide_modal(address) {
    $('#global-modal').modal('hide');
}

function statusRequest(url) {
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        cache: false,
        success: function(res) {
            toast(res.message, res.type);
        },
        error: function(xhr, error, thrown) {
            if (xhr.status === 401) {
                toast("The session has been expired", "error");
                setTimeout(function () {
                    window.location.href = "/";
                }, 3000);
            }
        }
    });
}

function deleteRequest(url, id, label) {
    Swal.fire({
        text: `Are you sure you want to delete this ${label}?`,
        type: 'warning',
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: 'No',
        customClass: {
            confirmButton: "btn btn-primary me-2",
            cancelButton: 'btn btn-secondary'
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "json",
                data:{
                    'id': id
                },
                cache: false,
                success: function(res) {
                    toast(res.message, res.type);
                    if(res.type == "success") {
                        table.ajax.reload();
                    }
                },
                error: function(xhr, error, thrown) {
                    if (xhr.status === 401) {
                        toast("The session has been expired", "error");
                        setTimeout(function () {
                            window.location.href = "/";
                        }, 3000);
                    }
                }
            });
        }
    });
}

function getNotifications(notifications) {
    let alert = $("#notification-alert");
    if (alert.hasClass('notification-count wave in')) {
        alert.removeClass('notification-count wave in');
    }

    if (notifications.count > 0) {
        alert.addClass('notification-count wave in');
    }

    $("#notificationsBox").html(notifications.html);
}


/***************************************************
****************************************************
// Counter Active Js
****************************************************
***************************************************/

$( function() {
	$('.counter').countUp();
});


/***************************************************
****************************************************
// Feather Active Js
****************************************************
***************************************************/

$( function() {
	feather.replace()
});

/***************************************************
****************************************************
// Show and hide Search Form JS
****************************************************
***************************************************/
var handleSearchForm = function() {
	$("#search-button").on('click', function () {
		$('body').addClass('search-open');
	});

	$("#close-search").on('click', function () {
		$('body').removeClass('search-open');
	});
};


/***************************************************
****************************************************
// Web Ticker Active Js
****************************************************
***************************************************/
$(function () {
 	if ($('#webticker').length) {
		$("#webticker").webTicker({
			height:'auto',
			duplicate:true,
			startEmpty:true,
			rssfrequency:1
		});
	}

});


/***************************************************
****************************************************
// Setting Sidebar Active Js
****************************************************
***************************************************/
$( "document" ).ready( function() {
	var $mainSidebar = $( "#settingSidebar" );

	$mainSidebar.simplerSidebar( {
		attr: "sidebar-main",
		init: "closed",
		selectors: {
			trigger: "#settingSidebarTrigger",
			quitter: ".quitter"
		},
		animation: {
			easing: "easeOutQuint"
		}
	} );
} );


/***************************************************
****************************************************
// Setting Sidebar Active Js
****************************************************
***************************************************/
$( "document" ).ready( function() {
	var $mainSidebar = $( "#demoSettingSidebar" );

	$mainSidebar.simplerSidebar( {
		attr: "sidebar-main",
		init: "closed",
		selectors: {
			trigger: "#demoSettingSidebarTrigger",
			quitter: ".quitter"
		},
		animation: {
			easing: "easeOutQuint"
		}
	} );
} );


/***************************************************
****************************************************
// Dropdown Animation
****************************************************
***************************************************/
// Add slidedown & fadein animation to dropdown
var handleDropdownAnimation = function() {
	$('.dropdown').on('show.bs.dropdown', function (e) {
		var $dropdown = $(this).find('.dropdown-menu');
		var orig_margin_top = parseInt($dropdown.css('margin-top'));
		$dropdown.css({
			'margin-top': (orig_margin_top + 25) + 'px',
			opacity: 0
		}).animate({
			'margin-top': orig_margin_top + 'px',
			opacity: 1
		}, 500, function () {
			$(this).css({
				'margin-top': ''
			});
		});
	});
	// Add slidedown & fadeout animation to dropdown
	$('.dropdown').on('hide.bs.dropdown', function (e) {
		var $dropdown = $(this).find('.dropdown-menu');
		var orig_margin_top = parseInt($dropdown.css('margin-top'));
		$dropdown.css({
			'margin-top': orig_margin_top + 'px',
			opacity: 1,
			display: 'block'
		}).animate({
			'margin-top': (orig_margin_top + 25) + 'px',
			opacity: 0
		}, 500, function () {
			$(this).css({
				'margin-top': '',
				display: ''
			});
		});
	});

}

/***************************************************
****************************************************
// Toster Notifications
****************************************************
***************************************************/
var handleTosterNotifications = function() {
	var i = -1;
	var toastCount = 0;
	var $toastlast;
	var getMessage = function () {
		var msg = 'Hi, welcome to Metrical. This is example of Toastr notification box.';
		return msg;
	};

	$('#showsimple').on('click', (function () {
		// Display a success toast, with a title
		toastr.success('Without any options', 'Simple notification!')
	}));
	$('#showtoast').on('click', (function () {
		var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
		var msg = $('#message').val();
		var title = $('#title').val() || '';
		var $showDuration = $('#showDuration');
		var $hideDuration = $('#hideDuration');
		var $timeOut = $('#timeOut');
		var $extendedTimeOut = $('#extendedTimeOut');
		var $showEasing = $('#showEasing');
		var $hideEasing = $('#hideEasing');
		var $showMethod = $('#showMethod');
		var $hideMethod = $('#hideMethod');
		var toastIndex = toastCount++;
		toastr.options = {
			closeButton: $('#closeButton').prop('checked'),
			debug: $('#debugInfo').prop('checked'),
			progressBar: $('#progressBar').prop('checked'),
			preventDuplicates: $('#preventDuplicates').prop('checked'),
			positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
			onclick: null
		};
		if ($('#addBehaviorOnToastClick').prop('checked')) {
			toastr.options.onclick = function () {
				alert('You can perform some custom action after a toast goes away');
			};
		}
		if ($showDuration.val().length) {
			toastr.options.showDuration = $showDuration.val();
		}
		if ($hideDuration.val().length) {
			toastr.options.hideDuration = $hideDuration.val();
		}
		if ($timeOut.val().length) {
			toastr.options.timeOut = $timeOut.val();
		}
		if ($extendedTimeOut.val().length) {
			toastr.options.extendedTimeOut = $extendedTimeOut.val();
		}
		if ($showEasing.val().length) {
			toastr.options.showEasing = $showEasing.val();
		}
		if ($hideEasing.val().length) {
			toastr.options.hideEasing = $hideEasing.val();
		}
		if ($showMethod.val().length) {
			toastr.options.showMethod = $showMethod.val();
		}
		if ($hideMethod.val().length) {
			toastr.options.hideMethod = $hideMethod.val();
		}
		if (!msg) {
			msg = getMessage();
		}
		$("#toastrOptions").text("Command: toastr[" +
			shortCutFunction +
			"](\"" +
			msg +
			(title ? "\", \"" + title : '') +
			"\")\n\ntoastr.options = " +
			JSON.stringify(toastr.options, null, 2)
		);
		var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
		$toastlast = $toast;
		if ($toast.find('#okBtn').length) {
			$toast.delegate('#okBtn') .on('click', function () {
				alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
				$toast.remove();
			});
		}
		if ($toast.find('#surpriseBtn').length) {
			$toast.delegate('#surpriseBtn') .no('click', function () {
				alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
			});
		}
	}));

	function getLastToast() {
		return $toastlast;
	}
	$('#clearlasttoast').on('click', (function (){
		toastr.clear(getLastToast());
	}));
	$('#cleartoasts').on('click', (function (){
		toastr.clear();
	}));
};


/***************************************************
****************************************************
// Mask Formatter
****************************************************
***************************************************/
var handleMaskFormatter = function() {
	provider.initFormatter = function () {
		if (!$.fn.formatter) {
			return;
		}

		provider.provide('formatter', function () {
			var options = {
				pattern: $(this).data('format'),
				persistent: $(this).dataAttr('persistent', true),
			}

			$(this).formatter(options);
		});

	}

};


/***************************************************
****************************************************
// Card - Remove / Reload / Collapse / Expand
****************************************************
***************************************************/
var cardActionRunning = false;
var handleCardAction = function() {
	"use strict";

	if (cardActionRunning) {
		return false;
	}
	cardActionRunning = true;

	// collapse
	$(document).on('mouseover', '[data-toggle=collapse]', function(e) {
		if (!$(this).attr('data-init')) {
			$(this).tooltip({
				title: 'Collapse/Expand',
				placement: 'bottom',
				trigger: 'hover',
				container: 'body'
			});
			$(this).tooltip('show');
			$(this).attr('data-init', true);
		}
	});
	/*$(document).on('click', '[data-toggle=collapse]', function(e) {
		e.preventDefault();
		$(this).closest('.card').find('.card-body').slideToggle();
	});*/

	// reload
	$(document).on('mouseover', '[data-toggle=refresh]', function(e) {
		if (!$(this).attr('data-init')) {
			$(this).tooltip({
				title: 'Refresh',
				placement: 'bottom',
				trigger: 'hover',
				container: 'body'
			});
			$(this).tooltip('show');
		}
	});
	$(document).on('click', '[data-toggle=refresh]', function(e) {
		e.preventDefault();
		var target = $(this).closest('.card');
		if (!$(target).hasClass('card-loading')) {
			var targetBody = $(target).find('.card-body');
			var spinnerClass = ($(this).attr('data-spinner-class')) ? $(this).attr('data-spinner-class') : 'text-primary';
			var spinnerHtml = '<div class="card-loader"><div class="spinner-border '+ spinnerClass +'"></div></div>';
			$(target).addClass('card-loading');
			if ($(targetBody).length !== 0) {
				$(targetBody).append(spinnerHtml);
			} else {
				$(target).append(spinnerHtml);
			}
			setTimeout(function() {
				$(target).removeClass('card-loading');
				$(target).find('.card-loader').remove();
			}, 2000);
		}
	});

	// expand
	$(document).on('mouseover', '[data-toggle=expand]', function(e) {
		if (!$(this).attr('data-init')) {
			$(this).tooltip({
				title: 'Minimize/Maximize',
				placement: 'bottom',
				trigger: 'hover',
				container: 'body'
			});
			$(this).tooltip('show');
			$(this).attr('data-init', true);
		}
	});
	$(document).on('click', '[data-toggle=expand]', function(e) {
		e.preventDefault();
		var target = $(this).closest('.card');
		var targetBody = $(target).find('.card-body');
		var targetClass = 'card-expand';
		var targetTop = 40;
		if ($(targetBody).length !== 0) {
			var targetOffsetTop = $(target).offset().top;
			var targetBodyOffsetTop = $(targetBody).offset().top;
			targetTop = targetBodyOffsetTop - targetOffsetTop;
		}

		if ($('body').hasClass(targetClass) && $(target).hasClass(targetClass)) {
			$('body, .card').removeClass(targetClass);
			$('.card').removeAttr('style');
			$(targetBody).removeAttr('style');
		} else {
			$('body').addClass(targetClass);
			$(this).closest('.card').addClass(targetClass);
		}
		$(window).trigger('resize');
	});

	// remove
	$(document).on('mouseover', '[data-toggle=remove]', function(e) {
		if (!$(this).attr('data-init')) {
			$(this).tooltip({
				title: 'Remove',
				placement: 'bottom',
				trigger: 'hover',
				container: 'body'
			});
			$(this).tooltip('show');
			$(this).attr('data-init', true);
		}
	});
	$(document).on('click', '[data-toggle=remove]', function(e) {
		e.preventDefault();
		$(this).tooltip('dispose');
		$(this).closest('.card').remove();
	});


};

/***************************************************
****************************************************
// Tooltip & Popover
****************************************************
***************************************************/
var handelTooltipPopoverActivation = function() {
	"use strict";
	if ($('[data-toggle="tooltip"]').length !== 0) {
		$('[data-toggle=tooltip]').tooltip();
	}
	if ($('[data-toggle="popover"]').length !== 0) {
		$('[data-toggle=popover]').popover();
	}
};


/***************************************************
****************************************************
// Slimscroll Active Code
****************************************************
***************************************************/
if ($.fn.slimscroll) {
	$('#messageBox, #notificationsBox, #onlineBox, #activityLog').slimscroll({
		height: '260px',
		size: '2px',
		position: 'right',
		color: '#A5A7AB',
		alwaysVisible: false,
		distance: '0px',
		railVisible: false,
		wheelStep: 15
	});
}

if ($.fn.slimscroll) {
	$('#activityLog1, #activityLog2, #activityLog3, #recentComment').slimscroll({
		height: '350px',
		size: '2px',
		position: 'right',
		color: '#A5A7AB',
		alwaysVisible: false,
		distance: '0px',
		railVisible: false,
		wheelStep: 15
	});
}


if ($.fn.slimscroll) {
	$('#chatPeopleList').slimscroll({
		height: '460px',
		size: '2px',
		position: 'right',
		color: '#A5A7AB',
		alwaysVisible: false,
		distance: '0px',
		railVisible: false,
		wheelStep: 15
	});
}


if ($.fn.slimscroll) {
	$('#chatMessages').slimscroll({
		height: '550px',
		size: '2px',
		position: 'right',
		color: '#A5A7AB',
		alwaysVisible: false,
		distance: '0px',
		railVisible: false,
		wheelStep: 15
	});
}

if ($.fn.slimscroll) {
	$('#settingSidebarScroll, #demoSettingSidebarScroll').slimscroll({
		height: '100%',
		size: '5px',
		position: 'right',
		color: '#1b2835',
		alwaysVisible: false,
		distance: '0px',
		railVisible: false,
		wheelStep: 15
	});
}


/***************************************************
****************************************************
// Scrollbar
****************************************************
***************************************************/
var handleSlimScroll = function() {
	"use strict";
	$('[data-scrollbar=true]').each( function() {
		generateSlimScroll($(this));
	});
};
var generateSlimScroll = function(element) {
	if ($(element).attr('data-init')) {
		return;
	}
	var dataHeight = $(element).attr('data-height');
		dataHeight = (!dataHeight) ? $(element).height() : dataHeight;

	var scrollBarOption = {
		height: dataHeight,
		alwaysVisible: false
	};
	if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		$(element).css('height', dataHeight);
		$(element).css('overflow-x','scroll');
	} else {
		$(element).slimScroll(scrollBarOption);
		$(element).closest('.slimScrollDiv').find('.slimScrollBar').hide();
	}
	$(element).attr('data-init', true);
};


/***************************************************
****************************************************
// Scroll to Top Button
****************************************************
***************************************************/
var handleScrollToTopButton = function() {
	"use strict";
	$(document).scroll( function() {
		var totalScroll = $(document).scrollTop();

		if (totalScroll >= 200) {
			$('[data-click=scroll-top]').addClass('show');
		} else {
			$('[data-click=scroll-top]').removeClass('show');
		}
	});
	$('.content').scroll( function() {
		var totalScroll = $('.content').scrollTop();

		if (totalScroll >= 200) {
			$('[data-click=scroll-top]').addClass('show');
		} else {
			$('[data-click=scroll-top]').removeClass('show');
		}
	});
	$('[data-click=scroll-top]').on('click', function(e) {
		e.preventDefault();
		$('html, body, .content').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});
};


/***************************************************
****************************************************
// Application Controller
****************************************************
***************************************************/
var App = function () {
	"use strict";

	return {
		init: function () {
			this.initComponent();
		},
		initComponent: function() {
			handleSearchForm();
			handleDropdownAnimation();
			handleTosterNotifications();
			handleCardAction();
			handelTooltipPopoverActivation();
			handleSlimScroll();
			handleScrollToTopButton();
		},
		scrollTop: function() {
			$('html, body, .content').animate({
				scrollTop: $('body').offset().top
			}, 0);
		}
	};
}();

$(document).ready(function() {
	App.init();
});
