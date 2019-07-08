<template>
		<nav class="sidebar">
			<div class="sidebar-content ">
				<a class="sidebar-brand" href="/">
					<!-- <i class="align-middle" data-feather="box"></i> -->
					<center>
						<img src="/dashboard/img/favicon/android-icon-72x72.png" />
						<p class="align-middle">HCW Mentorship Dashboard</p>
					</center>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>
					<li class="sidebar-item">
						<router-link class="sidebar-link" :to="{ name: 'dashboard.index' }"><i class="align-middle" data-feather="pie-chart"></i> <span class="align-middle">Dashboard</span></router-link>
					</li>
					<li class="sidebar-item">
						<router-link class="sidebar-link" :to="{ name: 'dashboard.hcwlist' }"><i class="align-middle" data-feather="users"></i> <span class="align-middle">Mentor List</span></router-link>
					</li>

					<li class="sidebar-item">
						<a href="#workplans" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="book"></i> <span class="align-middle">Workplans</span>
						</a>
						<ul id="workplans" class="sidebar-dropdown list-unstyled collapse">
							<li class="sidebar-item"><router-link class="sidebar-link" :to="{ name: 'dashboard.workplans.add' }"><i class="align-middle" data-feather="plus"></i> <span class="align-middle">Add Workplan</span></router-link></li>
							<li class="sidebar-item"><router-link class="sidebar-link" :to="{ name: 'dashboard.workplans' }"><i class="align-middle" data-feather="file"></i> <span class="align-middle">Workplans</span></router-link></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<router-link class="sidebar-link" :to="{ name: 'dashboard.workplans' }"><i class="align-middle" data-feather="book"></i> <span class="align-middle">Workplans</span></router-link>
					</li>
				</ul>

				<div class="sidebar-bottom d-none d-lg-block">
					<div class="media">
						<img class="rounded-circle mr-3" src="/dashboard/img/empty-profile.svg" alt="Chris Wood" width="40" height="40">
						<div class="media-body">
							<h5 class="mb-1">Sample Admin</h5>
							<div>
								<i class="fas fa-circle text-success"></i> Online
							</div>
						</div>
					</div>
				</div>

			</div>
		</nav>
</template>