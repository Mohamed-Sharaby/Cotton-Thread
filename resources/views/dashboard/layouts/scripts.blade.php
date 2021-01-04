<script src="{{asset('admin/global_assets/js/main/jquery.min.js')}}"></script>
<script src="{{asset('admin/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/loaders/pace.min.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{asset('admin/js/app.js')}}"></script>
<script src="{{asset('admin/global_assets/js/demo_pages/dashboard.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.js"></script>
<script>
	$(document).ready(function() {
		$('.table').DataTable({
			responsive: true,
			language: {
				"sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
				"sLoadingRecords": "جارٍ التحميل...",
				"sProcessing": "جارٍ التحميل...",
				"sLengthMenu": "أظهر _MENU_ مدخلات",
				"sZeroRecords": "لم يعثر على أية سجلات",
				"sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
				"sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
				"sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
				"sInfoPostFix": "",
				"sSearch": "ابحث:",
				"sUrl": "",
				"oPaginate": {
					"sFirst": "الأول",
					"sPrevious": "السابق",
					"sNext": "التالي",
					"sLast": "الأخير"
				},
				"oAria": {
					"sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
					"sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
				}
			},
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			// "buttons": [{
			// 	extend: 'excelHtml5',
			// 	text: 'اكسيل'
			// }]
		});
	});
</script>
<script src="{{asset('admin/global_assets/js/demo_pages/form_multiselect.js')}}"></script>
<script src="{{asset('admin/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global_assets/js/demo_pages/form_validation.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.15.0/standard-all/ckeditor.js"></script>
<script>
	CKEDITOR.config.language = "{{app()->getLocale()}}";
</script>
<script>
	$(document).ready(function() {
		CKEDITOR.config.language = "{{app()->getLocale()}}";

		$(document).on('click', 'button.btn.btn-danger', function(e) {
			let confirmResult = confirm('{{__('هل انت متأكد من حذف هذا البيان؟')}}');
			if (confirmResult) {

			} else {
				e.preventDefault();
			}
		});

		$(document).on('click', '.del_img', function(e) {
			let confirmResult = confirm('{{__('Are you sure you want to delete this Photo ? ')}}');
			if (confirmResult) {

			} else {
				e.preventDefault();
			}
		});


		$("#select-all").click(function() {
			$("input[type=checkbox]").prop('checked', $(this).prop('checked'));
		});
	});
</script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
