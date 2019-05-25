<template>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" v-if="hasError">
                    Fill all required Fields Correctly!
                </div>
                <form role="form">
                    <div class="form-group">
                        <label>Client Names</label>
                        <input type="text" class="form-control" v-model="formData.names" aria-describedby="emailHelp" placeholder="Enter Names">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" v-model="formData.phone_number" aria-describedby="emailHelp" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <label>DOB</label>
                        <input type="text" class="form-control" v-model="formData.dob" aria-describedby="emailHelp" placeholder="Enter DOB">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" v-model="formData.gender">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Blood Type</label>
                        <select class="form-control" v-model="formData.blood_type">
                            <option value="A">A</option>
                            <option value="A-">A-</option>
                            <option value="A+">A+</option>
                        </select>
                    </div>
                    <div class="form-group">
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
            console.log('Add Lab Test mounted.')
        },
        data() {
            return {
                formData: {
                    names: '',
                    dob: '',
                    phone_number: '',
                    gender: '',
                    blood_type: '',
                    remarks: ''
                },
                saveButton: 'Save',
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
                vm.saveButton = 'Saving...';
                axios.post(base_url + '/clients', vm.formData)
                    .then(response=>{
                        console.log(response)
                        location.reload();
                    })
            },
            //validate
            validate(){
                if (isEmpty(this.formData.names) || isEmpty(this.formData.dob) || isEmpty(this.formData.gender) || isEmpty(this.formData.blood_type))
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
