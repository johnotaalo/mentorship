<template>
		<nav class="navbar navbar-expand navbar-light bg-white">
			<a class="sidebar-toggle d-flex mr-2">
				<i class="hamburger align-self-center"></i>
			</a>

			<div class="navbar-collapse collapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
							<i class="align-middle" data-feather="settings"></i>
						</a>

						<a class="nav-link d-none align-middle d-sm-inline-block" href="#">
							<!-- <img src="/dashboard/img/empty-profile.svg" class="avatar img-fluid rounded-circle mr-1" alt="Sample Admin" />  -->
							<i class="fa fa-user-md text-success"></i>&nbsp;&nbsp;<span class="text-dark">{{ $auth.user().name }}</span>
						</a>
						<!-- <div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
							<a class="dropdown-item" href="#">Sign out</a>
						</div> -->
					</li>
				</ul>
			</div>
		</nav>
</template>