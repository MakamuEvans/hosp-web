<template>
    <div class="card-box">
        <div class="row">
            <div class="col-md-6">
                <label>Search Client</label>
                <input type="text" class="form-control" v-model="q" placeholder="Start Typing to search">
                <br><br>
                <h4 v-if="searchResults.length > 0" class="header-title mt-0 mb-3 text-center"><i class="mdi mdi-notification-clear-all mr-1"></i> Results</h4>
                <h4 v-if="searchResults.length == 0" class="header-title mt-0 mb-3 text-center"><i class="mdi mdi-notification-clear-all mr-1"></i> Nothing Found</h4>

                <ul class="list-group mb-0 user-list">
                    <li class="list-group-item" v-for="client in searchResults">
                        <a style="cursor: pointer" @click="selectClient(client)" class="user-list-item">
                            <div class="user float-left mr-3">
                                <i class="mdi mdi-circle text-primary"></i>
                            </div>
                            <div class="user-desc overflow-hidden">
                                <h5 class="name mt-0 mb-1">{{client.names}}</h5>
                                <span class="desc text-muted font-12 text-truncate d-block">Gender: {{client.formatted_gender}} | Blood Type: {{client.blood_type}} | DOB: {{client.dob}}</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="alert alert-warning" v-if="hasError">
                    Fill all required Fields Correctly!
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Client</label>
                    <input type="text" disabled class="form-control" v-model="formData.client.names" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Weight</label>
                    <input type="text" class="form-control" v-model="formData.weight" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Weight">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Temperature</label>
                    <input type="text" class="form-control" v-model="formData.temperature" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Temperature">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Doctor</label>
                    <select class="form-control" v-model="formData.doctor">
                        <option v-for="doctor in doctors" :value="doctor">{{doctor.name}}</option>
                    </select>
                </div>
                <button class="btn btn-primary form-control" @click="saveData">Create</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Check In mounted.')
            this.init();
        },
        data() {
            return {
                q: '',
                searchResults: [],
                doctors: [],
                formData: {
                    client: [],
                    temperature: '',
                    weight: '',
                    doctor: ''
                },
                saveButton: 'Save',
                hasError: false
            }
        },
        watch: {
            'q' : _.debounce(function (newVal, oldVal) {
                var vm = this
                axios.get(base_url + '/search-client?q='+newVal)
                    .then(response=>{
                        vm.searchResults = response.data.data
                    })
            }, 1500),
        },
        methods: {
            init(){
                let vm = this;
                axios.get(base_url + '/init-check-in')
                    .then(response =>{
                        vm.doctors = response.data.data;
                    })
            },
            saveData(){
                let vm = this;
                if (!vm.validate){
                    vm.hasError = true;
                    return;
                } else
                    vm.hasError = false
                vm.saveButton = 'Saving...';
                axios.post(base_url + '/check-ins', vm.formData)
                    .then(response=>{
                        console.log(response)
                        location.reload();
                    })
            },
            selectClient(client){
                this.formData.client = client
            },
            //validate
            validate(){
                if (isEmpty(this.formData.client) || isEmpty(this.formData.doctor) || isEmpty(this.formData.weight) || isEmpty(this.formData.temperature))
                    return false;
                return true
            },
            //check if var is empty
            isEmpty(str) {
                if (typeof str == 'undefined' || !str || str.length === 0 || str === "" || !/[^\s]/.test(str) || /^\s*$/.test(str) || str.replace(/\s/g, "") === "")
                    return true;
                else
                    return false;
            }
        }
    }
</script>
