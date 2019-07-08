<template>
	<div class="card">
		<div class="card-body">
			<p>
				<strong>County Name: </strong>
				<span v-if="!searchable">{{ mentor.county }}</span>
				<b-select :options="counties" v-else></b-select>
			</p>

			<center><h4>ETAT + TOT MENTORSHIP WORKPLAN</h4></center>

			<table class="table table-bordered">
				<tr>
					<td>
						<b>Mentor Name: </b>
						<span v-if="!searchable">{{ mentor.hcw_name }}</span>
						<b-select :options="mentorsList" v-else></b-select>
					</td>
					<td>
						<b>Mentorship Period</b>
						<div class="row">
							<div class="col-md">
								<b-select v-model="selectedMonth">
									<template slot="first">
										<option :value="null" disabled>Select Month</option>
									</template>
								</b-select>
							</div>
							<div class="col-md">
								<b-select v-model="selectedYear">
									<template slot="first">
										<option :value="null" disabled>Select Year</option>
									</template>
								</b-select>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td><b>Health Facility Name (Mentorship Venue):</b> {{ mentor.facility_name }}</td>
					<td>
						<b>Mentor Workstation: </b>{{ mentor.facility_name }}
					</td>
				</tr>
				<tr>
					<td>
						<b>Mentor Contact Number: </b>{{ mentor.contact }}
					</td>
					<td>
						<b>Mentor Email Address: </b>{{ mentor.email }}
					</td>
				</tr>
			</table>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Site / Service Delivery Area (Indicate)</th>
						<th>Mentee (Indicate cadre & number of pax)</th>
						<th># of sections planned</th>
						<th>Cases to be reviewed (list of cases based on audit)</th>
						<th>Skills to be mentored (list of skills)</th>
						<th>Resources needed</th>
						<th>Expected outcome of the mentorship session/s</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<b-select :options="sites"></b-select>
							<!-- <select name = "sites[]">
								<option>Labor Ward</option>
								<option>Paedriatic Ward</option>
								<option>MCH</option>
								<option>New Born Unit</option>
							</select> -->
						</td>
						<td>
							<b-form-input placeholder="xx-Clinical Officers"></b-form-input>
						</td>
						<td>
							<b-input-group append="Sessions" class="mb-8 mr-sm-8 mb-sm-0">
								<b-form-input></b-form-input>
							</b-input-group>
						</td>
						<td>
							<b-select :options="cases"></b-select>
						</td>
						<td>
							<b-select :options="skills"></b-select>
						</td>
						<td>
							<b-select :options="resources"></b-select>
						</td>
						<td>
							<b-form-input></b-form-input>
						</td>
					</tr>
				</tbody>
			</table>

			<b-button size="sm" variant = "primary">Add Row</b-button>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		data() {
			return {
				mentor: {},
				selectedMonth: null,
				selectedYear: null,
				id: this.$route.params.id,
				sites: [
				"Labor Ward", "Paedriatic Ward", "MCH", "New Born Unit"
				],
				cadre: ["Nurses", "Clinical Officers", "Students"],
				cases: ["Asphyria", "Meconium", "Dehydration", "Severe Pneumonia", "Malnutrition", "Asthma", "Diarrheal Diseases"],
				skills: ["Newborn Resuscitation", "Oxygen Administration for Neonatals", "Triage for Sick Children"],
				resources: ["Pulse Oximeters", "Thermometers", "Emergency Tray", "Paediatric Protocols"],
				counties: []
			}
		},
		created(){
			this.getCounties()
		},
		methods: {
			getCounties: function(){
				axios.get('/api/data/counties')
				.then(res => {
					this.counties = _.map(res.data, (county) => {
						return {
							value: county.id,
							text: county.county
						}
					})
				})
			}
		},
		computed: {
			searchable: function(){
				if (this.id !== undefined) {
					return false
				}

				return true
			},
			mentorsList: function(){
				return []
			}
		}
	}
</script>