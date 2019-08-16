<template>
	<div>
		<div class="row">
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<div v-if="selectedMonth != ''">
							<b-button variant = "primary" @click="backToMapping" size="sm"><i class="fa fa-arrow-left"></i>&nbsp;Back to Tree Map</b-button>
							<v-server-table :url="`/data/workplans/${selectedMonth}/${selectedYear}`" :columns="fields" :options="options">
								<template slot="name" slot-scope="data">
									{{ data.row.mentor.name }}
								</template>

								<template slot='county' slot-scope="data">
									{{ data.row.county.county }}
								</template>

								<template slot='facility' slot-scope="data">
									{{ data.row.venue.facility_name }}
								</template>

								<template slot="cycle" slot-scope="data">
									{{ data.row.period_month }} {{ data.row.period_year }}
								</template>

								<template slot-scope = "data" slot="actions">
									<router-link class = "btn btn-sm btn-primary" :to="{ name: 'dashboard.workplan.view', params: { id: data.row.id } }"><i class="fa fa-eye align-middle"></i> <span class="align-middle">View Workplan</span></router-link>
								</template>
							</v-server-table>
						</div>
						<div v-else>
						<div class="row">
							<div class="col-md-3 offset-9">
								<div class="form-group">
									<label>Select Year</label>
									<v-select :options="['2019', '2018']" v-model="selectedYear"></v-select>
								</div>
							</div>
						</div>
						<Highcharts :options="monthOptions" style="height: 500px;"></Highcharts>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		data(){
			return {
				selectedCounty: { value: "", label: "All Counties" },
				selectedYear: '2019',
				selectedMonth: '',
				data: {
					counties: [],
					workplans: []
				},
				fields: ['name', 'county', 'facility', 'cycle', 'actions'],
				itemsx: [
					{ id: 1, first_name: "Sample", last_name: "Mentor", county: "Nairobi", cycle: "June 2019" },
					{ id: 2, first_name: "Sample", last_name: "Mentor 2", county: "Kakamega", cycle: "June 2019" },
					{ id: 3, first_name: "Sample", last_name: "Mentor 3", county: "Kisumu", cycle: "November 2018" }
				],
				workplans: [],
				options: {}
			}
		},
		created(){
			// this.getCounties()
			this.getWorkplans(this.selectedYear)
		},
		methods: {
			getCounties: function(){
				axios.get('/data/counties')
				.then(res => {
					this.data.counties = _.map(res.data, (county) => {
						return {
							value: county.id,
							label: county.county
						}
					})

					this.data.counties.unshift({ value: "", label: "All Counties" });
				})
			},

			getWorkplans(year){
				axios.get(`/data/all-workplans/yearly/${year}`)
				.then(res => {
					this.workplans = res.data
				});
			},
			viewWorkplan: function(id){
				this.$router.push({ name: 'dashboard.workplans.view', params: {id: id} })
			},
			backToMapping: function(){
				this.selectedMonth = ""
			}
		},
		computed: {
			items: function(){
				if (this.selectedCounty.value != "") {
					// Filter workplans
				}else{

				}
			},
			monthOptions: function(){
				var data = [];
				data = _.map(this.workplans, (workplan, index) => {
					return {
						name: workplan.month,
						value: workplan.workplans,
						colorValue: index + 1
					};
				})
				return {
					colorAxis: {
						minColor: '#FFFFFF',
						maxColor: '#D50000'
					},
					series: [{
						type: 'treemap',
						layoutAlgorithm: 'squarified',
						data: data,
						events: {
							click: (event) => {
								this.selectedMonth = event.point.name
							}
						}
					}],
					title: {
						text: 'Monthly Distribution for ' + this.selectedYear
					}
				}
			}
		},
		watch: {
			selectedYear: function(val){
				this.getWorkplans(val)
			}
		}
	}
</script>