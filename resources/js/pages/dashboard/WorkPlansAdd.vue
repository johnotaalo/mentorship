<template>
	<div class="card">
		<div class="card-body">
			<center><h4><strong>ETAT + TOT MENTORSHIP WORKPLAN</strong></h4></center>
			<div class="row">
				<div class="col-md">
					<strong>County Name: </strong>
					<span v-if="!searchable">{{ mentor.county }}</span>
					<b-select v-model="form.county" :options="counties" v-else></b-select>
				</div>

				<div class="col-md">
					<strong>Sub County Name: </strong>
					<span v-if="!searchable">{{ mentor.county }}</span>
					<b-select v-model="form.subcounty" :options="subcounties" v-else></b-select>
				</div>

				<div class="col-md">
					<b>Mentorship Period</b>
					<div class="row">
						<div class="col-md">
							<b-select v-model="form.period_month" :options="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']">
								<template slot="first">
									<option :value="null" disabled>Select Month</option>
								</template>
							</b-select>
						</div>
						<div class="col-md">
							<b-select v-model="form.period_year" :options="['2018', '2019']">
								<template slot="first">
									<option :value="null" disabled>Select Year</option>
								</template>
							</b-select>
						</div>
					</div>
				</div>
			</div>
			<p>
				
			</p>

			<table class="table table-bordered">
				<tr>
					<td colspan="2">
						<b>Mentor Name: </b>
						<span v-if="!searchable">{{ mentor.hcw_name }}</span>
						<!-- <b-select v-model="mentor" :options="mentors" v-else></b-select> -->
						<v-select v-model="form.mentor" :options="mentors" placeholder="Click to Enter" v-else></v-select>
					</td>
					<td>
						<b>Mentor Contact Number: </b>
						<b-input v-model = "form.mentor.value.phone" placeholder="Info Not Provided (Click to Enter)"></b-input>
					</td>
					<td>
						<b>Mentor Email Address: </b>
						<b-input v-model = "form.mentor.value.email" placeholder="Info Not Provided (Click to Enter)"></b-input>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<b>Health Facility Name (Mentorship Venue):</b> <b-select :options="facilities" v-model = "form.facility"></b-select></td>
					<td colspan="2">
						<b>Mentor Workstation: </b><b-select :options="facilities" v-model = "form.workstation"></b-select>
					</td>
				</tr>
				<tr>
					
				</tr>
			</table>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Site / Service Delivery Area (Indicate)</th>
						<!-- <th>Mentee (Indicate cadre & number of pax)</th> -->
						<th># of sections planned</th>
						<th>Cases to be reviewed (list of cases based on audit)</th>
						<th>Skills to be mentored (list of skills)</th>
						<th>Expected outcome of the mentorship session/s</th>
						<th>Resources needed</th>
					</tr>
				</thead>
				<tbody v-if = "form.activities">
					<tr v-for="(row, index) in form.activities" :key="index">
						<td>
							{{ row.site.label }}
						</td>
						<td>
							{{ row.sessions }} sessions
						</td>
						<td>
							<ol>
								<li v-for="item in row.cases">{{ item.label }}</li>
							</ol>
						</td>
						<td>
							<ol>
								<li v-for="item in row.skills">{{ item.topic }}</li>
							</ol>
						</td>
						<td>
							<ol>
								<li v-for="item in row.skills">{{ item.outcome.outcome }}</li>
							</ol>
						</td>
						<td>
							<ol>
								<li v-for="item in row.resources">{{ item.label }}</li>
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
				<tbody v-else>
					<tr>
						<td colspan="6"><center>Click Add Row to add activity</center></td>
					</tr>
				</tbody>
			</table>

			<b-button size="sm" variant = "primary" @click="showAddActivityModal"><i class="align-left" data-feather="plus"></i>&nbsp;Add Row</b-button>
			<b-button size="sm" variant = "primary" class="float-right" @click="addData"><i class="align-left" data-feather="save"></i>&nbsp;Save Data</b-button>
		</div>

		<b-modal ref="modal-add-activity" title="Add Activity" @ok="manageModalData">
			<div class="form-group">
				<label class = "label-control"><strong>Site / Service Delivery Area</strong></label>
				<!-- <b-select :options="sites" v-model = "modal.site"></b-select> -->
				<v-select :options="sites" v-model = "modal.site"></v-select>
			</div>
			<!-- <div class="form-group row">
				<div class="col-md">
					<label class = "label-control"><strong>Targeted Mentee</strong></label>
					<b-button size="sm" class="float-right" @click="addRow(modal.mentees)">Add Mentee</b-button>
					<div v-if="modal.mentees.length > 0" class="mt-2">
						<mentee v-for="(row, index) in modal.mentees" :key="index" :cadres="cadre" v-model="modal.mentees[index]"></mentee>
					</div>
					<div v-else>
						<p><center>No mentees added</center></p>
					</div>
				</div>
			</div> -->
			<div class="form-group row">
				<div class="col-md">
					<label># of Sessions Planned</label>
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
					<v-select v-model = "modal.skills" :options="filteredSkills" multiple label="topic">
						<template slot="option" slot-scope="option">
							<!-- <span :class="option.icon"></span> -->
							{{ option.topic }}
						</template>
					</v-select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md">
					<label>Expected Outcome</label>
					<ul>
						<li v-for="skill in modal.skills">{{ skill.outcome.outcome }}</li>
					</ul>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md">
					<label>Resources needed</label>
					<v-select v-model = "modal.resources" :options="resources" multiple></v-select>
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
				mentor: {
					value: ""
				},
				mentors: [],
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
				facilities: [],
				subcounties: [],
				form: new Form({
					activities: [],
					facility: '',
					county: '',
					subcounty: '',
					workstation: '',
					period_month: '',
					period_year: '',
					mentor: {
						value: ""
					}
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
			this.getMentors()
			this.getSkills()
			this.getSites()
			this.getResources()
			this.getCases()
		},
		methods: {
			getMentors: function(){
				axios.get('/data/mentors-data')
				.then(res => {
					this.mentors = _.map(res.data, (mentor) => {
						return {
							value: mentor,
							label: mentor.name
						}
					})
				});
			},
			getCounties: function(){
				axios.get('/data/counties')
				.then(res => {
					this.counties = _.map(res.data, (county) => {
						return {
							value: county.cto_id,
							text: county.county
						}
					})
				})
			},

			getFacilities(county_id){
				axios.get(`/data/facilities/${county_id}`)
				.then(res => {
					this.facilities = _.map(res.data, (facility) => {
						return {
							value: facility.id,
							text: facility.facility_name
						}
					})
				});
			},

			getSkills(){
				axios.get(`/data/skills`)
				.then(res => {
					var skillsMap = {}
					_.forOwn(res.data, (skill) => {
						if(typeof skillsMap[skill.site_id] === "undefined"){
							skillsMap[skill.site_id] = []
						}
						skillsMap[skill.site_id].push(skill)
					})

					this.skills = skillsMap
				});
			},

			getExpectedOutcomes(){
				axios.get('/data/outcomes')
				.then(res => {
					this.expectedOutcomes = _.map(res.data, (outcome) => {
						return {
							value: outcome.id,
							label: outcome.outcome
						}
					})
				})
			},

			getSites(){
				axios.get('/data/sites')
				.then(res => {
					this.sites = _.map(res.data, (site) => {
						return {
							value: site.id,
							label: site.site
						}
					})
				})
			},

			getResources(){
				axios.get('/data/resources')
				.then(res => {
					this.resources = _.map(res.data, (resource) => {
						return {
							value: resource.id,
							label: resource.resource
						}
					})
				})
			},

			getCases(){
				axios.get('/data/cases')
				.then(res => {
					this.cases = _.map(res.data, (casex) => {
						return {
							value: casex.id,
							label: casex.case
						}
					})
				})
			},

			getSubcounties(county_id){
				axios.get(`/data/subcounties/${county_id}`)
				.then(res => {
					this.subcounties = _.map(res.data, (subcounty) => {
						return {
							value: subcounty.subcounty_id,
							text: subcounty.subcounty
						}
					})
				});
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
			},
			addData: function(){
				var em = this
				this.form.post('/data/workplan')
				.then(res => {
					em.$router.push({ name: 'dashboard.workplans' });
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
			},
			filteredSkills: function(){
				return this.skills[this.modal.site.value]
			}
		},
		watch: {
			'form.county': function(county){
				this.getSubcounties(county)
				// this.getFacilities(county)
			},
			'form.subcounty': function(subcounty){
				this.getFacilities(subcounty)
			}
		}
	}
</script>
