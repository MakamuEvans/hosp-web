<template>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Lab Test</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" v-if="hasError">
                    Fill all required Fields Correctly!
                </div>
                <form role="form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" v-model="formData.name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Rate</label>
                        <input type="number" class="form-control" v-model="formData.rate" id="exampleInputPassword1" placeholder="Rate">
                        <small id="rateHelp" class="form-text text-muted">The Service Price in KSH</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Remarks</label>
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
                    name: '',
                    rate: '',
                    remarks: ''
                },
                saveButton: 'Save',
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
                    vm.hasError = false
                vm.saveButton = 'Saving...';
                axios.post(base_url + '/lab-tests', vm.formData)
                    .then(response=>{
                        console.log(response)
                        location.reload();
                    })
            },
            //validate
            validate(){
                if (this.isEmpty(this.formData.name) || this.isEmpty(this.formData.rate))
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
