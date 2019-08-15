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
						<router-link class="sidebar-link" :to="{ name: 'dashboard.index' }"><i class="fa fa-home align-middle"></i> <span class="align-middle">Home</span></router-link>
					</li>
					<!-- <li class="sidebar-item">
						<router-link class="sidebar-link" :to="{ name: 'dashboard.hcwlist' }"><i class="align-middle" data-feather="users"></i> <span class="align-middle">Mentor List</span></router-link>
					</li> -->

					<li class="sidebar-item">
						<a href="#workplans" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="fa fa-book align-middle"></i> <span class="align-middle">Workplans</span>
						</a>
						<ul id="workplans" class="sidebar-dropdown list-unstyled collapse">
							<li class="sidebar-item"><router-link class="sidebar-link" :to="{ name: 'dashboard.workplans.add' }"><i class="fa fa-plus align-middle"></i> <span class="align-middle">Add Workplan</span></router-link></li>
							<li class="sidebar-item"><router-link class="sidebar-link" :to="{ name: 'dashboard.workplans' }"><i class="fa fa-file align-middle"></i> <span class="align-middle">View Workplans</span></router-link></li>
						</ul>
					</li>

					 <li class="sidebar-item" v-if="$auth.check()">
					 	<!-- <i class="align-middle" data-feather="log-out"></i>-->
						<a class="sidebar-link" href="#" @click.prevent="logout()"><i class="fa fa-lock"></i>&nbsp;Logout</a>
					</li>

					<!-- <li class="sidebar-item">
						<router-link class="sidebar-link" :to="{ name: 'dashboard.workplans' }"><i class="align-middle" data-feather="book"></i> <span class="align-middle">Workplans</span></router-link>
					</li> -->
				</ul>

				<!-- div class="sidebar-bottom d-none d-lg-block">
					<div class="media">
						<img class="rounded-circle mr-3" src="/dashboard/img/empty-profile.svg" alt="Chris Wood" width="40" height="40">
						<div class="media-body">
							<h5 class="mb-1">{{ $auth.user().name }}</h5>
							<div>
								<i class="fas fa-circle text-success"></i> Online
							</div>
						</div>
					</div>
				</div> -->

			</div>
		</nav>
</template>

<script type="text/javascript">
	export default {
		methods: {
			logout: function(){
				this.$auth.logout({
					success: function(res){
						this.$toastr.success(res.data.msg, "Logged Out");
						this.$router.push({name: 'login'});
					},
					error: function(){
						this.$toastr.error("Couldn't log you out", "Error");
					}
				})
			}
		}
	}
</script>