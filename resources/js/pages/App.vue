<template>
	<div class="wrapper" v-if="showMenus">
		<side-bar />
		<div class="main">
			<top-bar/>
			<main class="content">
				<div class="container-fluid p-0">
					<router-view></router-view>
				</div>
			</main>
		</div>
	</div>
	<div v-else>
		<main class="main d-flex w-100">
			<div class="container d-flex flex-column">
				<div class="row h-100">
					<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
						<div class="d-table-cell align-middle">
							<div class="card">
								<div class="card-body">
									<div class="m-sm-4">
										<div class="text-center">
											<img src="/dashboard/img/favicon/android-icon-192x192.png" alt="MoH" class="img-fluid rounded-circle" width="132" height="132" />
										</div>

										<router-view></router-view>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</template>

<script type="text/javascript">
	export default {
		created(){
			console.log(this.$route)
		},
		computed: {
			showMenus: function(){
				var route = this.$route.name
				if (route == "login") {
					return false
				}else{
					return true
				}
			}
		}
	}
</script>