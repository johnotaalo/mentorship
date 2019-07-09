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

			<b-button size="sm" variant = "primary" @click="showAddActivityModal">Add Row</b-button>
		</div>

		<b-modal ref="modal-add-activity" title="Add Activity" @ok="manageModalData">
			<div class="form-group">
				<label>Site / Service Delivery Area</label>
				<b-select :options="sites" v-model = "modal.site"></b-select>
			</div>
			<div class="form-group row">
				<div class="col-md">
					<label>Mentee</label>
					<b-button size="sm" class="float-right" @click="addRow(modal.mentees)">Add Mentee</b-button>
					<div v-if="modal.mentees.length > 0" class="mt-2">
						<mentee v-for="(row, index) in modal.mentees" :key="index" :cadres="cadre" v-model="modal.mentees[index]"></mentee>
					</div>
					<div v-else>
						<p><center>No mentees added</center></p>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md">
					<label># of Sessions</label>
					<b-input-group append="Sessions" class="mb-8 mr-sm-8 mb-sm-0">
						<b-form-input v-model = "modal.sessions"></b-form-input>
					</b-input-group>
				</div>
				<div class="col-md">
					<label>Cases to be reviewed</label>
					<v-select v-model = "modal.cases" :options="cases" multiple></v-select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md">
					<label>Skills to be mentored</label>
					<v-select v-model = "modal.skills" :options="skills" multiple></v-select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md">
					<label>Resources needed</label>
					<v-select v-model = "modal.resources" :options="resources" multiple></v-select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md">
					<label>Expected Outcomes</label>
					<b-button size="sm" class="float-right" @click="addRow(modal.expectedOutcomes)">Add Outcome</b-button>
					<div v-if="modal.expectedOutcomes.length > 0" class="mt-2">
						<expected-outcome v-for = "(row, index) in modal.expectedOutcomes" :key="index" v-model="modal.expectedOutcomes[index]" :index="index" @remove="removeRow($event, modal.expectedOutcomes)"></expected-outcome>
					</div>
					<div v-else>
						<p><center>No outcomes added</center></p>
					</div>
				</div>
			</div>
		</b-modal>
	</div>
</template>

<script type="text/javascript">
	import ExpectedOutcome from '../../components/ExpectedOutcome'
	import Mentee from '../../components/MenteeComponent'
	import rowForm from '../../mixins/rowForm'
	import Form from '../../core/Form'
	export default {
		components: { ExpectedOutcome, Mentee },
		mixins: [rowForm],
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
				counties: [],
				form: new Form({
					activities: []
				}),
				modal: {
					site: "",
					sessions: 0,
					skills: [],
					cases: [],
					resources: [],
					mentees: [],
					expectedOutcomes: []
				}
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
			},
			showAddActivityModal: function(){
				this.$refs['modal-add-activity'].show()
			},
			manageModalData: function(){
				var data = {};
				this.form.activities.push(data)
				_.forOwn(this.modal, (value, key) => {
					data[key] = value
					if(Array.isArray(value)){
						this.modal[key] = []
					}else{
						this.modal[key] = ""
					}
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