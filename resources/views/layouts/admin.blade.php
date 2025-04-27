<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Azzara Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: { "families": ["Open+Sans:300,400,600,700"] },
			custom: { "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset('assets/css/fonts.css') }}']
		},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>

<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">

				<a href="{{ route('admin.dashboard') }}" class="logo">
					<img src="{{ asset('assets/img/logoazzara.svg') }}" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
					data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
								aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn"
								aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img">
													<img src="{{ asset('assets/img/jm_denis.jpg') }}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span>
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i
											class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i>
												</div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span>
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i
											class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
								aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle"></div>
										<div class="u-text">
											<h4>{{ Auth::user()->name }}</h4>
											<p class="text-muted">RS ANAK DAN BUNDA HARAPAN KITA</p>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-rounded btn-danger btn-sm">Logout</button>
                                            </form>
										</div>
									</div>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">

			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<span class="user-level">{{ Auth::user()->name }}</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					@php
						use Illuminate\Support\Facades\DB;

						// Ambil semua id menu yang diperlukan berdasarkan route_name
						$menuIds = [
							'pasien' => DB::table('menus')->where('route_name', 'pasien.index')->value('id'),
							'dokter' => DB::table('menus')->where('route_name', 'dokter.index')->value('id'),
							'pegawai' => DB::table('menus')->where('route_name', 'pegawai.index')->value('id'),
							'tindakan' => DB::table('menus')->where('route_name', 'tindakan.index')->value('id'),
							'ruangan' => DB::table('menus')->where('route_name', 'ruangpelayanans.index')->value('id'),
							'asuransi' => DB::table('menus')->where('route_name', 'asuransis.index')->value('id'),
							'registrasi' => DB::table('menus')->where('route_name', 'registrasi.index')->value('id'),
							'menu' => DB::table('menus')->where('route_name', 'menus.index')->value('id'),
						];
					@endphp

					<ul class="nav">
						{{-- Dashboard --}}
						@if (Auth::user()->role == 'admin')
							<li class="nav-item active">
								<a href="{{ route('admin.dashboard') }}">
									<i class="fas fa-home"></i>
									<p>Dashboard</p>
									<span class="badge badge-count">5</span>
								</a>
							</li>
						@elseif (Auth::user()->role == 'user')
							<li class="nav-item active">
								<a href="{{ route('home') }}">
									<i class="fas fa-home"></i>
									<p>Dashboard</p>
									<span class="badge badge-count">5</span>
								</a>
							</li>
						@endif

						{{-- Section --}}
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>

						{{-- Menu Data Pasien --}}
						@if (Auth::user()->role == 'admin' || in_array($menuIds['pasien'], $userMenus))
							<li class="nav-item">
								<a href="{{ route('pasien.index') }}">
									<i class="fas fa-users"></i>
									<p>Data Pasien</p>
								</a>
							</li>
						@endif

						{{-- Menu Data Dokter --}}
						@if (Auth::user()->role == 'admin' || in_array($menuIds['dokter'], $userMenus))
							<li class="nav-item">
								<a href="{{ route('dokter.index') }}">
									<i class="fas fa-user-md"></i>
									<p>Data Dokter</p>
								</a>
							</li>
						@endif

						{{-- Menu Data Pegawai --}}
						@if (Auth::user()->role == 'admin' || in_array($menuIds['pegawai'], $userMenus))
							<li class="nav-item">
								<a href="{{ route('pegawai.index') }}">
									<i class="fas fa-id-card"></i>
									<p>Data Pegawai</p>
								</a>
							</li>
						@endif

						{{-- Menu Tindakan --}}
						@if (Auth::user()->role == 'admin' || in_array($menuIds['tindakan'], $userMenus))
							<li class="nav-item">
								<a href="{{ route('tindakan.index') }}">
									<i class="fas fa-stethoscope"></i>
									<p>Tindakan</p>
								</a>
							</li>
						@endif

						{{-- Menu Ruangan Pelayanan --}}
						@if (Auth::user()->role == 'admin' || in_array($menuIds['ruangan'], $userMenus))
							<li class="nav-item">
								<a href="{{ route('ruangpelayanans.index') }}">
									<i class="fas fa-hospital"></i>
									<p>Ruangan Pelayanan</p>
								</a>
							</li>
						@endif

						{{-- Menu Asuransi --}}
						@if (Auth::user()->role == 'admin' || in_array($menuIds['asuransi'], $userMenus))
							<li class="nav-item">
								<a href="{{ route('asuransis.index') }}">
									<i class="fas fa-shield-alt"></i>
									<p>Asuransi</p>
								</a>
							</li>
						@endif

						{{-- Menu Registrasi --}}
						@if (Auth::user()->role == 'admin' || in_array($menuIds['registrasi'], $userMenus))
							<li class="nav-item">
								<a href="{{ route('registrasi.index') }}">
									<i class="fas fa-file-invoice"></i>
									<p>Registrasi</p>
								</a>
							</li>
						@endif

						{{-- Menu Transaksi --}}
						@if (Auth::user()->role == 'admin' || in_array($menuIds['transaksi'], $userMenus))
							<li class="nav-item">
								<a href="{{ route('transaksi.index') }}">
									<i class="fas fa-file-invoice"></i>
									<p>Transaksi</p>
								</a>
							</li>
						@endif

						{{-- Menu Master Menu --}}
						@if (Auth::user()->role == 'admin' || in_array($menuIds['menu'], $userMenus))
							<li class="nav-item">
								<a href="{{ route('menus.index') }}">
									<i class="fas fa-th-list"></i>
									<p>Menu</p>
								</a>
							</li>
						@endif
					</ul>

					
					{{-- <li class="nav-item">
						<a href="{{ route('user.give-access') }}">
							<i class="fas fa-file-invoice"></i>
							<p>Menu Access</p>
						</a>
					</li>                         --}}
					{{-- <li class="nav-item">
						<a data-toggle="collapse" href="#base">
							<i class="fas fa-layer-group"></i>
							<p>Base</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="base">
							<ul class="nav nav-collapse">
								<li>
									<a href="components/avatars.html">
										<span class="sub-item">Avatars</span>
									</a>
								</li>
								<li>
									<a href="components/buttons.html">
										<span class="sub-item">Buttons</span>
									</a>
								</li>
								<li>
									<a href="components/gridsystem.html">
										<span class="sub-item">Grid System</span>
									</a>
								</li>
								<li>
									<a href="components/panels.html">
										<span class="sub-item">Panels</span>
									</a>
								</li>
								<li>
									<a href="components/notifications.html">
										<span class="sub-item">Notifications</span>
									</a>
								</li>
								<li>
									<a href="components/sweetalert.html">
										<span class="sub-item">Sweet Alert</span>
									</a>
								</li>
								<li>
									<a href="components/font-awesome-icons.html">
										<span class="sub-item">Font Awesome Icons</span>
									</a>
								</li>
								<li>
									<a href="components/flaticons.html">
										<span class="sub-item">Flaticons</span>
									</a>
								</li>
								<li>
									<a href="components/typography.html">
										<span class="sub-item">Typography</span>
									</a>
								</li>
							</ul>
						</div>
					</li> --}}
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

        <div class="main-panel">
			<div class="content">
				<div class="page-inner">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Topbar</h4>
						<div class="btnSwitch">
							<button type="button" class="changeMainHeaderColor" data-color="blue"></button>
							<button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
							<button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeMainHeaderColor" data-color="green"></button>
							<button type="button" class="changeMainHeaderColor" data-color="orange"></button>
							<button type="button" class="changeMainHeaderColor" data-color="red"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    
	<!-- jQuery UI -->
	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
    
	<!-- jQuery Scrollbar -->
	<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    
	<!-- Moment JS -->
	<script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script>
    
	<!-- Chart JS -->
	<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
    
	<!-- jQuery Sparkline -->
	<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    
	<!-- Chart Circle -->
	<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
    
	<!-- Datatables -->
	<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    
	<!-- Bootstrap Notify -->
	<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    
	<!-- Bootstrap Toggle -->
	<script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
    
	<!-- jQuery Vector Maps -->
	<script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
    
	<!-- Google Maps Plugin -->
	<script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>
    
	<!-- Sweet Alert -->
	<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    
	<!-- Azzara JS -->
	<script src="{{ asset('assets/js/ready.min.js') }}"></script>
    
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="{{ asset('assets/js/setting-demo.js') }}"></script>
	<script src="{{ asset('assets/js/demo.js') }}"></script>
    <script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>

</html>