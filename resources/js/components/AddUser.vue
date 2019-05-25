<template>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" v-if="hasError">
                    {{errorMessage}}
                </div>
                <form role="form">
                    <div class="form-group">
                        <label>User Names</label>
                        <input type="text" class="form-control" v-model="formData.name" aria-describedby="emailHelp" placeholder="Enter Names">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" v-model="formData.email" aria-describedby="emailHelp" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>User Type</label>
                        <select class="form-control" v-model="formData.user_type">
                            <option value="1">Admin</option>
                            <option value="2">Doctor</option>
                            <option value="3">Nurse</option>
                            <option value="4">Lab Technician</option>
                            <option value="5">Radiology Technician</option>
                            <option value="6">Optical Technician</option>
                            <option value="7">Chemist</option>
                            <option value="8">Receptionist</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" v-model="formData.password" aria-describedby="emailHelp" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label>Password Confirmation</label>
                        <input type="password" class="form-control" v-model="formData.password_confirm" aria-describedby="emailHelp" placeholder="Password Confirm">
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
            console.log('Add User mounted.')
        },
        data() {
            return {
                formData: {
                    name: '',
                    email: '',
                    user_type: '',
                    password: '',
                    password_confirm: '',
                },
                saveButton: 'Save',
                hasError: false,
                errorMessage: 'Fill all required Fields Correctly!'
            }
        },
        methods: {
            saveData(){
                console.log("We Here");
                let vm = this;
                if (!vm.validate()){
                    vm.hasError = true;
                    return;
                } else
                    vm.hasError = false;
                vm.saveButton = 'Saving...';
                axios.post(base_url + '/users', vm.formData)
                    .then(response=>{
                        console.log(response)
                        if (response.data.status)
                            location.reload();
                        else {
                            vm.errorMessage = response.data.data;
                            vm.hasError = true;
                            vm.saveButton = 'Save';
                        }
                    })
                    .catch(error => {
                        console.log(error.toString());
                        console.log(error);
                    })
            },
            //validate
            validate(){
                console.log("Validation...");
                if (this.isEmpty(this.formData.name) || this.isEmpty(this.formData.email) || this.isEmpty(this.formData.user_type) || this.isEmpty(this.formData.password))
                    return false;
                if (this.formData.password != this.formData.password_confirm)
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
