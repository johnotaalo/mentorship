<template>
	<div>
		<b-card>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Select a County</label>
						<v-select :options="data.counties"></v-select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md">
					<b-table striped bordered :items="items" :fields="fields" small>
						<template slot="actions" slot-scope="data">
							<b-button size="sm" variant="warning" @click="viewWorkplan(data.item.id)">View</b-button>
						</template>
					</b-table>
				</div>
			</div>
		</b-card>
	</div>
</template>

<script type="text/javascript">
	export default {
		data(){
			return {
				data: {
					counties: []
				},
				fields: ['first_name', 'last_name', 'county', 'cycle', 'actions'],
				items: [
					{ id: 1, first_name: "Sample", last_name: "Mentor", county: "Nairobi", cycle: "June 2019" },
					{ id: 2, first_name: "Sample", last_name: "Mentor 2", county: "Kakamega", cycle: "June 2019" },
					{ id: 3, first_name: "Sample", last_name: "Mentor 3", county: "Kisumu", cycle: "November 2018" }
				]
			}
		},
		created(){
			this.getCounties()
		},
		methods: {
			getCounties: function(){
				axios.get('/api/data/counties')
				.then(res => {
					this.data.counties = _.map(res.data, (county) => {
						return {
							value: county.id,
							label: county.county
						}
					})
				})
			},
			viewWorkplan: function(id){
				this.$router.push({ name: 'dashboard.workplans.view', params: {id: id} })
			}
		}
	}
</script>