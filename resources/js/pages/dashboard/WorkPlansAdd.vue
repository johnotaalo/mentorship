<template>
	<div class="card">
		<div class="card-body">
			<!-- <b-select :options="filteredSites"></b-select> -->
			<center>
				<h4><strong>ETAT + TOT MENTORSHIP WORKPLAN</strong></h4>
				<h5>Please note that all fields are mandatory</h5>
			</center>
			<div class="row">
				<div class="col-md">
					<strong>County Name: </strong>
					<span v-if="!searchable">{{ mentor.county }}</span>
					<b-form-group id="county-input-group" v-else>
						<b-select id="county-input" name = "county-input" v-validate="{ required: true }" :state="validateState('county-input')" v-model="form.county" :options="counties" aria-describedby="county-input-live-feedback"></b-select>

						<b-form-invalid-feedback id="county-input-live-feedback">
							This is a required field
						</b-form-invalid-feedback>
					</b-form-group>
				</div>

				<div class="col-md">
					<strong>Sub County Name: </strong>
					<span v-if="!searchable">{{ mentor.county }}</span>
					<b-form-group id="subcounty-input-group" v-else>
						<b-select id="subcounty-input" name = "subcounty-input" v-validate="{ required: true }" :state="validateState('subcounty-input')" v-model="form.subcounty" :options="subcounties" aria-describedby="subcounty-input-live-feedback"></b-select>
						<b-form-invalid-feedback id="subcounty-input-live-feedback">
							This is a required field
						</b-form-invalid-feedback>
					</b-form-group>
				</div>

				<div class="col-md">
					<b>Mentorship Period</b>
					<div class="row">
						<div class="col-md">
							<b-form-group id="month-input-group">
								<b-select id="month-input" name = "month-input" v-validate="{ required: true }" :state="validateState('month-input')" v-model="form.period_month" :options="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']" aria-describedby="month-input-live-feedback">
									<template slot="first">
										<option :value="null" disabled>Select Month</option>
									</template>
								</b-select>
								<b-form-invalid-feedback id="month-input-live-feedback">
									This is a required field
								</b-form-invalid-feedback>
							</b-form-group>
						</div>
						<div class="col-md">
							<b-form-group id="year-input-group">
								<b-select id="year-input" name = "year-input" v-validate="{ required: true }" :state="validateState('year-input')" v-model="form.period_year" :options="['2018', '2019']" aria-describedby="year-input-live-feedback">
									<template slot="first">
										<option :value="null" disabled>Select Year</option>
									</template>
								</b-select>
								<b-form-invalid-feedback id="year-input-live-feedback">
									This is a required field
								</b-form-invalid-feedback>
							</b-form-group>
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
						<b-form-group id="mentor-input-group" v-else>
							<v-select v-model="form.mentor" :options="mentors" placeholder="Click to Enter" v-validate:mentor="{required: true}" name="mentor" :class="{ danger: veeErrors.has('mentor') }">
							</v-select>
							<span v-show="veeErrors.has('mentor')" class="danger">
							{{ veeErrors.first('mentor') }}
							</span>
						</b-form-group>
					</td>
					<td>
						<b>Mentor Contact Number: </b>
						<b-form-group id="mentor-phone-input-group">
							<b-input id="mentor-phone-input" name = "mentor-phone-input" v-validate="{ required: true, regex: /^0(7(?:(?:[129][0-9])|(?:0[0-8])|(4[0-1]))[0-9]{6})$/ }" :state="validateState('mentor-phone-input')" v-model = "form.mentor.value.phone" placeholder="Info Not Provided (Click to Enter)" aria-describedby="mentor-phone-input-live-feedback"></b-input>
							<b-form-invalid-feedback id="mentor-phone-input-live-feedback">
								This is a required field. Format is 07XXXXXXXX
							</b-form-invalid-feedback>
						</b-form-group>
					</td>
					<td>
						<b>Mentor Email Address: </b>
						<b-form-group id="mentor-email-input-group">
							<b-input id="mentor-email-input" name = "mentor-email-input" v-validate="{required: true, email: true}" :state="validateState('mentor-email-input')" v-model = "form.mentor.value.email" placeholder="Info Not Provided (Click to Enter)" aria-describedby="mentor-email-input-live-feedback"></b-input>
							<b-form-invalid-feedback id="mentor-email-input-live-feedback">
								This is a required field and should be a valid email address
							</b-form-invalid-feedback>
						</b-form-group>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<b-form-group id="venue-input-group">
							<b>Health Facility Name (Mentorship Venue):</b> 
							<b-select id="venue-input" name = "venue-input" v-validate="{ required: true }" :state="validateState('venue-input')" :options="facilities" v-model = "form.facility" aria-describedby="venue-input-live-feedback"></b-select>
							<b-form-invalid-feedback id="venue-input-live-feedback">
								This is a required field
							</b-form-invalid-feedback>
						</b-form-group>
					</td>
					<td colspan="2">
						<b-form-group id="venue-input-group">
							<b>Mentor Workstation: </b>
							<b-select id="workstation-input" name = "workstation-input" v-validate="{ required: true }" :state="validateState('workstation-input')" :options="facilities" v-model = "form.workstation" aria-describedby="workstation-input-live-feedback"></b-select>
							<b-form-invalid-feedback id="workstation-input-live-feedback">
								This is a required field
							</b-form-invalid-feedback>
						</b-form-group>
					</td>
				</tr>
				<tr>
					
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
						<th>Actions</th>
					</tr>
				</thead>
				<tbody v-if = "form.activities.length">
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
						<td>
							<!-- <b-button-group size="sm">
								<b-button><i class="fa fa-minus"></i>&nbsp;Remove</b-button>
								<b-button><i class="fa fa-edit"></i>&nbsp;Edit</b-button>
							</b-button-group> -->

							<b-dropdown id="dropdown-1" text="Actions" class="m-md-2" size="sm" variant="primary">
								<b-dropdown-item-button size = 'sm' @click="openEditModal(index)">Edit</b-dropdown-item-button>
								<b-dropdown-item-button size = 'sm' @click="removeRow(index)">Remove</b-dropdown-item-button>
							</b-dropdown> 
						</td>
					</tr>
				</tbody>
				<tbody v-else>
					<tr>
						<td colspan="7"><center>Click Add Row to add activity</center></td>
					</tr>
				</tbody>
			</table>

			<b-button variant = "primary" @click="showAddActivityModal"><i class="align-left fa fa-plus"></i>&nbsp;Add Row</b-button>
			<!-- -->
			<b-button v-if="form.activities.length" variant = "success" class="float-right" @click="addData"><i class="fa fa-save align-left"></i>&nbsp;Save Data</b-button>
		</div>

		<b-modal ref="modal-add-activity" title="Add Activity" @ok="manageModalData" no-close-on-backdrop>
			<div class="form-group">
				<label class = "label-control"><strong>Site / Service Delivery Area</strong></label>
				<!-- <b-select :options="sites" v-model = "modal.site"></b-select> -->
				<v-select v-validate="{ required: true }" name="site" :options="sites" v-model = "modal.site" data-vv-scope="modal"></v-select>
				<span v-show="veeErrors.has('modal.site')" class="text-danger">
					This is a required field
				</span>
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
					<b-form-group id="modal.sessions-input-group">
						<label># of Sessions Planned</label>
						<b-input-group append="Sessions" class="mb-8 mr-sm-8 mb-sm-0">
							<b-form-input v-model = "modal.sessions" id="modal.sessions-input" name = "modal.sessions-input" v-validate="{ required: true, min_value: 1 }" :state="!veeErrors.has('modal.sessions-input')" aria-describedby="modal.sessions-input-live-feedback"  data-vv-scope="modal"></b-form-input>
						</b-input-group>
						<b-form-invalid-feedback id="modal.sessions-input-live-feedback">
							This is a required field
						</b-form-invalid-feedback>
					</b-form-group>
				</div>
				<div class="col-md">
					<label>Cases to be reviewed</label>
					<v-select v-validate="{ required: true }" name="cases" v-model = "modal.cases" :options="cases" data-vv-scope="modal" multiple></v-select>
					<span v-show="veeErrors.has('modal.cases')" class="text-danger">
						This is a required field
					</span>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md">
					<label>Skills to be mentored</label>
					<v-select v-validate="{ required: true }" name="skills" v-model = "modal.skills" :options="filteredSkills" data-vv-scope="modal" multiple label="topic">
						<template slot="option" slot-scope="option">
							<!-- <span :class="option.icon"></span> -->
							{{ option.topic }}
						</template>
					</v-select>
					<span v-show="veeErrors.has('modal.skills')" class="text-danger">
						This is a required field
					</span>
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
					<v-select  v-validate="{ required: true }" name="resources" v-model = "modal.resources" :options="resources"  data-vv-scope="modal" multiple></v-select>
					<span v-show="veeErrors.has('modal.resources')" class="text-danger">
						This is a required field
					</span>
				</div>
			</div>

			<template slot="modal-ok">
				<span v-if="!editModal">Add Row</span>
				<span v-else>Edit Row</span>
			</template>
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
					value: {}
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
				editIndex: null,
				editModal: false,
				editData: {},
				form: new Form({
					activities: [],
					facility: '',
					county: '',
					subcounty: '',
					workstation: '',
					period_month: '',
					period_year: '',
					mentor: {
						value: {
							email: "",
							phone: ""
						}
					}
				}),
				modal: {
					site: "",
					sessions: 1,
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
			// $(this.$refs['modal-add-activity']).on("hidden.bs.modal", console.log('hidden'))

			this.$root.$on('bv::modal::hidden', (bvEvent, modalId) => {
				this.clearModal()
			})
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
			manageModalData: function(bvModalEvt){
				bvModalEvt.preventDefault()
				this.$validator.validateAll('modal').then((res) => {
					if(!res){
						return
					}else{
						this.$validator.reset();
						var data = {};
						_.forOwn(this.modal, (value, key) => {
							data[key] = value
						})

						if(!this.editModal){
							this.form.activities.push(data)
						}else{
							this.form.activities.splice(this.editIndex, 1, data)
						}

						this.$nextTick(() => {
							this.$refs['modal-add-activity'].hide()
						})
					}
				})
				
			},

			clearModal: function(){
				_.forOwn(this.modal, (value, key) => {
					if(Array.isArray(value)){
						this.modal[key] = []
					}else{
						this.modal[key] = ""
					}
				})

				this.editIndex = null
				this.editModal = false
			},
			validateState(ref) {
				if (this.veeFields[ref] && (this.veeFields[ref].dirty || this.veeFields[ref].validated)) {
					return !this.veeErrors.has(ref)
				}
				return null
			},
			addData: function(){
				var em = this
				this.$validator.validateAll().then((result) => {
					if (!result) {
						return
					}

					em.form.post('/data/workplan')
					.then(res => {
						this.$swal({
							title: "Success!",
							text: "Successfully added workplan",
							icon: "success",
						}).then(() => {
							em.$router.push({ name: 'dashboard.workplans' });
						})
						
					})
					.catch((error) => {
						this.$swal({
							title: "Error!",
							text: "There was an error while adding workplan!",
							icon: "error",
						})
					})
				})
			},
			getUniqueValuesOfKey(array, key){
				return array.reduce(function(carry, item){
					if(item[key] && !~carry.indexOf(item[key])) carry.push(item[key]);
					return carry;
				}, []);
			},
			openEditModal(index){
				this.editIndex = index
				this.modal = this.form.activities[index]
				this.editModal = true
				this.$refs['modal-add-activity'].show()
			},
			removeRow(index){
				this.$swal({
					title: "Delete Row?",
					text: "This action cannot be undone",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						this.proceedDelete(index)
					}
				});
			},
			proceedDelete(index){
				this.form.activities.splice(index, 1);
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
				if(this.modal.site != "" && this.modal.site != null)
					return this.skills[this.modal.site.value]

				return []
			},
			filteredSites: function(){
				var destArray = this.getUniqueValuesOfKey(this.form.activities, 'site');
				var sites = this.sites
				var newArray = _.remove(sites, destArray)
				console.log(newArray)
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
