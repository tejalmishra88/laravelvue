<template>


   
    <div class="modal fade" id="addModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" @clear="clearModal" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Record</h4>
                </div>
                <div class="modal-body">
                    <p class="alert alert-success" v-if="success.length > 0">{{ success}}</p>
                    <label for='name'>Add New Record</label>
                    <textarea name="name" id="name" class="form-control" v-model="record"></textarea>
                    <ul v-if="errors.name> 0" class="list-unstyled"></ul>
                    <li v-for="err of errors.name" class="alert alert-danger">{{err}}</li>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" @click="clearModal" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="addrecord">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    

</template>
<script>
export default 
{   data()
   {
        return{   success:'',
                   errors:[],
                    record:'',
              }
    },
    methods:
    {
        addrecord()
        {   console.log('this.record=',this.record);

            axios.post("http://127.0.0.1:8000/tasks",
            {
                'name':this.record,
                
            })
                .then(data =>{
                    this.$emit('recordadded', data);
                this.success = "Task Added Successfully...";
                 this.record='';
                })
                .catch(error => this.errors = error.response.data.errors)
                },
                clearModal(){
                    this.errors=[];
                    this.record='';
                    this.success='';
                }
                    
                   
                   
                
            
        }
    }
    
        
    
     
    
  

</script>
<style>

</style>




