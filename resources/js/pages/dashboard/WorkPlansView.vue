<template>
	<div class="card">
		<div class="card-body">
			<p>
				<strong>County Name: </strong>
				<span>{{ mentor.county }}</span>
			</p>

			<center><h4>ETAT + TOT MENTORSHIP WORKPLAN</h4></center>

			<table class="table table-bordered">
				<tr>
					<td>
						<b>Mentor Name: </b>
						<span>{{ mentor.first_name }} {{ mentor.last_name }}</span>
					</td>
					<td>
						<b>Mentorship Period</b>
						{{ mentor.cycle }}
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
					<tr v-for="(row, index) in form.activities" :key="index">
						<td>
							{{ row.site }}
						</td>
						<td>
							<p v-for="item in row.mentees">{{ item.mentee_no }} - {{ item.mentee_cadre }}</p>
						</td>
						<td>
							{{ row.sessions }} sessions
						</td>
						<td>
							<ol>
								<li v-for="item in row.cases">{{ item }}</li>
							</ol>
						</td>
						<td>
							<ol>
								<li v-for="item in row.skills">{{ item }}</li>
							</ol>
						</td>
						<td>
							<ol>
								<li v-for="item in row.resources">{{ item }}</li>
							</ol>
						</td>
						<td>
							<ol>
								<li v-for="item in row.expectedOutcomes">{{ item.outcome }}</li>
							</ol>
						</td>
						<!-- <td>
							
							<select name = "sites[]">
								<option>Labor Ward</option>
								<option>Paedriatic Ward</option>
								<option>MCH</option>
								<option>New Born Unit</option>
							</select>
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
						</td> -->
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
			this.getData()
		},
		methods: {
			getData(){
				this.mentor = _.find(this.items, ['id', parseInt(this.id)])
			}
		}
	}
</script>