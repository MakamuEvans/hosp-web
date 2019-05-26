<template>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Radiology Test Request</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" v-if="hasError">
                    Fill all required Fields Correctly!
                </div>
                <form role="form">
                    <div class="form-group">
                        <label>Test</label>
                        <select class="form-control" :disabled="test !== undefined" v-model="formData.test_id">
                            <option v-for="test in tests" :value="test.id">{{test.name}}</option>
                        </select>
                    </div>
                    <div class="form-group" v-if="test !== undefined">
                        <label>Remarks</label>
                        <textarea class="form-control" v-model="formData.remarks"></textarea>
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
            console.log('mounted.');
            this.init();
        },
        props: [
          'checkin', 'test'
        ],
        data() {
            return {
                tests: [],
                technicians: [],
                formData: {
                    check_in_id: '',
                    test_id: '',
                    technician_id: '',
                    remarks: ''
                },
                saveButton: 'Request',
                hasError: false
            }
        },
        methods: {
            saveData(){
                let vm = this;
                if (!vm.validate()){
                    vm.hasError = true;
                    return;
                } else
                    vm.hasError = false;
                if (vm.test !== undefined){
                    //update
                    vm.saveButton = 'Requesting...';
                    vm.formData._method = 'PUT';
                    axios.post(base_url + '/radiology-diagnosis/'+ vm.test.id, vm.formData)
                        .then(response=>{
                            console.log(response);
                            location.reload();
                        })
                } else {
                    //create
                    vm.saveButton = 'Requesting...';
                    axios.post(base_url + '/radiology-diagnosis', vm.formData)
                        .then(response=>{
                            console.log(response);
                            location.reload();
                        })
                }
            },
            init(){
              let vm = this;
              if (vm.test !== undefined){
                  vm.formData = vm.test;
                  vm.saveButton = 'Update';
              }
              vm.formData.check_in_id = vm.checkin.id
              axios.get(base_url + '/init-radiology-diagnosis')
                  .then(response =>{
                      vm.tests = response.data.data.tests;
                      vm.technicians = response.data.data.technicians;
                  })
            },
            //validate
            validate(){
                console.log("validate called");
                var vm = this;
                //console.log();
                if (vm.formData.test_id == "")
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
