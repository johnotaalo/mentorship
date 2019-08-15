<template>
	<div>
		<b-card>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Select Year</label>
						<v-select :options="['2018', '2019']" v-model="selectedYear"></v-select>
					</div>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md">
					<v-server-table url="/data/workplans" :columns="fields" :options="options">
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
					</v-server-table>
				</div>
			</div> -->
		</b-card>

		<div class="row">
			<div class="col-md">
				<Highcharts :options="monthOptions" style="height: 500px;"></Highcharts>
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
				axios.get(`/data/workplans/yearly/${year}`)
				.then(res => {
					this.workplans = res.data
				});
			},
			viewWorkplan: function(id){
				this.$router.push({ name: 'dashboard.workplans.view', params: {id: id} })
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
								console.log("clicked")
								console.log(event.point.name + " => " + event.point.value)
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