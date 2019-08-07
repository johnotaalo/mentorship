<template>
	<div>
		<div class="row">
			<div class="col-md">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Mentors</h5>
						<h6 class="card-subtitle text-muted">These are the persons selected from the list of HCW Workers.</h6>
					</div>
					<div class="card-body">
						<v-server-table url="/api/data/mentors" :columns="table.columns" :options="table.options">
							<template slot="name" slot-scope="data">
								{{ data.row.name }}
							</template>

							<template slot = "actions">
								<button class="btn btn-sm btn-primary"><i class="fa fa-folder-plus"></i>&nbsp;Add Workplan</button>&nbsp;&nbsp;<button class="btn btn-sm btn-warning"><i class="fa fa-eye"></i>&nbsp;View Workplan(s)</button>
							</template>
						</v-server-table>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	// import _ from 'lodash'
	export default {
		data(){
			return {
				table: {
					columns: ['name', 'email', 'phone', 'actions'],
					options: {}
				}
			}
		}
	}
</script>