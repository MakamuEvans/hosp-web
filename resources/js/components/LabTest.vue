<template>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Lab Test Request</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" v-if="hasError">
                    Fill all required Fields Correctly!
                </div>
                <form role="form">
                    <div class="form-group">
                        <label>Test</label>
                        <select class="form-control" v-model="formData.test_id">
                            <option v-for="test in tests" :value="test.id">{{test.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lab technician</label>
                        <select class="form-control" v-model="formData.technician_id">
                            <option v-for="technician in technicians" :value="technician.id">{{technician.name}}</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" id="closeBtn" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" @click="saveData">{{saveButton}}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</template>

<script>
    export default {
        mounted() {
            console.log('Add Drug mounted.');
            this.init();
        },
        props: [
          'checkin'
        ],
        data() {
            return {
                tests: [],
                technicians: [],
                formData: {
                    check_in_id: '',
                    test_id: '',
                    technician_id: '',
                },
                saveButton: 'Request',
                hasError: false
            }
        },
        methods: {
            saveData(){
                let vm = this;
                if (!vm.validate){
                    vm.hasError = true;
                    return;
                } else
                    vm.hasError = false
                vm.saveButton = 'Requesting...';
                axios.post(base_url + '/lab-diagnosis', vm.formData)
                    .then(response=>{
                        console.log(response)
                        location.reload();
                    })
            },
            init(){
              let vm = this;
              vm.formData.check_in_id = vm.checkin.id
              axios.get(base_url + '/init-lab-diagnosis')
                  .then(response =>{
                      vm.tests = response.data.data.tests;
                      vm.technicians = response.data.data.technicians;
                  })
            },
            //validate
            validate(){
                if (isEmpty(this.formData.test_id) || isEmpty(this.formData.technician_id))
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
