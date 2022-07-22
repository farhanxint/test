{!! Html::script('assets/js/bootstrap.bundle.min.js') !!}
{!! Html::script('assets/js/jquery.min.js') !!}
{!! Html::script('assets/plugins/simplebar/js/simplebar.min.js') !!}
{!! Html::script('assets/plugins/metismenu/js/metisMenu.min.js') !!}
{!! Html::script('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"') !!}
{!! Html::script('assets/js/app.js') !!}
{!! Html::script('assets/js/vendor/sweetalert2.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') !!}
{!! Html::script('assets/js/es5/script.min.js') !!}
{!! Html::script('assets/js/app/global.js') !!}
{!! Html::script('assets/js/app/custom.js') !!}
{!! Html::script('assets/js/es5/customizer.script.min.js') !!}
{!! Html::script('assets/js/es5/sidebar.large.script.min.js') !!}
{!! Html::script('assets/js/es5/sidebar.large.script.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js') !!}

{!! Html::script('https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js') !!}

{!! Html::script('assets/js/popper.min.js') !!}
{!! Html::script('assets/js/owl.carousel.min.js') !!}
{!! Html::script('assets/js/custom.js') !!}


<!-- Product Image Gallery Js -->
{!! Html::script('https://code.jquery.com/jquery-3.3.1.min.js') !!}
{!! Html::script('assets/js/scripts/zoom-image.js') !!}
{!! Html::script('assets/js/scripts/main.js') !!}

{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js') !!}
<script>
    		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
</script>
