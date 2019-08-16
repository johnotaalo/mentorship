<template>
	<div class="card">
		<div class="card-body">

			<div class="row">
				<div class="col-md-3">
					<b-button variant="primary" size="sm" @click="$router.go(-1)"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back to List</b-button>
				</div>
				<div class="col-md-3 offset-6">
					
				</div>
			</div>
			<p>
				<strong>County Name: </strong>
				<span>{{ workplan.county.county }}</span>
			</p>

			<p>
				<strong>Sub County Name: </strong>
				<span>{{ workplan.subcounty.subcounty }}</span>
			</p>

			<center><h4>ETAT + TOT MENTORSHIP WORKPLAN</h4></center>

			<table class="table table-bordered">
				<tr>
					<td>
						<b>Mentor Name: </b>
						<span>{{ workplan.mentor.name }}</span>
					</td>
					<td>
						<b>Mentorship Period</b>
						{{ workplan.period_month }} {{ workplan.period_year }}
					</td>
				</tr>
				<tr>
					<td><b>Health Facility Name (Mentorship Venue):</b> {{ workplan.venue.facility_name }}</td>
					<td>
						<b>Mentor Workstation: </b>{{ workplan.workstation.facility_name }}
					</td>
				</tr>
				<tr>
					<td>
						<b>Mentor Contact Number: </b>{{ workplan.mentor.phone }}
					</td>
					<td>
						<b>Mentor Email Address: </b>{{ workplan.mentor.email }}
					</td>
				</tr>
			</table>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Site / Service Delivery Area (Indicate)</th>
						<th># of sections planned</th>
						<th>Cases to be reviewed (list of cases based on audit)</th>
						<th>Skills to be mentored (list of skills)</th>
						<th>Expected outcome of the mentorship session/s</th>
						<th>Resources needed</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(row, index) in workplan.sites" :key="index">
						<td>
							{{ row.site.site }}
						</td>
						<td>
							{{ row.sessions }} sessions
						</td>
						<td>
							<ol>
								<li v-for="item in row.cases">{{ item.case_data.case }}</li>
							</ol>
						</td>
						<td>
							<ol>
								<li v-for="item in row.skills">{{ item.skill_data.topic }}</li>
							</ol>
						</td>
						<td>
							<ol>
								<li v-for="item in row.skills">{{ item.skill_data.outcomes_data.outcome }}</li>
							</ol>
						</td>
						<td>
							<ol>
								<li v-for="item in row.resources">{{ item.resource_data.resource }}</li>
							</ol>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		data(){
			return {
				id: this.$route.params.id,
				mentor: {},
				workplan: {},
				form: {
					activities: [
					{ site: "Labor Ward", mentees: [{ mentee_no: 2, mentee_cadre: "Nurses" }, { mentee_no: 8, mentee_cadre: "Clinical Officers" }], sessions: 10, skills: ["Oxygen Administration for Neonatals", "Triage for Sick Children"], cases: ["Asphyria", "Meconium", "Dehydration"], resources: ["Pulse Oximeters", "Thermometers"], expectedOutcomes: [{outcome: "Sample Outcome 1"}, {outcome: "Sample Outcome 2"}] }
					]
				},
				items: [
					{ id: 1, first_name: "Sample", last_name: "Mentor", county: "Nairobi", cycle: "June 2019", facility_name: "Sample Facility", contact: "+254725160399", email: "sampleemail@gmail.com" },
					{ id: 2, first_name: "Sample", last_name: "Mentor 2", county: "Kakamega", cycle: "June 2019", facility_name: "Sample Facility", contact: "+254731160399", email: "sampleemail2@gmail.com" },
					{ id: 3, first_name: "Sample", last_name: "Mentor 3", county: "Kisumu", cycle: "November 2018", facility_name: "Sample Facility", contact: "+254705160399", email: "sampleemail3@gmail.com" }
				]
			}
		},
		created(){
			this.getMentorData()
		},
		methods: {
			getData(){
				this.mentor = _.find(this.items, ['id', parseInt(this.id)])
			},
			getMentorData(){
				axios.get(`data/workplan/${this.id}`)
				.then((res) => {
					this.workplan = res.data
				});
			},
			backToList(){
				return;
			}
		}
	}
</script>